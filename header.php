<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php wp_head(); ?>
</script>
  </head>
  <body <?php body_class(); ?>>
    <header class="relative isolate z-10 bg-white" x-data="{ open: false, mobileOpen: false, productsOpen: false }">
      <nav class="mx-auto flex max-w-screen-xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
          <a href="/" class="-m-1.5 p-1.5">
            <span class="sr-only">瑞斯特耐</span>
            <img class="h-8 w-auto" src="<?php echo get_stylesheet_directory_uri();?>/img/png/logo.png" alt="">
          </a>
        </div>
        <div class="flex lg:hidden">
          <button x-show="!mobileOpen" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="mobileOpen = !mobileOpen">
            <span class="sr-only">Open main menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path></svg>
          </button>
          <button x-init="$el.classList.remove('hidden')" x-show="mobileOpen" type="button" class="hidden -m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileOpen = !mobileOpen">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
          <div>
            <button @mouseenter="open = true"
              class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900 outline-none" type="button" aria-expanded="false">
              产品中心
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 flex-none text-gray-400"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
            </button>
            <div
              x-init="$el.classList.remove('hidden')"
              x-show="open" 
              x-transition:enter="transition ease-out duration-200" 
              x-transition:enter-start="opacity-0 -translate-y-1"
              x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 translate-y-0"
              x-transition:leave-end="opacity-0 -translate-y-1"
              x-description="Products" 
              class="hidden absolute inset-x-0 top-20 bg-white shadow-lg -z-10 ring-1 ring-gray-900/5" 
              x-ref="panel"
              @mouseleave="if(!$event.relatedTarget.contains($el)) open = false"
             >
              <div class="mx-auto grid max-w-screen-xl grid-cols-4 gap-x-4 px-6 py-10 lg:px-8 xl:gap-x-8">
                  <div class="group relative rounded-lg p-6 text-sm leading-6 hover:bg-gray-50 z-10">
                      <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-6 w-6 text-gray-600 group-hover:text-indigo-600">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z"></path>
                              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z"></path>
                          </svg>
                      </div>
                      <a href="<?php echo home_url('products');?>" class="mt-6 block font-semibold text-gray-900 outline-none">隔热砖<span class="absolute inset-0"></span></a>
                      <p class="mt-1 text-gray-600">Get a better understanding of your traffic</p>
                  </div>
                  <div class="group relative rounded-lg p-6 text-sm leading-6 hover:bg-gray-50 z-10">
                      <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-6 w-6 text-gray-600 group-hover:text-indigo-600">
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59"
                              ></path>
                          </svg>
                      </div>
                      <a href="<?php echo home_url('products');?>" class="mt-6 block font-semibold text-gray-900 outline-none">浇注料<span class="absolute inset-0"></span></a>
                      <p class="mt-1 text-gray-600">Speak directly to your customers</p>
                  </div>
              </div>
              <div class="bg-gray-50">
                  <div class="mx-auto max-w-screen-xl">
                      <div class="grid grid-cols-1 divide-x divide-gray-900/5 border-x border-gray-900/5">
                          <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 flex-none text-gray-400">
                                  <path
                                      fill-rule="evenodd"
                                      d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z"
                                      clip-rule="evenodd"
                                  ></path>
                              </svg>
                              Contact sales
                          </a>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <a href="#" class="text-sm font-semibold leading-6 text-gray-900" @mouseenter="open = false">解决方案</a>
          <a href="#" class="text-sm font-semibold leading-6 text-gray-900" @mouseenter="open = false">客户案例</a>
          <a href="#" class="text-sm font-semibold leading-6 text-gray-900" @mouseenter="open = false">服务支持</a>
          <a href="#" class="text-sm font-semibold leading-6 text-gray-900" @mouseenter="open = false">新闻</a>
          <a href="/about" class="text-sm font-semibold leading-6 text-gray-900" @mouseenter="open = false">关于我们</a>
        </div>
      </nav>
      <!-- Mobile menu, show/hide based on menu open state. -->
      <div x-init="$el.classList.remove('hidden')" x-show="mobileOpen" class="hidden lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 top-[80px] z-10" @click="mobileOpen = false"></div>
        <div class="absolute top-[80px] z-10 w-full bg-white px-6 pb-6 border-b border-gray-900/10">
          <div class="divide-y divide-gray-500/10">
            <div class="space-y-2">
              <div class="-mx-3">
                <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false" @click="productsOpen = !productsOpen">
                  产品中心
                  <svg class="h-5 w-5 flex-none" :class="{'rotate-180': productsOpen}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </button>
                <div x-init="$el.classList.remove('hidden')" x-show="productsOpen" class="hidden mt-2 space-y-2" id="disclosure-1">
                  <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">隔热砖</a>
                  <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">浇注料</a>
                </div>
              </div>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">解决方案</a>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">客户案例</a>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">服务支持</a>
            </div>
          </div>
        </div>
      </div>
    </header>