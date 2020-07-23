<?php
function my_theme_enqueue_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

add_theme_support('post-thumbnails');
add_post_type_support( 'testimonials', 'thumbnail' ); 

function create_custom_post_types() {
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'testimonials' ),
            'taxonomies' => array( 'category','testimonial'),
            'supports' => array('thumbnail'),
        )
    );

    // register_post_type( 'services',
    // array(
    //     'labels' => array(
    //         'name' => __( 'Services' ),
    //         'singular_name' => __( 'Service' )
    //     ),
    //     'public' => true,
    //     'has_archive' => true,
    //     'rewrite' => array( 'slug' => 'services' ),
    //     )
    // );
    // register_post_type( 'gallery',
    // array(
    //     'labels' => array(
    //         'name' => __( 'Gallery' ),
    //         'singular_name' => __( 'Gallery Item' )
    //     ),
    //     'public' => true,
    //     'has_archive' => true,
    //     'rewrite' => array( 'slug' => 'gallery' ),
    //     )
    // );
}
add_action( 'init', 'create_custom_post_types' );

// add Divi Builder to custom post types
// function my_et_builder_post_types( $post_types ) {
//     $post_types[] = 'case_studies';
//     // $post_types[] = 'YOUR-POST-TYPE';
 
//     return $post_types;
// }
// add_filter( 'et_builder_post_types', 'my_et_builder_post_types' );

add_filter( 'wpcf7_validate_configuration', '__return_false' );