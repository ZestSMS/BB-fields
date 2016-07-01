<?php

function zestsms_datepicker_field( $name, $value, $field ) {
	echo '<input type="text" class="' . $field[type] . '" name="' . $name . '" value="' . $value . '" />';
}
add_action( 'fl_builder_control_zestsms-datepicker', 'zestsms_datepicker_field', 1, 3 );

function zestsms_datepicker_field_assets() {
	global $wp_scripts;
  if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
  		wp_enqueue_script( 'jquery-ui-core' );
  		wp_enqueue_script( 'jquery-ui-datepicker' );
  		wp_enqueue_script( 'zestsms-datepicker', ZESTSMS_FIELDS_URL . 'zestsms-datepicker/js/zestsms-datepicker.js', array('jquery-ui-core'), '', true );

  		$ui = $wp_scripts->query('jquery-ui-core');
	    // tell WordPress to load the Smoothness theme from Google CDN
	    $protocol = is_ssl() ? 'https' : 'http';
	    $url = "$protocol://ajax.googleapis.com/ajax/libs/jqueryui/{$ui->ver}/themes/smoothness/jquery-ui.min.css";
	    wp_enqueue_style('jquery-ui-smoothness', $url, false, null);

	    wp_enqueue_style('zestsms-datepicker', ZESTSMS_FIELDS_URL . 'zestsms-datepicker/css/zestsms-datepicker.css', false, null);

  }
}
add_action( 'wp_enqueue_scripts', 'zestsms_datepicker_field_assets' );
