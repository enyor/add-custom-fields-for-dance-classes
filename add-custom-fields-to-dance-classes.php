<?php
/*
Plugin Name: Stock Reset Weekly for WooCommerce
Plugin URI: https://www.linkedin.com/in/enyor/
Description: Agrega campos personalizados a productos de woocommerce en la sección general
Version: 1.0
Author: Enyor Pina
License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
// Agrega los campos personalizados a los productos de WooCommerce
add_action( 'woocommerce_product_options_general_product_data', 'add_custom_fields_to_dance_classes' );
function add_custom_fields_to_dance_classes() {
    global $woocommerce, $post;
    echo '<div class="options_group">';
    
    // Day field
    woocommerce_wp_select(
        array(
            'id' => '_day',
            'label' => __( 'Day', 'woocommerce' ),
            'desc_tip' => 'true',
            'description' => __( 'Select the day of the class.', 'woocommerce' ),
            'options' => array(
                '' => __( 'Select a day', 'woocommerce' ),
                'Monday' => __( 'Monday', 'woocommerce' ),
                'Tuesday' => __( 'Tuesday', 'woocommerce' ),
                'Wednesday' => __( 'Wednesday', 'woocommerce' ),
                'Thursday' => __( 'Thursday', 'woocommerce' ),
                'Friday' => __( 'Friday', 'woocommerce' ),
                'Saturday' => __( 'Saturday', 'woocommerce' ),
                'Sunday' => __( 'Sunday', 'woocommerce' ),
            ),
        )
    );
    
    // Time field
    woocommerce_wp_text_input(
        array(
            'id' => '_time',
            'label' => __( 'Time', 'woocommerce' ),
            'placeholder' => '',
            'desc_tip' => 'true',
            'description' => __( 'Enter the time of the class.', 'woocommerce' )
        )
    );
    
    // Instructor field
    woocommerce_wp_text_input(
        array(
            'id' => '_instructor',
            'label' => __( 'Instructor', 'woocommerce' ),
            'placeholder' => '',
            'desc_tip' => 'true',
            'description' => __( 'Enter the name of the instructor.', 'woocommerce' )
        )
    );
    
    // Room field
    woocommerce_wp_text_input(
        array(
            'id' => '_room',
            'label' => __( 'Room', 'woocommerce' ),
            'placeholder' => '',
            'desc_tip' => 'true',
            'description' => __( 'Enter the room for the class.', 'woocommerce' )
        )
    );

    // Type field
    woocommerce_wp_select(
        array(
            'id' => '_typeclass',
            'label' => __( 'Typeclass', 'woocommerce' ),
            'desc_tip' => 'true',
            'description' => __( 'Select the type class.', 'woocommerce' ),
            'options' => array(
                'Beginners' => __( 'Kids', 'woocommerce' ),
                'Adults' => __( 'Teens', 'woocommerce' ),
                'Teens' => __( 'Adults', 'woocommerce' ),
            ),
        )
    );
    
    // Difficulty field
    woocommerce_wp_select(
        array(
            'id' => '_difficulty',
            'label' => __( 'Difficulty', 'woocommerce' ),
            'desc_tip' => 'true',
            'description' => __( 'Select the difficulty level of the class.', 'woocommerce' ),
            'options' => array(
                'Beginners' => __( 'Beginners', 'woocommerce' ),
                'Adults' => __( 'Intermediate', 'woocommerce' ),
                'Teens' => __( 'Advanced', 'woocommerce' ),
            ),
        )
    );
    
    echo '</div>';
}

// Guarda los valores de los campos personalizados
add_action( 'woocommerce_process_product_meta', 'save_custom_fields_to_dance_classes' );
function save_custom_fields_to_dance_classes( $post_id ) {
    // Guarda Day field
    $day = isset( $_POST['_day'] ) ? $_POST['_day'] : '';
    update_post_meta( $post_id, '_day', sanitize_text_field( $day ) );
    
    // Guarda Time field
    $time = isset( $_POST['_time'] ) ? $_POST['_time'] : '';
    update_post_meta( $post_id, '_time', sanitize_text_field( $time ) );

    // Instructor field
    $instructor = isset( $_POST['_instructor'] ) ? $_POST['_instructor'] : '';
    update_post_meta( $post_id, '_instructor', sanitize_text_field( $instructor ) );

    // Room field
    $room = isset( $_POST['_room'] ) ? $_POST['_room'] : '';
    update_post_meta( $post_id, '_room', sanitize_text_field( $room ) );

    // Type field
    $typeclass = isset( $_POST['_typeclass'] ) ? $_POST['_typeclass'] : '';
    update_post_meta( $post_id, '_typeclass', sanitize_text_field( $typeclass ) );

    // Difficulty field
    $difficulty = isset( $_POST['_difficulty'] ) ? $_POST['_difficulty'] : '';
    update_post_meta( $post_id, '_difficulty', sanitize_text_field( $difficulty ) );
}

