<header id="masthead" class="fixed top-0 bg-cover bg-center relative" style="background-image: url('/wp-content/themes/greenscapes/theme/hero-blue.webp');">
  <div class="container border-b-1 mx-auto px-4 flex items-center justify-between py-4">
    <!-- Site Title / Logo -->
    <div>
      <h1 aria-label="<?php bloginfo('name'); ?>">
        <img class="max-w-[150px] md:max-w-[200px]" src="/wp-content/themes/greenscapes/theme/logo-alpha.webp" />
      </h1>
    </div>

    <!-- Desktop Navigation -->
    <nav id="nav_primary" class="hidden md:flex">
      <?php wp_nav_menu(array('theme_location' => 'nav', 'menu_id' => 'desktop_nav')); ?>
    </nav>

    <!-- Mobile Menu Toggle -->
    <button id="menu-toggle" class="md:hidden text-white cursor-pointer">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="nav_mobile" class="md:hidden bg-primary text-white p-4 hidden flex-col items-start space-y-2">
    <?php wp_nav_menu(array('theme_location' => 'nav', 'menu_id' => 'mobile_nav')); ?>
  </div>
</header>