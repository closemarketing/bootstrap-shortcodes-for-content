<?php
$strings =
'tinyMCE.addI18n(
    "' . $mce_locale .'.bctt",
    {
    toolTip : "' . esc_js( __( 'Image Post Slider', 'bsc' ) ) . '",
    windowTitle : "' . esc_js( _x( 'Better Click To Tweet Shortcode Generator', 'Text for title of the popup box when creating tweetable quote in the visual editor', 'better-click-to-tweet' ) ) . '",
    tweetableQuote : "' . esc_js( _x( 'Tweetable Quote', 'Text for label on input box on popup box in visual editor', 'better-click-to-tweet' ) ) . '",
    viaExplainer : "' . esc_js( _x( 'Add \"via @YourTwitterName\" to this tweet', 'Text explaining the checkbox on the visual editor', 'better-click-to-tweet' ) ) . '",
    viaPrompt : "' . esc_js( _x( 'Include "via"?', 'Checkbox label in visual editor', 'better-click-to-tweet' ) ) . '",
    }
    );
  	';