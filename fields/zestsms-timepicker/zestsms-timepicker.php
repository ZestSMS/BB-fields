<?php

function zestsms_timepicker_field( $name, $value, $field ) { ?>
	<div class="zestsms-timepicker">
		<input type="text" class="time" name="<?php echo $name; ?>" value="<?php echo $value; ?>" size="10" />
	</div>
<?php }
add_action( 'fl_builder_control_zestsms-timepicker', 'zestsms_timepicker_field', 1, 3 );

function zestsms_timepicker_field_assets() {
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_script( 'jquery-timepicker', ZESTSMS_FIELDS_URL . 'zestsms-timepicker/js/lib/jquery.timepicker.min.js', array('jquery'), '1.8.0', true );
		wp_enqueue_script( 'zestsms-timepicker', ZESTSMS_FIELDS_URL . 'zestsms-timepicker/js/zestsms-timepicker.js', array('jquery-timepicker'), '1.0', true );
		wp_enqueue_style('jquery-timepicker', ZESTSMS_FIELDS_URL . 'zestsms-timepicker/css/lib/jquery.timepicker.css', false, null);
	}
}
add_action( 'wp_enqueue_scripts', 'zestsms_timepicker_field_assets' );
