<?php
/**
 * Recruit Premium Theme Functions
 *
 * @package recruit-premium
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'RECRUIT_PREMIUM_VERSION', '1.0.0' );
define( 'RECRUIT_PREMIUM_DIR', get_template_directory() );
define( 'RECRUIT_PREMIUM_URI', get_template_directory_uri() );

/* =============================================================================
   Theme Setup
   ============================================================================= */
function recruit_premium_setup() {
    load_theme_textdomain( 'recruit-premium', RECRUIT_PREMIUM_DIR . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style',
    ] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wp-block-styles' );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'recruit-premium' ),
        'footer'  => __( 'Footer Navigation', 'recruit-premium' ),
    ] );

    add_image_size( 'recruit-hero',   1600, 900,  true );
    add_image_size( 'recruit-card',   800,  600,  true );
    add_image_size( 'recruit-thumb',  400,  300,  true );
    add_image_size( 'recruit-square', 400,  400,  true );
}
add_action( 'after_setup_theme', 'recruit_premium_setup' );

/* =============================================================================
   Enqueue Assets
   ============================================================================= */
function recruit_premium_enqueue_assets() {
    // Google Fonts — Cormorant Garamond (serif) + Noto Serif JP + Montserrat (sans)
    wp_enqueue_style(
        'recruit-premium-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Montserrat:wght@400;500;600;700;800&family=Noto+Serif+JP:wght@400;500;700&display=swap',
        [],
        null
    );

    // Theme stylesheet
    wp_enqueue_style(
        'recruit-premium-style',
        get_stylesheet_uri(),
        [ 'recruit-premium-fonts' ],
        RECRUIT_PREMIUM_VERSION
    );

    // Main script
    wp_enqueue_script(
        'recruit-premium-main',
        RECRUIT_PREMIUM_URI . '/assets/js/main.js',
        [],
        RECRUIT_PREMIUM_VERSION,
        [ 'strategy' => 'defer', 'in_footer' => true ]
    );
}
add_action( 'wp_enqueue_scripts', 'recruit_premium_enqueue_assets' );

/* =============================================================================
   Custom Post Types
   ============================================================================= */
function recruit_premium_register_post_types() {
    // Job listings
    register_post_type( 'job', [
        'labels' => [
            'name'          => __( '求人情報', 'recruit-premium' ),
            'singular_name' => __( '求人', 'recruit-premium' ),
            'add_new_item'  => __( '求人を追加', 'recruit-premium' ),
            'edit_item'     => __( '求人を編集', 'recruit-premium' ),
        ],
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-businessman',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'rewrite'       => [ 'slug' => 'jobs' ],
        'show_in_rest'  => true,
    ] );

    // Employee voices
    register_post_type( 'voice', [
        'labels' => [
            'name'          => __( '社員の声', 'recruit-premium' ),
            'singular_name' => __( '社員の声', 'recruit-premium' ),
            'add_new_item'  => __( '社員の声を追加', 'recruit-premium' ),
        ],
        'public'       => true,
        'has_archive'  => false,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'rewrite'      => [ 'slug' => 'voices' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'recruit_premium_register_post_types' );

/* =============================================================================
   Custom Taxonomies
   ============================================================================= */
function recruit_premium_register_taxonomies() {
    register_taxonomy( 'job_type', 'job', [
        'labels' => [
            'name'          => __( '雇用形態', 'recruit-premium' ),
            'singular_name' => __( '雇用形態', 'recruit-premium' ),
        ],
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'job-type' ],
        'show_in_rest' => true,
    ] );

    register_taxonomy( 'job_department', 'job', [
        'labels' => [
            'name'          => __( '部署・職種', 'recruit-premium' ),
            'singular_name' => __( '部署・職種', 'recruit-premium' ),
        ],
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'job-department' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'recruit_premium_register_taxonomies' );

/* =============================================================================
   Widgets
   ============================================================================= */
function recruit_premium_register_sidebars() {
    register_sidebar( [
        'name'          => __( 'Sidebar', 'recruit-premium' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ] );

    register_sidebar( [
        'name'          => __( 'Footer Widget Area', 'recruit-premium' ),
        'id'            => 'footer-1',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget__title">',
        'after_title'   => '</h4>',
    ] );
}
add_action( 'widgets_init', 'recruit_premium_register_sidebars' );

/* =============================================================================
   Custom Meta Boxes (Job)
   ============================================================================= */
function recruit_premium_add_meta_boxes() {
    add_meta_box(
        'job_details',
        __( '求人詳細情報', 'recruit-premium' ),
        'recruit_premium_job_meta_callback',
        'job',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'recruit_premium_add_meta_boxes' );

function recruit_premium_job_meta_callback( $post ) {
    wp_nonce_field( 'recruit_premium_job_meta', 'recruit_premium_job_nonce' );
    $fields = [
        'job_salary'    => [ 'label' => '給与', 'type' => 'text', 'placeholder' => '例: 月給25万円〜35万円' ],
        'job_location'  => [ 'label' => '勤務地', 'type' => 'text', 'placeholder' => '例: 東京都渋谷区' ],
        'job_hours'     => [ 'label' => '勤務時間', 'type' => 'text', 'placeholder' => '例: 9:00〜18:00（フレックス可）' ],
        'job_holiday'   => [ 'label' => '休日・休暇', 'type' => 'text', 'placeholder' => '例: 完全週休2日制（土日祝）' ],
        'job_benefits'  => [ 'label' => '福利厚生', 'type' => 'textarea', 'placeholder' => '福利厚生を入力' ],
        'job_deadline'  => [ 'label' => '応募締切', 'type' => 'text', 'placeholder' => '例: 2025年3月31日（随時募集）' ],
    ];
    echo '<table class="form-table">';
    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        echo '<tr><th><label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';
        if ( $field['type'] === 'textarea' ) {
            echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="4" style="width:100%" placeholder="' . esc_attr( $field['placeholder'] ) . '">' . esc_textarea( $value ) . '</textarea>';
        } else {
            echo '<input type="text" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="' . esc_attr( $field['placeholder'] ) . '">';
        }
        echo '</td></tr>';
    }
    echo '</table>';
}

function recruit_premium_save_job_meta( $post_id ) {
    if ( ! isset( $_POST['recruit_premium_job_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['recruit_premium_job_nonce'], 'recruit_premium_job_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = [ 'job_salary', 'job_location', 'job_hours', 'job_holiday', 'job_benefits', 'job_deadline' ];
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post', 'recruit_premium_save_job_meta' );

/* =============================================================================
   Excerpt
   ============================================================================= */
function recruit_premium_excerpt_length( $length ) {
    return 60;
}
add_filter( 'excerpt_length', 'recruit_premium_excerpt_length' );

function recruit_premium_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'recruit_premium_excerpt_more' );

/* =============================================================================
   Helper Functions
   ============================================================================= */
function recruit_premium_get_jobs( $args = [] ) {
    $defaults = [
        'post_type'      => 'job',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
    ];
    return get_posts( wp_parse_args( $args, $defaults ) );
}

function recruit_premium_get_voices( $args = [] ) {
    $defaults = [
        'post_type'      => 'voice',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
    ];
    return get_posts( wp_parse_args( $args, $defaults ) );
}
