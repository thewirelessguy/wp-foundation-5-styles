<?php
/**
 * Plugin Name: WP Foundation 5 Styles
 * Plugin URI: http://wordpress.org/plugins/wp-foundation-5-styles/
 * Description: Add Foundation 5 styles into TinyMCE, the WordPress WYSIWYG editor.
 * Version: 1.0
 * Author: Stephen Mullen
 * Author URI: http://www.thewirelessguy.co.uk
 * License: GPLv2 or later
 */

if ( ! class_exists('twg_foundation5_styles_tinymce') ) {

    class twg_foundation5_styles_tinymce {

        private static $ins = null;

        public static function init() {
            add_action('plugins_loaded', array(self::instance(), '_setup'));
        }

        public static function instance()
        {
            // create a new object if it doesn't exist.
            is_null(self::$ins) && self::$ins = new self;
            return self::$ins;
        }

        public static function _setup() {
            add_filter( 'mce_buttons_2', array( __CLASS__, 'tinymce_add_buttons' ) );
            add_filter( 'tiny_mce_before_init', array( __CLASS__, 'tinymce_mod' ) );
            add_filter( 'mce_css', array( __CLASS__, 'plugin_mce_foundation_css' ) );
        }

        function tinymce_add_buttons( $buttons ){
            array_splice( $buttons, 1, 0, 'styleselect' );
            return $buttons;
        }

        function plugin_mce_foundation_css( $mce_css ) {
            if ( !empty( $mce_css ) )
                $mce_css .= ',';
            $mce_css .= plugins_url( 'foundation.min.css', __FILE__ );
            return $mce_css;
        }
        

        function tinymce_mod( $init ) {

            $style_formats = array (
                array( 'title' => 'Columns', 'items' => array (
                    array( 'title' => 'Two Columns (small-6)', 'block' => 'div', 'classes' => 'small-6 columns' ),
                    array( 'title' => 'Three Columns (small-12 medium-4)', 'block' => 'div', 'classes' => 'small-12 medium-4 columns' ),
                    array( 'title' => 'Four Columns (small-6 medium-3)', 'block' => 'div', 'classes' => 'small-6 medium-3 columns' )
                    )
                ),
                array( 'title' => 'Buttons', 'items' => array (
                    array( 'title' => 'Buttons', 'selector' => 'a', 'classes' => 'button' ),
                    array( 'title' => 'Tiny (Button)', 'selector' => 'a.button', 'classes' => 'tiny' ),
                    array( 'title' => 'Small (Button)', 'selector' => 'a.button', 'classes' => 'small' ),
                    array( 'title' => 'Large (Button)', 'selector' => 'a.button', 'classes' => 'large' )
                    )
                ),
                array( 'title' => 'Panels', 'items' => array (
                    array( 'title' => 'Panel', 'block' => 'div', 'classes' => 'panel' ),
                    array( 'title' => 'Callout (Panel)', 'selector' => 'div.panel', 'classes' => 'callout' )
                    )
                ),
                array( 'title' => 'Inline List', 'selector' => 'ul', 'classes' => 'inline-list' ),
                array( 'title' => 'Labels', 'inline' => 'span', 'classes' => 'label' ),
                array( 'title' => 'Radius (Panel, Label, Button)', 'selector' => 'a.button, span.label, div.panel, div.panel.callout', 'classes' => 'radius' ),
                array( 'title' => 'Round (Label, Button)', 'selector' => 'a.button, span.label', 'classes' => 'round' ),
                array( 'title' => 'Alert (Label, Button)', 'selector' => 'a.button, span.label', 'classes' => 'secondary' ),
                array( 'title' => 'Secondary (Label, Button)', 'selector' => 'a.button, span.label', 'classes' => 'secondary' ),
                array( 'title' => 'Success (Label, Button, Alert box)', 'selector' => 'a.button, span.label, div.alert-box', 'classes' => 'success' ),
                array( 'title' => 'Disabled (Button)', 'selector' => 'a.button', 'classes' => 'disabled' ),
                array( 'title' => 'Expanded (Button)', 'selector' => 'a.button', 'classes' => 'expand' ),
                array( 'title' => 'Alert boxes', 'items' => array (
                    array( 'title' => 'Alert box', 'block' => 'div', 'classes' => 'alert-box' ),
                    array( 'title' => 'Success (Alert box)', 'selector' => 'div.alert-box', 'classes' => 'success' ),
                    array( 'title' => 'Warning (Alert box)', 'selector' => 'div.alert-box', 'classes' => 'warning' ),
                    array( 'title' => 'Info (Alert box)', 'selector' => 'div.alert-box', 'classes' => 'info' ),
                    array( 'title' => 'Close (Alert box)', 'selector' => 'a', 'classes' => 'close' )
                    )
                ),
                
            );

            $init['style_formats'] = json_encode( $style_formats );

            $init['style_formats_merge'] = true;
            return $init;
        }
        
    }
}

twg_foundation5_styles_tinymce::init();