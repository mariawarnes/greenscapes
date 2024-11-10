<?php

/**
 * greenscapes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package greenscapes
 */

if (! defined('GREENSCAPES_VERSION')) {
  /*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
  define('GREENSCAPES_VERSION', '0.1.0');
}

if (! defined('GREENSCAPES_TYPOGRAPHY_CLASSES')) {
  /*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `greenscapes_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
  define(
    'GREENSCAPES_TYPOGRAPHY_CLASSES',
    'prose prose-neutral max-w-none prose-a:text-primary'
  );
}

if (! function_exists('greenscapes_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function greenscapes_setup()
  {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on greenscapes, use a find and replace
		 * to change 'greenscapes' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('greenscapes', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
    add_theme_support('title-tag');

    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
      array(
        'menu-1' => __('Primary', 'greenscapes'),
        'menu-2' => __('Footer Menu', 'greenscapes'),
      )
    );

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Enqueue editor styles.
    add_editor_style('style-editor.css');
    add_editor_style('style-editor-extra.css');

    // Add support for responsive embedded content.
    add_theme_support('responsive-embeds');

    // Remove support for block templates.
    remove_theme_support('block-templates');
  }
endif;
add_action('after_setup_theme', 'greenscapes_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function greenscapes_widgets_init()
{
  register_sidebar(
    array(
      'name'          => __('Footer', 'greenscapes'),
      'id'            => 'sidebar-1',
      'description'   => __('Add widgets here to appear in your footer.', 'greenscapes'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'greenscapes_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function greenscapes_scripts()
{
  wp_enqueue_style('greenscapes-style', get_stylesheet_uri(), array(), GREENSCAPES_VERSION);
  wp_enqueue_script('greenscapes-script', get_template_directory_uri() . '/js/script.min.js', array(), GREENSCAPES_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'greenscapes_scripts');

/**
 * Enqueue the block editor script.
 */
function greenscapes_enqueue_block_editor_script()
{
  if (is_admin()) {
    wp_enqueue_script(
      'greenscapes-editor',
      get_template_directory_uri() . '/js/block-editor.min.js',
      array(
        'wp-blocks',
        'wp-edit-post',
      ),
      GREENSCAPES_VERSION,
      true
    );
    wp_add_inline_script('greenscapes-editor', "tailwindTypographyClasses = '" . esc_attr(GREENSCAPES_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
  }
}
add_action('enqueue_block_assets', 'greenscapes_enqueue_block_editor_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function greenscapes_tinymce_add_class($settings)
{
  $settings['body_class'] = GREENSCAPES_TYPOGRAPHY_CLASSES;
  return $settings;
}
add_filter('tiny_mce_before_init', 'greenscapes_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


// Typical Helpers /////////////////////////////////////////////////

// Site Title
define('SITE_TITLE', get_bloginfo('name'));

// Site Title
define('SITE_DESC', get_bloginfo('description'));

// Site URL
define('SITE_URL', get_bloginfo('url'));

// Template Path
define('TEMP_PATH', get_bloginfo('template_directory') . '/resources');


// Register WP Features ////////////////////////////////////////////

// Add Thumbnails
add_theme_support('post-thumbnails');

// Register Nav
register_nav_menus(
  array(
    'nav' => __('Primary Nav')
  )
);

// Custom Taxonomies ///////////////////////////////////////////////

add_action('init', 'create_taxonomy');
function create_taxonomy()
{

  $custom_taxonomies = array(
    "work" => array(
      "for"    => "work",
      "single" => "Work",
      "plural" => "Work",
      "slug"   => "work"
    ),
    "services" => array(
      "for"    => "services",
      "single" => "Service",
      "plural" => "Services",
      "slug"   => "services"
    )
  );

  foreach ($custom_taxonomies as $tax => $val) {
    register_taxonomy($tax, $val['for'], array(
      'hierarchical'      => (array_key_exists('hierarchical', $val)) ? $val['hierarchical'] : true,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array(
        'slug' => (array_key_exists('slug', $val)) ? $val['slug'] : $tax,
      ),
      'labels'            => array(
        'name'              => _x($val['plural'],  $val['single'] . ' Plural Label', 'Functions'),
        'singular_name'     => _x($val['single'],  $val['single'] . ' Singular Label', 'Functions'),
        'menu_name'         => _x($val['plural'],  $val['single'] . ' Plural Label', 'Functions'),
        'search_items'      => __('Search ' . $val['plural']),
        'all_items'         => __('All ' . $val['plural']),
        'parent_item'       => __('Parent ' . $val['single']),
        'parent_item_colon' => __('Parent ' . $val['single'] . ':'),
        'edit_item'         => __('Edit ' . $val['single']),
        'update_item'       => __('Update ' . $val['single']),
        'add_new_item'      => __('Add New ' . $val['single']),
        'new_item_name'     => __('New ' . $val['single'] . ' Name'),
      ),
    ));
  }
}

// Custom Post Types ///////////////////////////////////////////////

add_action('init', 'create_post_type');
function create_post_type()
{

  $custom_post_types = array(
    "work" => array(
      "single"    => "Work",
      "plural"    => "Work",
      "menu_icon" => "dashicons-portfolio",
      "slug"      => "work",
      "supports"  => array("title", "editor", "thumbnail", "excerpt", "page-attributes")
    ),
    "services" => array(
      "single"    => "Service",
      "plural"    => "Services",
      "menu_icon" => "dashicons-hammer",
      "slug"      => "services",
      "supports"  => array("title", "editor", "thumbnail", "excerpt", "page-attributes")
    ),
  );

  foreach ($custom_post_types as $type => $val) {
    register_post_type(
      $type,
      array(
        'label'                 => $val["plural"],
        'description'           => '',
        'public'                => true,
        'menu_icon'             => (array_key_exists('menu_icon', $val)) ? $val['menu_icon'] : 'dashicons-star-filled',
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'has_archive'           => true,
        'rewrite'               => array(
          'slug'                => (array_key_exists('slug', $val)) ? $val['slug'] : $type,
          'with_front'          => '0'
        ),
        'query_var'             => true,
        'menu_position'         => (array_key_exists('menu_position', $val)) ? $val['menu_position'] : 5,
        'supports'              => $val["supports"],
        'labels'                => array(
          'name'                => _x($val["plural"],  $val["single"] . " Singular Label", "Functions"),
          'singular_name'       => _x($val["single"],  $val["single"] . " Singular Label", "Functions"),
          'menu_name'           => _x($val["plural"],  $val["single"] . " Singular Label", "Functions"),
          'add_new'             => __('Add ' . $val["single"]),
          'add_new_item'        => __('Add New ' . $val["single"]),
          'edit'                => __('Edit'),
          'edit_item'           => __('Edit ' . $val["single"]),
          'new_item'            => __('New ' . $val["single"]),
          'view'                => __('View ' . $val["single"]),
          'view_item'           => __('View ' . $val["single"]),
          'search_items'        => __('Search ' . $val["plural"]),
          'not_found'           => __('No ' . $val["plural"] . ' Found'),
          'not_found_in_trash'  => __('No ' . $val["plural"] . ' Found in Trash'),
          'parent'              => __('Parent ' . $val["single"]),
        )
      )
    );
  }
}

// Add Options Page /////////////////////////////////////

$args = array(
  'page_title' => 'Misc Fields'
);

if (function_exists('acf_add_options_page')) {
  acf_add_options_page($args);
}

// Change Backend Menu ///////////////////////////////////////////////

add_action('admin_menu', 'edit_admin_menus');
function edit_admin_menus()
{
  remove_menu_page('edit-comments.php');
  remove_menu_page('edit.php');
  remove_submenu_page('options-general.php', 'options-discussion.php');
  remove_submenu_page('options-general.php', 'options-writing.php');
}

function custom_menu_order($menu_ord)
{
  if (!$menu_ord) return true;

  // Remove ACF Options
  $menu = 'admin.php?page=acf-options-misc-fields';
  $menu_ord = array_diff($menu_ord, array($menu));

  return array(
    'index.php',                                // Dashboard
    'upload.php',                               // Media
    'edit.php?post_type=page',                  // Pages
    'separator1',
    'acf-options-misc-fields',                  // Misc Fields
    'edit.php?post_type=work',                  // Work
    'edit.php?post_type=services',              // Services
    'admin.php?page=wpcf7',                     // Contact Forms
    'separator2',
    'themes.php',                               // Appearance
    'plugins.php',                              // Plugins
    'users.php',                                // Users
    'tools.php',                                // Tools
    'options-general.php',                      // Settings
  );
}

add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order', 99);

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

  global $wp_version;
  if ($wp_version !== '4.7.1') {
    return $data;
  }

  $filetype = wp_check_filetype($filename, $mimes);

  return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
  ];
}, 10, 4);

function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');
