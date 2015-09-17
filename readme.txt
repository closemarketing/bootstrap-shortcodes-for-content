=== Bootstrap ShortCodes for Content ===
Contributors: closemarketing
Tags: bootstrap, shortcodes, content, ui, bootstrap helper
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZYGC6AT5JFQVE
Requires at least: 3.0
Tested up to: 4.3
Stable tag: 0.4
Version: 0.4
Stable tag: 0.5
Version: 0.5

This WordPress plugin extends shortcodes to use in Bootstrap themes.

== Description ==
This plugin give you a bunch of shortcodes that allows you to draw content using Bootstrap CSS and HTML. 

Shortcodes:
[gridbox] - Allows you to show a grid with post types related.

Parameters:
- post_type -> slug of Post type that you want to show.
- posts_per_page -> 
- col -> Columns that you want to show.
- date -> true or false. If you want to show in the grid.
- tax -> Show Taxonomy that the post in.
- size -> image size for post thumbnail

[gridtaxbox] - Allows you to show a grid with taxonomy related.

[imagepostslider] - Image Slider from Images attached in a post

[carouselcpt] - Multiple elements Carousel 

- post_type -> slug of Post type that you want to show.
- tax -> Show Taxonomy that the post in.
- title -> Title that goes before
- type -> post or tax
- col -> Elements visibles
- titlep -> true or false. Show Title's post in carousel

[gallery] - Replaces the actual gallery from Wordpress

[links] - List of Links in Wordpress

Tabs - Allows you to show a tab panel. Ex:
[tabgroup][tab_titlesection]
[tab_tabtitle active="yes" name="slug1"]Title 1[/tab_tabtitle]
[tab_tabtitle name="slug2"]Title 2[/tab_tabtitle]
[tab_tabtitle name="slug3"]Title 3[/tab_tabtitle]
[/tab_titlesection]
[tab_contentsection]
[tab_tabcontent active="yes" name="slug1"]
content3
[/tab_tabcontent]
[tab_tabcontent name="slug2"]
content2
[/tab_tabcontent]
[tab_tabcontent name="slug3"]
content3
[/tab_tabcontent]
[/tab_contentsection]
[/tabgroup]


[Official Repository Github](https://github.com/closemarketing/bootstrap-sc-content) . Fork and add make suggestions to the plugin! 

Others Plugins:
- [Gravity Forms CRM Addon](http://codecanyon.net/item/gravity-forms-crm-addon/10521695)
- [Gravity Forms in Spanish](https://wordpress.org/plugins/gravityforms-es/)
- [Clean HTML in Editor](https://wordpress.org/plugins/clean-html/) 
- [Send SMS to Wordpress Users via Arsys](https://wordpress.org/plugins/send-sms-arsys/) 

Made by [Closemarketing](https://www.closemarketing.es/) 
Shortcodes forked from [WP3 Shortcodes GitHub project](https://github.com/filipstefansson/bootstrap-3-shortcodes)

== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your
WordPress installation and then activate the Plugin from Plugins page.


== Developers ==
[Official Repository Github](https://github.com/closemarketing/bootstrap-sc-content)

== Changelog ==
= 0.9.0 =
*	Added Tinymce Button.

= 0.4.0 =
*	Added Gallery Shortcode.

= 0.1.0 =
*	First released, created one shortcode.

== Links ==

*	[Closemarketing](https://www.closemarketing.es/)
