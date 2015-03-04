=== Move Posts from Uncategorized ===
Contributors: christopherross,thisismyurl
Plugin URI: http://thisismyurl.com/downloads/move-posts-from-uncategorized/
Tags: category, wp-admin, uncategorized, category management
Donate link: http://thisismyurl.com/downloads/
Requires at least: 3.2.0
Tested up to: 4.1.0
Stable tag: 15.01

This plugin automatically scans for posts in the Uncategorized category of your WordPress blog, and removes them from the category.

== Description ==

This plugin automatically scans for posts in the Uncategorized category of your WordPress blog, and removes them from the category if the posts match certain criteria.

* There must be a category with the slug 'uncategorized' on your blog;
* There must be posts in that category;
* The posts in that category must also belong to another category;

If all those criteria are met, the plugin with automatically remove the post from the Uncategorized category of your WordPress blog.

The plugin runs automatically on page loads, depending on the number of posts it finds the first time it loads may take significant resources. As it loads each time, it will require less and less resources until there are no Posts left in the uncategorized category. Disable the plugin at any time to stop it loading.

This plugin is maintained by Christopher Ross, http://thisismyurl.com/ or you can find him on Twitter at http://twitter.com/thisismyurl/

** Before installing this plugin do a backup of your current WordPress website, as there is no undo function for this plugin.**

== Installation ==

To install the plugin, please upload the folder to your plugins folder and active the plugin. There are no settings.

== Screenshots ==

blank

== Updates ==
Updates to the plugin will be posted here, to http://thisismyurl.com

== Frequently Asked Questions ==

blank

== Donations ==

If you would like to donate to help support future development of this tool, please visit
Christopher Ross at http://thisismyurl.com/


== Change Log ==


= 15.01 =

* moved CSS to child directories
* added information page for plugin
* tested for WordPress 4.1
* removed icon file
* Added OOP Class structure
* Migrated common structure for plugins

= 1.0.0 =

* Initial release
