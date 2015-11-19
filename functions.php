<?php
  //enqueue scripts and styles *use production assets. Dev assets are located in assets/css and assets/js
  function WPS_scripts() {

  	wp_enqueue_style( 'style-sw', get_template_directory_uri().'/assets/css/featherlight.min.css');
    wp_enqueue_style( 'style-featherlight', get_template_directory_uri().'/style.css');
    wp_enqueue_script('script-parallax',get_template_directory_uri().'/assets/prod/jquery.parallax-1.1.3.min.js', array('jquery'), '1.0.0', true);
  	wp_enqueue_script( 'script-sw', get_template_directory_uri().'/assets/prod/sw.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'script-featherlight', get_template_directory_uri().'/assets/js/featherlight.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('typekit',"//use.typekit.net/gka0dvw.js");
    wp_enqueue_script( 'script-match', get_template_directory_uri().'/assets/js/jquery.matchHeight-min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/libs/font-awesome-4.1.0/css/font-awesome.min.css');

    wp_enqueue_script('jquery-ui',"//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js");

    $page = get_page_by_title('Calendar');

    if(is_page($page->ID)) {
      wp_enqueue_script('calendar-script',get_template_directory_uri().'/assets/js/calendar-script.js');
    }
  }

  add_action( 'wp_enqueue_scripts', 'WPS_scripts' );

  //theme supports
  add_theme_support('post-thumbnails');
  $defaults = array(
    'flex-height'   => true,
    'flex-width'    => true,
    'height'        => 100,
    'width'         => 200,
    'default-image' => get_template_directory_uri() . '/assets/img/logo.gif',
    'header-text'   => false
  );
  add_theme_support('custom-header', $defaults);
  add_theme_support('custom-background');
  add_theme_support('html5');
  add_theme_support('automatic-feed-links');

  //menus
  register_nav_menus(array(
  	'main_nav' => 'Header and breadcrumb trail heirarchy',
  	'social_nav' => 'Social menu used throughout'
  ));

  //widgets
  register_sidebar(array(
	   'name'          => __( 'Footer - Left' ),
	   'id'            => 'footer-left',
	   'description'   => '',
     'class'         => '',
	   'before_widget' => '',
	   'after_widget'  => '',
	   'before_title'  => '<h2>',
	   'after_title'   => '</h2>' ));

  //editor style
  add_editor_style('assets/wp-admin/custom-editor-style.css');

  //login page style
  function WPS_loginCSS() {
	   echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/assets/img/wp-login.css"/>';
  } add_action('login_head', 'WPS_loginCSS');

  //footer attribution
  function WPS_footer_admin () {
	   echo 'Theme developed by MESH.';
  } add_filter('admin_footer_text', 'WPS_footer_admin');

  //disable code editors
  define('DISALLOW_FILE_EDIT', true);

    add_action('admin_menu', 'delete_menu_items'); // deleting menu items from admin area
  function delete_menu_items() {

    /*** Remove menu http://codex.wordpress.org/Function_Reference/remove_menu_page
    syntaxe : remove_menu_page( $menu_slug )  **/
    //remove_menu_page('index.php'); // Dashboard
    remove_menu_page('edit.php'); // Posts
    //remove_menu_page('upload.php'); // Media
    //remove_menu_page('link-manager.php'); // Links
    //remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('edit-comments.php'); // Comments
    //remove_menu_page('themes.php'); // Appearance
    //remove_menu_page('plugins.php'); // Plugins
    //remove_menu_page('users.php'); // Users
    //remove_menu_page('tools.php'); // Tools
    //remove_menu_page('options-general.php'); // Settings
  }

?>
