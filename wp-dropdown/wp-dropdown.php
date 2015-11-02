<?php


function zestsms_wp_dropdown($name, $value, $field) {
	$defaults = array(
		'name'							=> $name
		,'post_type' 				=> 'page'
		,'selected'					=> $value
		,'taxonomy'					=> ''
	);
	
	$args = wp_parse_args( $field, $defaults );

	if(!empty($args['taxonomy'])) {
		wp_dropdown_categories( $args );
	} else {
		wp_dropdown_pages( $args );
	}
}
add_action('fl_builder_control_wp-dropdown', 'zestsms_wp_dropdown', 1, 3);