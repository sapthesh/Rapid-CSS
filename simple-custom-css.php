<?php
/*
Plugin Name: Rapid Custom CSS
Description: A lightweight plugin to add custom CSS with syntax highlighting.
Version:     1.0.0
Author:      Sapthesh V
License:     GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// 1. SECURITY: Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 2. ADMIN MENU: Add the page under Appearance
function rcc_add_admin_menu() {
    add_theme_page(
        'Rapid Custom CSS',
        'Rapid CSS',
        'manage_options',
        'rapid-custom-css',
        'rcc_settings_page'
    );
}
add_action( 'admin_menu', 'rcc_add_admin_menu' );

// 3. SETTINGS: Register the database option
function rcc_register_settings() {
    register_setting( 'rcc_settings_group', 'rcc_custom_css', 'rcc_sanitize_css' );
}
add_action( 'admin_init', 'rcc_register_settings' );

// 4. SANITIZE: Clean the input
function rcc_sanitize_css( $input ) {
    return wp_strip_all_tags( $input );
}

// 5. ASSETS: Load CodeMirror (With Safety Check)
function rcc_enqueue_admin_scripts( $hook ) {
    if ( 'appearance_page_rapid-custom-css' !== $hook ) {
        return;
    }

    if ( function_exists( 'wp_enqueue_code_editor' ) ) {
        $settings = wp_enqueue_code_editor( array( 'type' => 'text/css' ) );

        if ( false === $settings ) {
            return;
        }

        wp_add_inline_script(
            'code-editor',
            sprintf(
                'jQuery( function( $ ) {
                    if ( wp && wp.codeEditor ) {
                        wp.codeEditor.initialize( "rcc_custom_css", %s );
                    }
                } );',
                wp_json_encode( $settings )
            )
        );
    }
}
add_action( 'admin_enqueue_scripts', 'rcc_enqueue_admin_scripts' );

// 6. RENDER: The Admin Page HTML
function rcc_settings_page() {
    ?>
    <div class="wrap">
        <h1>Rapid Custom CSS</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'rcc_settings_group' );
            do_settings_sections( 'rcc_settings_group' );
            $custom_css = get_option( 'rcc_custom_css' );
            ?>
            
            <style>
                .CodeMirror { height: 500px; border: 1px solid #ddd; }
                #rcc_custom_css { width: 100%; min-height: 500px; }
            </style>

            <textarea 
                name="rcc_custom_css" 
                id="rcc_custom_css" 
                class="widefat" 
                placeholder="/* Write your CSS here */"
            ><?php echo esc_textarea( $custom_css ); ?></textarea>
            
            <?php submit_button( 'Save CSS' ); ?>
        </form>
    </div>
    <?php
}

// 7. OUTPUT: Print CSS to Frontend
function rcc_output_css() {
    $css = get_option( 'rcc_custom_css' );
    if ( ! empty( $css ) ) {
        echo "\n\n";
        echo "<style type=\"text/css\" id=\"rapid-custom-css\">\n";
        // LATE ESCAPING: Ensures safety at the moment of output
        echo wp_strip_all_tags( $css );
        echo "\n</style>\n";
    }
}
add_action( 'wp_head', 'rcc_output_css', 99 );