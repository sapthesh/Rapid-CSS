=== Rapid Custom CSS ===
Contributors: sapthesh
Tags: css, custom css, styles, design, code editor
Requires at least: 5.0
Tested up to: 6.9
Stable tag: 1.0.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://buymeacoffee.com/sapthesh

A lightweight plugin to add custom CSS to your site with a syntax-highlighting editor.

== Description ==

This plugin allows you to add custom CSS to your WordPress site without modifying your theme files. It features a live syntax-highlighting editor (using WordPress's native CodeMirror) to make writing CSS easier.

Key Features:
* Syntax highlighting (colors)
* Line numbers
* Secure code sanitization
* Lightweight (only loads on the settings page)

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/rapid-custom-css` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the Settings->Rapid CSS screen to configure the plugin.

== Frequently Asked Questions ==

= Will I lose my CSS if I change themes? =
No. Your CSS is saved in the database, independent of your theme. You can switch themes freely, and your custom styles will remain.

= Where is the CSS loaded? =
The CSS is loaded in the `<head>` of your website, with a very high priority to ensure it overrides theme styles.

= Does this support SCSS or LESS? =
No, this plugin is designed to be lightweight and only supports standard CSS.

== Screenshots ==

1. The CSS Editor interface with syntax highlighting.

== Changelog ==

= 1.0.0 =
* Initial release.
* Added syntax highlighting using CodeMirror.
* Added security sanitization.

== Upgrade Notice ==

= 1.0.0 =
This is the first version of the plugin.