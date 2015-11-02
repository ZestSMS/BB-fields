<?php


function zestsms_wp_dropdown($name, $value, $field) {
	$defaults = array(
		'name'							=> $name
		,'post_type' 				=> 'page'
		,'selected'					=> $value
	);

	$args = wp_parse_args( $field, $defaults );

	wp_dropdown_pages( $args );
}
add_action('fl_builder_control_zestsms-wp-dropdown', 'zestsms_wp_dropdown', 1, 3);
