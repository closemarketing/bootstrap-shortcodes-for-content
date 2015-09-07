# Plugin Wordpress Bootstrap Shortcodes for Content

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

[imagepostslider] - Image Slider from Images attached in a post

[carouselcpt] - Multiple elements Carousel 

- post_type -> slug of Post type that you want to show.
- tax -> Show Taxonomy that the post in.
- title -> Title that goes before
- type -> post or tax
- col -> Elements visibles
- titlep -> true or false. Show Title's post in carousel

[links] - List of all links added in Links admin menu.

[gallery] - Replaces the actual gallery from Wordpress

[gridtaxbox] - Allows you to show a grid with taxonomy related.

Tabs - Allows you to show a tab panel.
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