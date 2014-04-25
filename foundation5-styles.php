<?php
/**
 * Plugin Name: Foundation 5 Styles plugin
 * Plugin URI: http://www.thewirelessguy.co.uk
 * Description: Add Foundation 5 styles into TinyMCE in WordPress.
 * Version: 1.0
 * Author: Stephen Mullen
 * Author URI: http://www.thewirelessguy.co.uk
 * License: GPL2
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
        }

        function tinymce_add_buttons( $buttons ){
            array_splice( $buttons, 1, 0, 'styleselect' );
            return $buttons;
        }

        function tinymce_mod( $init ) {

            $style_formats = array (
                array( 'title' => 'Columns', 'items' => array (
                    array( 'title' => 'Two Columns', 'block' => 'div', 'classes' => 'small-6 columns' ),
                    array( 'title' => 'Three Columns', 'block' => 'div', 'classes' => 'small-12 medium-4 columns' ),
                    array( 'title' => 'Four Columns', 'block' => 'div', 'classes' => 'small-6 medium-3 columns' )
                    )
                ),
                array( 'title' => 'Buttons', 'items' => array (
                    array( 'title' => 'Button', 'selector' => 'a', 'classes' => 'button' ),
                    array( 'title' => 'Button radius', 'selector' => 'a', 'classes' => 'button radius' ),
                    array( 'title' => 'Button round', 'selector' => 'a', 'classes' => 'button round' )
                    )
                )
            );

            $init['style_formats'] = json_encode( $style_formats );

            $init['style_formats_merge'] = true;
            return $init;
        }
        
    }
}

twg_foundation5_styles_tinymce::init();