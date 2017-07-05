<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body>
<header>
<!-- Nav Bar -->
<nav class="navbar navbar-default" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <!-- <span class="sr-only">Toggle navigation</span> -->
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <!-- <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a> -->
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class=" navbar-collapse navbar-ex1-collapse collapse">
    <?php
      /* Primary navigation */
        wp_nav_menu( array(
            'menu'              => 'main-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'navbar-ex1-collapse',
            'container_id'      => 'navbar-ex1-collapse',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
        );
    ?>
  </div>
</nav>


</header>
