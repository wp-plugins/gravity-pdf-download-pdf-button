=== Gravity PDF - Download PDF button ===
Contributors: ovann86
Donate link: http://www.itsupportguides.com/
Tags: gravity forms
Requires at least: 4.0
Tested up to: 4.1
Stable tag: 1.0.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Extends the Gravity PDF - allows users to download a PDF form at form confirmation

== Description ==

This plugin requires the [Gravity Forms](http://www.gravityforms.com/ "Gravity Forms website") and [Gravity PDF plugin](https://wordpress.org/plugins/gravity-forms-pdf-extended/ "Gravity PDF") plugins.

This plugin allows you to include a 'Download as PDF' button on the form confirmation page, allowing front end users to download a copy of their completed forms after the form has been submitted.

The button uses the same class as the submit and multi-page navigation buttons - allowing you to apply the same CSS styles to the 'Download as PDF' button.

To use the button simply include the [gfpdf_button] shortcode in the text confirmation for each form. The plugin will replace the shortcode with the button.

== Installation ==

1. This plugin requires the Gravity Forms and Gravity PDF plugins installed and activated
1. Install the plugin from WordPress administration or upload folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in the WordPress administration
1. Open the settings page for the form you want to add the 'Download as PDF' button to
1. Go to the 'Confirmations' page
1. Under 'Confirmation Type' select 'Text' (if not already selected)
1. In the message body, include the [gfpdf_button] shortcode
1. The button will now be displayed in the forms confirmation page, allowing the user to download a copy of their completed form after the form has been submitted

== Frequently Asked Questions ==

= How do I apply CSS styles to the button? =

By default, the button should take on the same CSS styles used by submit button as well as the multi-page navigation buttons (next and previous).

If you want to apply a different style you can use the .gpdf_button class to apply styles just to this button.

For example:

`.gpdf_button {
    background: none repeat scroll 0 0 #eee;
    border: 1px solid grey;
    border-radius: 5px;
    color: black;
    padding: 4px;
    text-align: center;
}`

== Screenshots ==

1. Shows the Gravity Forms confirmation settings page with the [gfpdf_button] shortcode included
2. Shows shows the 'Download PDF' button in the form confirmation screen.

== Changelog ==

= 1.0.1 =
* Fix: confirmation not working when button not used in confirmation message

= 1.0 =
* First public release.