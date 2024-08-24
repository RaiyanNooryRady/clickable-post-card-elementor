<?php
/*
Plugin Name: Elementor Post Card Clickable
Description: Makes the entire post card clickable in Elementor's Posts widget using the classic layout.
Version: 1.0
Author: Your Name
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Hook to enqueue the script
add_action('wp_enqueue_scripts', 'epcc_enqueue_script');

function epcc_enqueue_script() {
    // Check if Elementor is active
    if ( did_action('elementor/loaded') ) {
        wp_add_inline_script('jquery-core', "
            jQuery(document).ready(function($) {
                $('.elementor-widget-posts .elementor-post').each(function() {
                    var postLink = $(this).find('.elementor-post__title a').attr('href');
                    if (postLink) {
                        $(this).css('cursor', 'pointer');
                        $(this).on('click', function() {
                            window.location.href = postLink;
                        });
                    }
                });
            });
        ");
    }
}
