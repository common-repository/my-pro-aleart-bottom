<?php
/*
Plugin Name: Pro Aleart Bottom
Plugin URI: http://prowpexpert.com/
Description: This is Pro Aleart Bottom plugin really looking Awesome Aleart Bottom. Everyone can use the Pro Aleart Bottom plugin easily like other wordpress plugin. 
Author: Md sohel
Version: 1.0
Author URI: http://prowpexpert.com/
*/
function pro_aleart_wp_latest_jquery_d() {
	wp_enqueue_script('jquery');
}
add_action('init', 'pro_aleart_wp_latest_jquery_d');

/*Some Set-up*/
define('PRO_ALEART_WP', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

function pro_plugin_function_aleart() {
	wp_enqueue_script('bootstrap-main-js', PRO_ALEART_WP.'js/bootstrap.min.js', array('jquery'), 1.0, true);
	wp_enqueue_style('bootstrap-main-css', PRO_ALEART_WP.'css/bootstrap.css');
	wp_enqueue_style('style-main-css', PRO_ALEART_WP.'css/style.css');
	wp_enqueue_style('fonts-main-css', PRO_ALEART_WP.'css/fonts.css');
}

add_action('init','pro_plugin_function_aleart');




// Alerts
function pro_alert_bootstrap_alerts( $atts, $content = null ) {
     extract( shortcode_atts( array(
     'type' => 'info', /* alert-info, alert-success, alert-error */
     'close' => 'false', /* display close link */
     'text' => '',
     ), $atts ) );
 
     $out = '<div id="alert">';
      $out .= '
					
					<div class="alert '.$type.' bottom-20">
                            <div class="alert-icon">
                                <i class="fa fa-'.$type.'"></i>
                            </div>
                            <div class="alert-content">
                                <p>'.$text.'</p>
                            </div>
                            <span aria-hidden="true" data-dismiss="alert" class="close"><i class="fa fa-times-circle"></i></span>
                        </div>
		 ';
     $out .= do_shortcode($content);
     $out .= '</div>';
 
     return $out;
 }
 
 add_shortcode('alearts', 'pro_alert_bootstrap_alerts');





add_filter('widget_text', 'do_shortcode');



?>