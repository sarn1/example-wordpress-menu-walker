# Example WordPress Menu-Walker
A base template to demo a basic WP menu-walker in action.  This is not production code, for learning only.
## Dependencies
- WordPress
- Bootstrap
- JQuery
## Notes
In order to get this working in your own WordPress project, please follow the following steps.

Add the bootstrap menu walker code into the root of your theme.  This is the file called *wp_bootstrap_navwalker.php*.

Include the file into your theme's *functions.php* by using coding the following line:
```php
require_once('wp_bootstrap_navwalker.php');
```
In the area where you want the menu to show up in in your theme, most likely somewhere in *header.php*, put the following code:
```html
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
```
Feel free to uncomment some of the code that is commented for some surprise features!  Lastly, this menu requires JQuery and Bootstrap, so for the sake of simplicity for demo purposes, we'll pull these in from a CDN.  Add the following near the end of your theme, most likely *footer.php*.
```html
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
```

## Screenshots
Desktop:
![Desktop](//github.com/sarn1/example-wordpress-menu-walker/blob/master/doc/desktop.png)
Mobile:
![Mobile](//github.com/sarn1/example-wordpress-menu-walker/blob/master/doc/mobile.png)
Menu in WP Admin:
![WP Menu Admin](//github.com/sarn1/example-wordpress-menu-walker/blob/master/doc/menu.png)
