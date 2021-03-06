<?php

include_once get_theme_file_path( '/inc/customizer/class-kirki-installer-section.php' );
include_once get_theme_file_path( '/inc/customizer/customizer-main.php' );

if (!function_exists('simpleshop_setup')):

    function simpleshop_setup()
{
        load_theme_textdomain('simpleshop', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1568, 9999);

        register_nav_menus(
            array(
                'menu-1' => __('Primary', 'simpleshop'),
                'footer' => __('Footer Menu', 'simpleshop'),
                'social' => __('Social Links Menu', 'simpleshop'),
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
            )
        );

        add_theme_support(
            'custom-logo',
            array(
                'height'      => 190,
                'width'       => 190,
                'flex-width'  => false,
                'flex-height' => false,
            )
        );

        add_theme_support('custom-background', apply_filters('simpleshop_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');        
    }
endif;
add_action('after_setup_theme', 'simpleshop_setup');

function simpleshop_add_editor_styles(){    
    add_editor_style('customize-editor-style.css');
}
add_action('admin_init', 'simpleshop_add_editor_styles');


function simpleshop_content_width(){
    $GLOBALS['content_width'] = apply_filters('simpleshop_content_width', 1170);
}
add_action('after_setup_theme','simpleshop_content_width', 0);

function simpleshop_widgets_init() {
    register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'simpleshop' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'simpleshop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action('widgets_init', 'simpleshop_widgets_init');



function simpleshop_assets() {
    wp_enqueue_style('google-fonts','//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900',null,'1.0');
    wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css',null,'4.1.0');
    wp_enqueue_style('font-awesome-css',get_template_directory_uri().'/assets/vendor/font-awesome/css/font-awesome.min.css',null,'4.7.0');
    wp_enqueue_style('bicon-css',get_template_directory_uri().'/assets/vendor/bicon/css/bicon.css',null,'3.3.7');

    wp_enqueue_style('woocommerce-layouts-css',get_template_directory_uri().'/assets/css/woocommerce-layouts.css',null,'1.0');
    /* wp_enqueue_style('woocommerce-small-screen-css',get_template_directory_uri().'/assets/css/woocommerce-small-screen.css',null,'1.0');
    wp_enqueue_style('woocommerce-css',get_template_directory_uri().'/assets/css/woocommerce.css',null,'1.0'); */

    wp_enqueue_style('simpleshop-theme-css',get_template_directory_uri().'/assets/css/main.css',null,'1.0');
    wp_enqueue_style('simpleshop-css',get_stylesheet_uri());




    wp_enqueue_script("bootstrap-js",get_theme_file_uri("/assets/vendor/bootstrap/js/bootstrap.min.js"),array('jquery'),'4.1.0',true);
    wp_enqueue_script("popper-js",get_theme_file_uri("/assets/vendor/popper.min.js"),array('jquery'),'3.3.7',true);
    wp_enqueue_script("simpleshop-js",get_theme_file_uri("/assets/js/scripts.js"),array('jquery'),'1.0',true);



    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment_reply');
    }
}
add_action('wp_enqueue_scripts', 'simpleshop_assets');

function shimpleshop_subcategory_count_html($markup){
    if (get_theme_mod('simpleshop_homepage_display_categories_number') !='1') {
        return '';
    }
    return $markup;
}
add_filter('woocommerce_subcategory_count_html','shimpleshop_subcategory_count_html');
/* if (get_theme_mod('simpleshop_homepage_display_categories_number') !='1') {
} */

/* need to check this code I have found
add_filter('add_calculate_image_sizes','__return_empty_array');
add_filter('add_calculate_image_srcset','__return_empty_array'); */


// Override the calculated image sizes
add_filter( 'wp_calculate_image_sizes', '__return_empty_array');

// Override the calculated image sources
add_filter( 'wp_calculate_image_srcset', '__return_empty_array');

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
// remove_filter('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

remove_filter('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
remove_filter('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);


remove_filter('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_add_to_cart',10);

function simpleshop_before_shop_loop_item(){
    echo '<div class="product-wrap">';
}
add_action('woocommerce_before_shop_loop_item','simpleshop_before_shop_loop_item',10);


function simpleshop_product_add_to_cart_text($text){
    return '<i class="fa fa-shopping-basket"></i>';
}
add_filter('woocommerce_product_add_to_cart_text','simpleshop_product_add_to_cart_text');
function simpleshop_before_shop_loop_item_title(){
    echo '</div><div class="woocommerce-product-title-wrap">';
}
add_action('woocommerce_before_shop_loop_item_title','simpleshop_before_shop_loop_item_title');

add_action('woocommerce_after_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',11);

add_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_price',10);

function simpleshop_after_shop_loop_item_title(){
    echo '<a href="#" class="wish-list"><i class="fa fa-heart-o"></i></a></div>';
}
add_action('woocommerce_after_shop_loop_item_title','simpleshop_after_shop_loop_item_title');