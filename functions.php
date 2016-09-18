<?php

//nav menus
$navmenus = array(
  'Main Menu'
);

//widget areas
$widgetareas = array(
  'Sidebar', 'Footer'
);

//turn off toolset types front-end menu
add_filter('types_information_table', '__return_false');


//enable theme features
add_theme_support('menus'); //enable menus
add_theme_support('post-thumbnails'); //enable post thumbnails
add_theme_support('title-tag'); //enable title


//register nav menus
add_action('init', 'jet4_register_nav_menus');
function jet4_register_nav_menus()
{
  global $navmenus;
  if (function_exists('register_nav_menus')) {
    $navmenus_proc = array();
    foreach ($navmenus as $menu) {
      $key = sanitize_title($menu);
      $val = $menu;
      $navmenus_proc[$key] = $val;
    }
    register_nav_menus($navmenus_proc);
  }
}


//register widget areas
add_action('init', 'jet4_register_widget_areas');
function jet4_register_widget_areas()
{
  global $widgetareas;
  if (function_exists('register_sidebar')) {
    foreach ($widgetareas as $widgetarea) {
      register_sidebar(array(
        'name' => $widgetarea,
        'id' => sanitize_title($widgetarea),
        'before_widget' => '<div id="%1$s" class="widget ' . (string)sanitize_title($widgetarea) . ' %2$s %1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
      ));
    }
  }
}

//determine if a page is a blog type page - to be used to inject into body class for blog type pages
function my_blog_page()
{
  //determine if blog type page
  if (is_home() || is_single() || is_search() || is_archive()) {
    return true;
  }

  return false;
}

// Add specific CSS class by filter
add_filter('body_class', 'my_body_class_names');
function my_body_class_names($classes)
{
  $classes[] = '';
  // add 'class-name' to the $classes array
  if (my_blog_page()) {
    $classes[] = 'blog_pages';
  }

  // return the $classes array
  return $classes;
}



//register theme script
add_action('init', 'jet4_register_theme_script');
function jet4_register_theme_script()
{
  if (!is_admin()) {
    wp_register_script('jet4_theme_script', get_bloginfo('template_directory') . '/includes/scripts.min.js', array('jquery'));
    wp_enqueue_script('jet4_theme_script');

    /* optional for JQuery backwards compatibility
    wp_register_script('jet4_theme_script5',	get_bloginfo('template_directory') . '/includes/jquery-migrate-1.1.0.min.js' );
    wp_enqueue_script('jet4_theme_script5');
    */

    //wp_register_script('jet4_theme_script7',	get_bloginfo('template_directory') . '/includes/bootstrap/js/bootstrap.min.js' );
    //wp_enqueue_script('jet4_theme_script7');
  }
}


add_action('wp_enqueue_scripts', 'prefix_add_my_stylesheet');
function prefix_add_my_stylesheet()
{

  //wp_register_style( 's452-bootstrap', get_bloginfo('template_directory').'/includes/bootstrap/css/bootstrap.min.css' , __FILE__ );
  //wp_enqueue_style( 's452-bootstrap' );

  wp_register_style('s452-style', get_bloginfo('template_directory') . '/style.css', __FILE__);
  wp_enqueue_style('s452-style');

}

//Adds instruction text after the post title input
function emersonthis_edit_form_after_title()
{
  $tip = '<strong>TIP:</strong> To create a single line break use SHIFT+RETURN. By default, RETURN creates a new paragraph.';
  echo '<p style="margin-bottom:0;">' . $tip . '</p>';
}

add_action(
  'edit_form_after_title',
  'emersonthis_edit_form_after_title'
);

/*	TINYMCE
//http://www.wpexplorer.com/wordpress-tinymce-tweaks/


// Add custom Fonts to the Fonts list
if ( ! function_exists( 'wpex_mce_google_fonts_array' ) ) {
    function wpex_mce_google_fonts_array( $initArray ) {
        $initArray['font_formats'] = 'Lato=Lato;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
            return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_google_fonts_array' );

// Add Google Scripts for use with the editor
if ( ! function_exists( 'wpex_mce_google_fonts_styles' ) ) {

    function wpex_mce_google_fonts_styles() {

      $font_url = 'http://fonts.googleapis.com/css?family=Lato:300,400,700';

           add_editor_style( str_replace( ',', '%2C', $font_url ) );

    }

}
add_action( 'init', 'wpex_mce_google_fonts_styles' );

// Enable font size & font family selects in the editor
if ( ! function_exists( 'wpex_mce_buttons' ) ) {
    function wpex_mce_buttons( $buttons ) {
        array_unshift( $buttons, 'fontselect' ); // Add Font Select
        array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
        return $buttons;
    }
}


function my_mce4_options( $init ) {
$default_colours = '
    "000000", "Black",        "993300", "Burnt orange", "333300", "Dark olive",   "003300", "Dark green",   "003366", "Dark azure",   "000080", "Navy Blue",      "333399", "Indigo",       "333333", "Very dark gray", 
    "800000", "Maroon",       "FF6600", "Orange",       "808000", "Olive",        "008000", "Green",        "008080", "Teal",         "0000FF", "Blue",           "666699", "Grayish blue", "808080", "Gray", 
    "FF0000", "Red",          "FF9900", "Amber",        "99CC00", "Yellow green", "339966", "Sea green",    "33CCCC", "Turquoise",    "3366FF", "Royal blue",     "800080", "Purple",       "999999", "Medium gray", 
    "FF00FF", "Magenta",      "FFCC00", "Gold",         "FFFF00", "Yellow",       "00FF00", "Lime",         "00FFFF", "Aqua",         "00CCFF", "Sky blue",       "993366", "Brown",        "C0C0C0", "Silver", 
    "FF99CC", "Pink",         "FFCC99", "Peach",        "FFFF99", "Light yellow", "CCFFCC", "Pale green",   "CCFFFF", "Pale cyan",    "99CCFF", "Light sky blue", "CC99FF", "Plum",         "FFFFFF", "White"
';
$custom_colours = '
	"cc9966", "Link Color"
	,"330000", "Dark Brown Color"
';
$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']'; // build colour grid default+custom colors
$init['textcolor_rows'] = 6; // enable 6th row for custom colours in grid
return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');
*/

/* BOOTSTRAP MODS 
//auto add img-responsive to all images added via the wp post
//http://stackoverflow.com/questions/20473004/how-to-add-automatic-class-in-image-for-wordpress-post
function add_responsive_class($content){

        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
        $document = new DOMDocument();
        libxml_use_internal_errors(true);
        $document->loadHTML(utf8_decode($content));

        $imgs = $document->getElementsByTagName('img');
        foreach ($imgs as $img) {           
           $img->setAttribute('class','img-responsive');
        }

        $html = $document->saveHTML();
        return $html;   
}
add_filter        ('the_content', 'add_responsive_class');


require_once('includes/bootstrap/wp_bootstrap_navwalker.php');
 
*/


/* BLOG FUNCTIONALITY

//blog commenting 
function mw_comments($comment, $args, $depth) { ?> 
	<?php $GLOBALS['comment'] = $comment; ?>

	
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="comment-author vcard">
			<div class="image">
				<?php echo get_avatar( $comment, 48 ); ?>
			</div>
			<div class="info">
				<div class="comment-meta">
					<a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a>
				</div>
				<small class="comment-date"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
			</div>
		</div>		 
		<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
		<?php endif; ?>		 
		 <div class="comment-text">	
			 <?php comment_text() ?>
			 <div class="reply">
				<?php echo comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])); ?>
			 </div>
		 </div>
<?php }  


//automatically assign categories to blog post - assign all blog post as blog 
function add_category_automatically1($post_ID) {  
    global $wpdb;  
        if(!in_category('bundle')){  
            $cat = array(1);  
            wp_set_object_terms($post_ID, $cat, 'category', true);  
        }  
}  
add_action('publish_post', 'add_category_automatically1');  


*/

if (!function_exists('pq')) {
  function pq($str, $return = false, $more = true)
  {
    ini_set('memory_limit', -1); // lol
    ob_start();
    echo '><pre>';
    if ($more)
      var_dump($str);
    else
      print_r($str);
    echo '</pre>';
    $out = preg_replace(
      [
        "/=>\n\s*/",
        '/(\s)NULL(\s)/',
        "#\"(https?://|/?/)(.*)\"#",
      ],
      [
        " => ",
        '$1null$2',
        '"<a href="$1$2">$1$2</a>"',
      ],
      ob_get_clean()
    );
    if ($return)
      return $out;
    echo $out;
  }

  function pqd($str, $die = "", $return = false, $more = true)
  {
    pq($str, $return, $more);
    die($die);
  }
}