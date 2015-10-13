<?php
/*
 * Tabs Bootstrap
 * @since v1.0
 *
 */
if (!function_exists('tabgroup_shortcode')) {
	function tabgroup_shortcode( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'location' => '',
			), $atts));

		$output = '
		<div class="tabgroup ' .$location. '">
		'.do_shortcode($content).'
		</div>';

		return $output;
	}
	add_shortcode('tabgroup', 'tabgroup_shortcode');
}

//Tab Title Section
if (!function_exists('tab_titlesection_shortcode')) {
	function tab_titlesection_shortcode( $atts, $content = null ) {

		$output = '<ul class="nav nav-tabs" role="tablist">'.do_shortcode($content).'
		</ul>';

		return $output;
	}
	add_shortcode('tab_titlesection', 'tab_titlesection_shortcode');
}

//Tab Titles
if (!function_exists('tab_tabtitle_shortcode')) {
	function tab_tabtitle_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'active' => '',
			'name' => '',
			), $atts));

		$active = ($active == 'yes') ? "class='active'" : '';

        $output = '
        <li role="'.$name.'" '.$active.'><a href="#'.$name.'" aria-controls="'.$name.'" role="tab" data-toggle="tab">'.do_shortcode($content).'</a></li>';

		return $output;
	}
	add_shortcode('tab_tabtitle', 'tab_tabtitle_shortcode');
}

//Tab Content Section
if (!function_exists('tab_contentsection_shortcode')) {
	function tab_contentsection_shortcode( $atts, $content = null ) {

		$output = '
		<div class="tab-content">
		'.do_shortcode($content).'
		</div>';

		return $output;
	}
	add_shortcode('tab_contentsection', 'tab_contentsection_shortcode');
}

//Tab Content
if (!function_exists('tab_tabcontent_shortcode')) {
	function tab_tabcontent_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'active' => '',
			'name' => '',
			), $atts));

		$active = ($active == 'yes') ? "active" : '';

		$output = '

		<div role="tabpanel" class="tab-pane ' .$active. '" id="' .$name. '">
		<p>'.do_shortcode($content).'</p>
		</div>';

		return $output;
	}
	add_shortcode('tab_tabcontent', 'tab_tabcontent_shortcode');
}