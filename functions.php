<?php

function boilerplate_load_assets() {
  // wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element'), '1.0', true);
  wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'));
}

function enqueue_alpine_js() {
  wp_enqueue_script('alpine', 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_alpine_js');

add_action('wp_enqueue_scripts', 'boilerplate_load_assets');

function boilerplate_add_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'boilerplate_add_support');

/* Custom post types */
function create_post_type_products() {
  register_post_type('products',
      array(
          'labels' => array(
              'name' => __('Products'),
              'singular_name' => __('Product'),
              'menu_icon' => 'dashicons-products',
              'menu_name'             => __('Products', 'text_domain'),
              'name_admin_bar'        => __('Product', 'text_domain'),
              'archives'              => __('Product Archives', 'text_domain'),
              'attributes'            => __('Product Attributes', 'text_domain'),
              'parent_item_colon'     => __('Parent Product:', 'text_domain'),
              'all_items'             => __('All Products', 'text_domain'),
              'add_new_item'          => __('Add New Product', 'text_domain'),
              'add_new'               => __('Add New Product', 'text_domain'),
              'new_item'              => __('New Product', 'text_domain'),
              'edit_item'             => __('Edit Product', 'text_domain'),
              'update_item'           => __('Update Product', 'text_domain'),
              'view_item'             => __('View Product', 'text_domain'),
              'view_items'            => __('View Products', 'text_domain'),
              'search_items'          => __('Search Product', 'text_domain'),
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'products'),
          'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
          'show_in_rest' => true,
      )
  );
}
add_action('init', 'create_post_type_products');

/* Add custom field for Product */
// register metabox
function add_show_home_meta_box() {
  add_meta_box(
      'show_home_meta_box',  // metabox ID
      'Show on Home Page',   // metabox title
      'show_home_meta_box_callback',  // callback
      'products',            // custom post type
      'side',                // show location
      'default'              // show priority
  );
}
add_action('add_meta_boxes', 'add_show_home_meta_box');

// metabox callback
function show_home_meta_box_callback($post) {
  // using nonce to validate
  wp_nonce_field('save_show_home_meta_box_data', 'show_home_meta_box_nonce');

  // get current value
  $value = get_post_meta($post->ID, '_show_home', true);

  // show metabox
  echo '<label for="show_home_field">';
  echo 'Show this product on the home page';
  echo '</label> ';
  echo '<input type="checkbox" id="show_home_field" name="show_home_field" value="1" ' . checked(1, $value, false) . ' />';
}

// save meta data
function save_show_home_meta_box_data($post_id) {
  // check nonce
  if (!isset($_POST['show_home_meta_box_nonce'])) {
      return;
  }
  if (!wp_verify_nonce($_POST['show_home_meta_box_nonce'], 'save_show_home_meta_box_data')) {
      return;
  }

  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
  }

  // check user privillage
  if (isset($_POST['post_type']) && 'products' == $_POST['post_type']) {
      if (!current_user_can('edit_post', $post_id)) {
          return;
      }
  } else {
      return;
  }

  // check and save metabox value
  if (isset($_POST['show_home_field'])) {
      update_post_meta($post_id, '_show_home', 1);
  } else {
      update_post_meta($post_id, '_show_home', 0);
  }
}
add_action('save_post', 'save_show_home_meta_box_data');

/* Query products showing in home page */
function get_homepage_products() {
  $args = array(
      'post_type' => 'products',
      'meta_query' => array(
          array(
              'key' => '_show_home',
              'value' => '1',
              'compare' => '='
          )
      )
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          get_template_part('partials/product-template');
      }
      wp_reset_postdata();
  } else {
      echo 'No products found.';
  }
}


