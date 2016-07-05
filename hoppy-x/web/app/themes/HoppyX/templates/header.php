<a href="javascript:void(0)" class="menu-icon" id="js-mobile-menu"></a>
<header class="banner">
  <a href="javascript:void(0)" class="overlay-close"></a>
  <nav class="nav-primary" id="js-navigation-menu">
    <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
    endif;
    ?>
  </nav>
</header>
