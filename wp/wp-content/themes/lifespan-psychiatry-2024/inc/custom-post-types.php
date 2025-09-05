<?php
/**
 * Custom Post Types for Lifespan Psychiatry
 *
 * @package LifespanPsychiatry
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Type: Service
 */
function register_service_post_type() {
    $labels = array(
        'name'               => __('Services', 'lifespan-psychiatry'),
        'singular_name'      => __('Service', 'lifespan-psychiatry'),
        'menu_name'          => __('Services', 'lifespan-psychiatry'),
        'add_new'            => __('Add New', 'lifespan-psychiatry'),
        'add_new_item'       => __('Add New Service', 'lifespan-psychiatry'),
        'edit_item'          => __('Edit Service', 'lifespan-psychiatry'),
        'new_item'           => __('New Service', 'lifespan-psychiatry'),
        'view_item'          => __('View Service', 'lifespan-psychiatry'),
        'search_items'       => __('Search Services', 'lifespan-psychiatry'),
        'not_found'          => __('No services found', 'lifespan-psychiatry'),
        'not_found_in_trash' => __('No services found in trash', 'lifespan-psychiatry'),
        'parent_item_colon'  => __('Parent Service:', 'lifespan-psychiatry'),
        'all_items'          => __('All Services', 'lifespan-psychiatry'),
    );

    $args = array(
        'labels'              => $labels,
        'description'         => __('Mental health services offered by Lifespan Psychiatry', 'lifespan-psychiatry'),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'service'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'           => 'dashicons-heart',
        'show_in_rest'        => true,
    );

    register_post_type('service', $args);
}
add_action('init', 'register_service_post_type');

/**
 * Register Custom Post Type: Condition
 */
function register_condition_post_type() {
    $labels = array(
        'name'               => __('Conditions', 'lifespan-psychiatry'),
        'singular_name'      => __('Condition', 'lifespan-psychiatry'),
        'menu_name'          => __('Conditions', 'lifespan-psychiatry'),
        'add_new'            => __('Add New', 'lifespan-psychiatry'),
        'add_new_item'       => __('Add New Condition', 'lifespan-psychiatry'),
        'edit_item'          => __('Edit Condition', 'lifespan-psychiatry'),
        'new_item'           => __('New Condition', 'lifespan-psychiatry'),
        'view_item'          => __('View Condition', 'lifespan-psychiatry'),
        'search_items'       => __('Search Conditions', 'lifespan-psychiatry'),
        'not_found'          => __('No conditions found', 'lifespan-psychiatry'),
        'not_found_in_trash' => __('No conditions found in trash', 'lifespan-psychiatry'),
        'parent_item_colon'  => __('Parent Condition:', 'lifespan-psychiatry'),
        'all_items'          => __('All Conditions', 'lifespan-psychiatry'),
    );

    $args = array(
        'labels'              => $labels,
        'description'         => __('Mental health conditions treated by Lifespan Psychiatry', 'lifespan-psychiatry'),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'condition'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 6,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'           => 'dashicons-clipboard',
        'show_in_rest'        => true,
    );

    register_post_type('condition', $args);
}
add_action('init', 'register_condition_post_type');

/**
 * Register Custom Post Type: Provider
 */
function register_provider_post_type() {
    $labels = array(
        'name'               => __('Providers', 'lifespan-psychiatry'),
        'singular_name'      => __('Provider', 'lifespan-psychiatry'),
        'menu_name'          => __('Providers', 'lifespan-psychiatry'),
        'add_new'            => __('Add New', 'lifespan-psychiatry'),
        'add_new_item'       => __('Add New Provider', 'lifespan-psychiatry'),
        'edit_item'          => __('Edit Provider', 'lifespan-psychiatry'),
        'new_item'           => __('New Provider', 'lifespan-psychiatry'),
        'view_item'          => __('View Provider', 'lifespan-psychiatry'),
        'search_items'       => __('Search Providers', 'lifespan-psychiatry'),
        'not_found'          => __('No providers found', 'lifespan-psychiatry'),
        'not_found_in_trash' => __('No providers found in trash', 'lifespan-psychiatry'),
        'parent_item_colon'  => __('Parent Provider:', 'lifespan-psychiatry'),
        'all_items'          => __('All Providers', 'lifespan-psychiatry'),
    );

    $args = array(
        'labels'              => $labels,
        'description'         => __('Healthcare providers at Lifespan Psychiatry', 'lifespan-psychiatry'),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'provider'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 7,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'           => 'dashicons-businessperson',
        'show_in_rest'        => true,
    );

    register_post_type('provider', $args);
}
add_action('init', 'register_provider_post_type');

/**
 * Register Custom Post Type: Testimonial
 */
function register_testimonial_post_type() {
    $labels = array(
        'name'               => __('Testimonials', 'lifespan-psychiatry'),
        'singular_name'      => __('Testimonial', 'lifespan-psychiatry'),
        'menu_name'          => __('Testimonials', 'lifespan-psychiatry'),
        'add_new'            => __('Add New', 'lifespan-psychiatry'),
        'add_new_item'       => __('Add New Testimonial', 'lifespan-psychiatry'),
        'edit_item'          => __('Edit Testimonial', 'lifespan-psychiatry'),
        'new_item'           => __('New Testimonial', 'lifespan-psychiatry'),
        'view_item'          => __('View Testimonial', 'lifespan-psychiatry'),
        'search_items'       => __('Search Testimonials', 'lifespan-psychiatry'),
        'not_found'          => __('No testimonials found', 'lifespan-psychiatry'),
        'not_found_in_trash' => __('No testimonials found in trash', 'lifespan-psychiatry'),
        'parent_item_colon'  => __('Parent Testimonial:', 'lifespan-psychiatry'),
        'all_items'          => __('All Testimonials', 'lifespan-psychiatry'),
    );

    $args = array(
        'labels'              => $labels,
        'description'         => __('Client testimonials for Lifespan Psychiatry', 'lifespan-psychiatry'),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'testimonial'),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => 8,
        'supports'            => array('title', 'editor', 'custom-fields'),
        'menu_icon'           => 'dashicons-format-quote',
        'show_in_rest'        => true,
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'register_testimonial_post_type');

/**
 * Register Custom Post Type: Insurance
 */
function register_insurance_post_type() {
    $labels = array(
        'name'               => __('Insurance', 'lifespan-psychiatry'),
        'singular_name'      => __('Insurance', 'lifespan-psychiatry'),
        'menu_name'          => __('Insurance', 'lifespan-psychiatry'),
        'add_new'            => __('Add New', 'lifespan-psychiatry'),
        'add_new_item'       => __('Add New Insurance', 'lifespan-psychiatry'),
        'edit_item'          => __('Edit Insurance', 'lifespan-psychiatry'),
        'new_item'           => __('New Insurance', 'lifespan-psychiatry'),
        'view_item'          => __('View Insurance', 'lifespan-psychiatry'),
        'search_items'       => __('Search Insurance', 'lifespan-psychiatry'),
        'not_found'          => __('No insurance found', 'lifespan-psychiatry'),
        'not_found_in_trash' => __('No insurance found in trash', 'lifespan-psychiatry'),
        'parent_item_colon'  => __('Parent Insurance:', 'lifespan-psychiatry'),
        'all_items'          => __('All Insurance', 'lifespan-psychiatry'),
    );

    $args = array(
        'labels'              => $labels,
        'description'         => __('Insurance plans accepted by Lifespan Psychiatry', 'lifespan-psychiatry'),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'insurance'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 9,
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon'           => 'dashicons-money-alt',
        'show_in_rest'        => true,
    );

    register_post_type('insurance', $args);
}
add_action('init', 'register_insurance_post_type');