=== Google Language Translator ===
Contributors: Rob Myrick
Donate link: http://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=47LFA33AC89S6
Plugin link: http://www.studio88design.com/plugins/google-language-translator
Tags: language translator, google translator, language translate, google, google language translator, translation, translate, multi language
Requires at least: 2.9
Tested up to: 3.8
stable tag: 3.0

Welcome to Google Language Translator! This plugin allows you to insert the Google Language Translator tool anywhere on your website using shortcode.

== Description ==

Settings include: inline or vertical layout, show/hide specific languages, hide/show Google toolbar, and hide/show Google branding. Add the shortcode to pages, posts, and widgets.

== Installation ==

1. Download the zip folder named google-language-translator.zip
2. Unzip the folder and put it in the plugins directory of your wordpress installation. (wp-content/plugins).
3. Activate the plugin through the plugin window in the admin panel.
4. Go to Settings > Google Language Translator, enable the plugin, and then choose your settings.
5. Copy the shortcode and paste it into a page, post or widget.
6. Do not use the shortcode twice on a single page - it will not work.

== Frequently Asked Questions ==

== Changelog ==

1.1 The shortcode supplied on the settings page was updated to display '[google-translator]'.

1.2 Shortcode support is now available for adding [google-translator] to text widgets.  I apologize for any inconvenience this may have caused.

1.3 HTML display problem in the sidebar area now fixed. Previously, inserting the [google-translator] plugin into a text widget caused it to display above the widget, instead of inside of it.

1.4 Corrected display problems associated with CSS styles not being placed correctly in wp_head.  

1.5 Added "Original Language" support to the plugin settings, which allows the user to choose the original language of their website, which ultimately removes the original language as a choice in the language drop-down presented to website visitors.

1.6 Added "Specific Language" support to the plugin settings, which allows the user to choose specific languages that are displayed to website visitors.

1.7 Modified google-language-translator.php so that jQuery and CSS styles were enqueued properly onto the settings page only. Previously, jQuery functionality and CSS styles were being added to all pages of the Wordpresss Dashboard, which was causing functionality and display issues for some users.

1.8 Modified google-language-translator.php to display the correct output to the browser when horizontal layout is selected.  Previously, it was not displaying at all.

1.9 

- Added 7 flag image choices that, when clicked by website visitors, will change the language displayed, both on the website, AND in the drop-down box (flag language choices are limited to those provided in this plugin). 

- Added 6 additional languages to the translator, as provided in Google's most recent updates ( new languages include Bosnian, Cebuano, Khmer, Marathi, Hmong, Javanese ).

- Corrected a minor technical issue where the Czech option (on the backend) was incorrectly displaying the Croatian language on the front end.

- Added jQuery functionality to the settings panel to improve the user experience.

- Added an option for users to display/hide the flag images.

- Added an option for users to display/hide the translate box when flags are displayed.

- Removed the settings.css file - I found a better way of displaying the options without CSS.

2.0 Corrected some immediate errors in the 1.9 update.

2.1 

- Added language "Dutch" to the Original Language drop-down option on the settings page.

- Added a new CSS class that more accurately hides the "Powered by" text when hiding Google's branding. In previous version, the "Powered by" text was actually disguised by setting it's color to "transparent", but now we have set it's font-size to 0px instead.

2.2

- Added language "Portuguese" and "German" to the Original Language drop-down option on the settings page.

- Changed flag image for the English language (changed United States flag to the United Kingdom flag).

- Added link in the settings panel that points to Google's Attribution Policy.

2.3

- Added a "Preview" area on the settings page that allows you to see your settings in action.

- Added custom flag support for all languages (custom flags available ONLY when selecting the "ALL Languages" setting.

- Added an option that allows left/right alignment of the translation tool.

- Added the "Google Language Translator" widget.

- Updated googlelanguagetranslator.php to properly register setting in the admin settings panel.

2.4

- Found a couple of small display errors in the settings page after uploading version 2.3. Sorry for any inconvenience!

2.5

- Eliminated an internal Wordpress error being generated from a coding mistake.

- Added a default option for the Translator alingment. Previously, this was causing the plugin to disapppear.

2.6

- Added defaults to all options to ensure there are no more issues with the translator displaying upon installation. Again, sorry for any inconvenience.

2.7

- Added Google Analytics tracking capability to the plugin.  

- Added a "CSS Styles" box in the settings panel.

- Changed the Catalonian flag to its correct flag image.

- Fixed coding issues that previously updated options incorrectly, which is why many users experienced display issues.  All options are now initialized upon plugin activation, which should fix this issue permanently.

- Fixed a glitch in our usage of the translate API.  Previously, when the user clicked the default language, it would toggle back and forth between the default language and "Afrikaans" language. Now, users will see the correct language displayed at all times, no matter how many times it is clicked.  


2.8

- Added an option to allow users to manage their own translations directly through their Google Translate account (free). When activated, users can hover over the text of their website, and edit the translations from the webpage directly.  Google will remember these translations, and then serve them to users once the edits are made. Users must install the Google Translate Customization meta tag provided through Google Translate here: translate.google.com/manager/website/settings. To obtain this meta tag, users need to configure the Google Translate tool directly from this website (although they will not use this because the plugin provides it), then the user can obtain the meta tag on the "Get Code" screen, which is displayed after configuring the Google Translate tool on this webpage. 
- Added an option to allow users to turn on/off Google's multilanguagePage option, that when activated, the original website content will be a forced translation, instead of original content (but only after a translation is made.)
- Added more flexible styles to the settings page, so that left and right panels display nicely to the user.

2.9

***IMPORTANT: Google's most recent server update is producing display issues for website translation tool. There are major display issues with the translation toolbar and also the translations editing interface. Version 2.9 temporarily hides the edit translation functionality until Google decides to fix this issue, although you can still edit translations directly through your Google account at translate.google.com. Please direct any support requests through Wordpress.org and we will be happy to assist you.

- Fixed Google Translation toolbar display issue
- Fixed the Edit Translation interface by hiding it temporarily until Google fixes this
- Removed some unneeded styles from the style sheet.
- Fixed some CSS issues for the Google Branding display, which was affected by Google's most recent update

3.0

- Correct a small CSS error that affected the showing/hiding of the Google toolbar. 

== Screenshots ==

1. Settings include: inline or vertical layout, hide/show Google toolbar, display specific languages, and show/hide Google branding. Add the shortcode to pages, posts, and widgets.
