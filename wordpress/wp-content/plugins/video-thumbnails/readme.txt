=== Video Thumbnails ===
Contributors: sutherlandboswell
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=sutherland%2eboswell%40gmail%2ecom&lc=US&item_name=Sutherland%20Boswell&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_LG%2egif%3aNonHosted
Tags: Video, Thumbnails, YouTube, Vimeo, Blip.tv, Justin.tv, Dailymotion, Metacafe, Image, Featured Image, Post Thumbnail
Requires at least: 3.0
Tested up to: 3.1.2
Stable tag: 1.7.6

Video Thumbnails simplifies the process of automatically displaying video thumbnails in your WordPress template.

== Description ==

Video Thumbnails makes it easy to automatically display video thumbnails in your template. When you publish a post, this plugin will find the first video embedded and locate the thumbnail for you. Thumbnails can be saved to your media library and set as a featured image automatically. There's even support for custom post types!

Video Thumbnails currently supports these video services:

* YouTube
* Vimeo
* Justin.tv
* Blip.tv
* Dailymotion
* Metacafe

Video Thumbnails even works with most video embedding plugins, including:

* [Viper's Video Quicktags](http://wordpress.org/extend/plugins/vipers-video-quicktags/)
* [Simple Video Embedder](http://wordpress.org/extend/plugins/simple-video-embedder/)
* [Vimeo Shortcode](http://blog.esimplestudios.com/2010/08/embedding-vimeo-videos-in-wordpress/)
* [WP YouTube Lyte](http://wordpress.org/extend/plugins/wp-youtube-lyte/)

Some functions are available to advanced users who want to customize their theme:

* `<?php video_thumbnail(); ?>` will echo a thumbnail URL or the default image located at `wp-content/plugins/video-thumbnails/default.jpg` if a thumbnail cannot be found. Here is an example: `<img src="<?php video_thumbnail(); ?>" width="300" />`
* `<?php $video_thumbnail = get_video_thumbnail(); ?>` will return the thumbnail URL or return NULL if none is found. In this example, a thumbnail is only shown if one is found: `<?php if( ( $video_thumbnail = get_video_thumbnail() ) != null ) { echo "<img src='" . $video_thumbnail . "' />"; } ?>`

== Installation ==

1. Upload the `/video-thumbnails/` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= My theme isn't showing thumbnails, what's wrong? =

The most likely problem is that your theme doesn't support post thumbnails. If thumbnails are supported, you should see a box titled "Featured Image" on the edit post page. If thumbnails aren't supported, your theme will have to be modified to support Featured Images or to support one of our custom functions.

= I'm using a custom field to store the video and it isn't working, is there a solution? =

Yes, [this thread](http://wordpress.org/support/topic/plugin-video-thumbnails-cant-find-youtube-thumbnails) has a solution for searching a custom field instead of the post's main content.

= Can I use the functions outside of a loop? =

Yes, but be sure to include the post ID as a parameter. For example: `<?php $thumbnail = get_video_thumbnail(25); ?>`

= My video service/embedding plugin isn't included, can you add it? =

If the service allows a way to retrieve thumbnails, I'll do my best to add it.

= How do I use this plugin with custom post types? =

The settings page includes a checklist of all your post types so you can pick and choose.

= I am editing my theme and only want to display a thumbnail if one is found. How do I do this? =

`<?php if( ( $video_thumbnail = get_video_thumbnail() ) != null ) { echo "<img src='" . $video_thumbnail . "' />"; } ?>` will only display a thumbnail when one exists.

= I edited my theme and now I'm getting huge thumbnails, how can I resize them? =

Adding a width attribute to the image element should scale the image in most modern browsers. Ex: `<?php if( ( $video_thumbnail = get_video_thumbnail() ) != null ) { echo "<img src='" . $video_thumbnail . "' width='300' />"; } ?>`

You can also assign a class to the element and style it with CSS, or even use a library like [TimThumb](http://code.google.com/p/timthumb/) to resize your images.

= I edited my theme and now I'm seeing the thumbnail and the video, how do I only display the thumbnail? =

Every theme is different, so this can be tricky if you aren't familiar with WordPress theme development. You need to edit your template in the appropriate place, replacing `<?php the_content(); >` with `<?php the_excerpt(); >` so that only an excerpt of the post is shown on the home page or wherever you would like to display the video thumbnail.

= Why are there black bars on some YouTube thumbnails? =

This is an unfortunate side effect of widescreen videos on YouTube. The thumbnail YouTube provides is always the same ratio, which creates black bars when a video is widescreen. Some themes will crop featured images and it may not be visible, but if you are comfortable editing your theme, I recommend using [TimThumb](http://code.google.com/p/timthumb/) to resize and crop your images.

= Why did it stop finding thumbnails for Vimeo? =

The Vimeo API has a rate limit, so in rare cases you may exceed this limit. Try again after a few hours.

== Screenshots ==

1. The Video Thumbnail meta box on the Edit Post page

== Changelog ==

= 1.7.6 =
* Fixed plugin link
* Added donate button

= 1.7.5 =
* Bugfix for array error on line 408

= 1.7.4 =
* Fixed Dailymotion bug (thanks [Gee](http://wordpress.org/support/profile/geekxx))
* Added detection for Dailymotion URLs (thanks [Gee](http://wordpress.org/support/profile/geekxx))
* Added support for [WP YouTube Lyte](http://wordpress.org/extend/plugins/wp-youtube-lyte/)

= 1.7.3 =
* More comprehensive search for embedded YouTube videos

= 1.7.2 =
* Added support for Dailymotion and Metacafe

= 1.7 =
* Added new option to scan past posts for video thumbnails

= 1.6 =
* Added support for custom post types

= 1.5 =
* Video thumbnails are now only saved when a post's status changes to published.
* Removed URL field from the Video Thumbnail meta box on the Edit Post Page
* Added a "Reset Video Thumbnail" button to the meta box
* Accidental duplicate images should no longer be problem

= 1.1.1 =
* Fixed a bug related to scheduled posts sometimes not saving thumbnail URL to the meta field

= 1.1 =
* Fixed bug created by a change in YouTube's embed codes

= 1.0.9 =
* More work on fixing the duplicate image bug

= 1.0.8 =
* (Attempted to) fix another bug that could create duplicate images when updating a post

= 1.0.7 =
* Fixed a bug that could create duplicate images on auto-save

= 1.0.6 =
* Improved Blip.tv support

= 1.0.5 =
* Now using cURL to help save thumbnails locally instead of file_get_contents()

= 1.0.4 =
* Added compatibility with YouTube's new iframe embedding
* Now supports most embedding plugins

= 1.0.3 =
* Fixed an issue where existing thumbnails (such as ones manually set by the user) would be replaced by Video Thumbnails
* Added a checks to see if cURL is running

= 1.0.1 =
* Removed "Scan for Video Thumbnails" button from settings page until improvements can be made

= 1.0 =
* Video Thumbnails can now be stored in the local WordPress media library
* Video Thumbnails stored locally can automatically be set as the featured image, making it support many themes automatically
* Added an options page to enable/disable local storage and enable/disable automatically setting that thumbnail as the featured image
* Settings page also includes a button to scan all posts for video thumbnails

= 0.6 =
* Added support for Justin.tv
* Fixed bug that could cause a conflict with other plugins

= 0.5.5 =
* Video thumbnails are now found at the time the post is saved

= 0.5.4 =
* Video thumbnails can be retrieved for a specific post ID by passing a parameter to the `video_thumbnail()` or `get_video_thumbnail()` function. For example: `<?php $id = 25; $thumbnail = get_video_thumbnail($id); if($thumbnail!=null) echo $thumbnail; ?>`

= 0.5.3 =
* Better support for Vimeo Shortcode (thanks to Darren for the tip)

= 0.5.2 =
* Added support for [Simple Video Embedder](http://wordpress.org/extend/plugins/simple-video-embedder/)

= 0.5.1 =
* Added a test to make sure the YouTube thumbnail actually exists. This prevents you from getting that ugly default thumbnail from YouTube.

= 0.5 =
* Thumbnail URLs are now stored in a custom field with each post, meaning the plugin only has to interact with outside APIs once per post.
* Added a "Video Thumbnail" meta box to the edit screen for each post, which can be manually set or will be set automatically once `video_thumbnail()` or `get_video_thumbnail()` is called in a loop for that post.

= 0.3 =
* Added basic support for Blip.tv auto embedded using URLs in this format: http://blip.tv/file/12345

= 0.2.3 =
* Added support for any Vimeo URL

= 0.2.2 =
* Added support for [Vimeo Shortcode](http://blog.esimplestudios.com/2010/08/embedding-vimeo-videos-in-wordpress/)

= 0.2.1 =
* Added support for Vimeo players embedded using an iframe

= 0.2 =
* Added `get_video_thumbnail()` to return the URL without echoing or return null if no thumbnail is found, making it possible to only display a thumbnail if one is found.

= 0.1.3 =
* Fixed an issue where no URL was returned when Vimeo's rate limit had been exceeded. The default image URL is now returned, but a future version of the plugin will store thumbnails locally for a better fix.

= 0.1.2 =
* Fixed a possible issue with how the default image URL is created

= 0.1.1 =
* Fixed an issue with the plugin directory's name that caused the default URL to be broken
* Added support for YouTube URLs

= 0.1 =
* Initial release

== Upgrade Notice ==

= 1.0 =
This is the single biggest update to Video Thumbnails so far, so be sure to check out the new settings page and documentation.

= 0.5 =
This version adds the thumbnail URL to the post's meta data, meaning any outside APIs only have to be queried once per post. Vimeo's rate limit was easily exceeded, so this should fix that problem.

== Known Issues ==

* Because the plugin politely removes its settings when being deactivated, settings may revert back to the defaults when upgrading the plugin automatically. I believe this is an issue that will be fixed in WordPress 3.1.

== Roadmap ==

This plugin is still very young, and has a future planned as the ultimate plugin for video thumbnails. Here's some of the planned additions:

* Better Blip.tv support
* More services
* Option to display video thumbnails on the admin post list page