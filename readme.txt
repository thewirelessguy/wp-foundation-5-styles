=== WP Foundation 5 Styles ===
Contributors: thewirelessguy
Donate link: http://www.thewirelessguy.co.uk
Tags: zurb, foundation, foundation 5, tinymce, styles, editor, wysiwyg
Requires at least: 3.9
Tested up to: 3.9
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add Foundation 5 styles into TinyMCE, the WordPress WYSIWYG editor.

== Description ==

Add Foundation 5 styles into TinyMCE, the WordPress WYSIWYG editor.

Shortcodes are often hard for regular users as well advanced users to remember, especially if they haven’t used them in a while.

If a plugin is deactivated that makes use of a shortcode or a new theme is activated that doesn’t contain a shortcode then you will end up with shortcodes being output on the frontend of the website, e.g. [columns]. Instead with this plugin you'll just have a html element with a class that doesn’t have any styles so the browser will render it normally.

This plugin doesn't load the Zurb Foundation CSS/JavaScript files on the frontend of the website. It only loads the Foundation CSS in TinyMCE, the WordPress WYSIWYG editor. This plugin is meant to be used with a theme built with Zurb Foundation 5.

Requires WordPress 3.9 or above and a theme based on Zurb Foundation 5.

All official development on this plugin is on GitHub. Version updates are then published here on WordPress.org. You can find the GitHub repository at https://github.com/thewirelessguy/wp-foundation-5-styles. Please file issues, bugs and enhancement ideas there, when possible.


== Installation ==

Download a zip of the repository and put in a *wp-foundation-5-styles* directory inside *wp-content/plugins*.

Activate the plugin through the *Plugins* menu in the WordPress admin.



== Changelog ==

= 1.0.1 =
* Update to Foundation 5.4. Change Two Column style from 'small-6' to 'small-12 medium-6'.

= 1.0 =
* First version