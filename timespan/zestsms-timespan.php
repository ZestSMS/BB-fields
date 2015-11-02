<?php

function zestsms_timespan_field( $name, $value, $field, $settings ) {
?>
	<div class="zestsms-timepicker">
		<input type="text" name="<?php echo $name; ?>_start" class="time start" value="<?php echo $settings->{$name . '_start'}; ?>" data-range="<?php echo $name; ?>" /><span class="between">to</span>
		<input type="text" name="<?php echo $name; ?>_end" class="time end" value="<?php echo $settings->{$name . '_end'}; ?>" data-range="<?php echo $name; ?>" />
		<input type="hidden" class="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
	</div>
<?php }
add_action( 'fl_builder_control_zestsms-timespan', 'zestsms_timepicker_field', 1, 4 );

function zestsms_timespan_field_assets() {
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_script( 'jquery-timepicker', ZESTSMS_FIELDS_URL . 'timepicker/js/lib/jquery.timepicker.min.js', array('jquery'), '1.8.0', true );
		wp_enqueue_script( 'zestsms-timepicker', ZESTSMS_FIELDS_URL . 'timepicker/js/zestsms-timespan.js', array('jquery-timepicker'), '1.0', true );
		wp_enqueue_style('jquery-timepicker', ZESTSMS_FIELDS_URL . 'timepicker/css/lib/jquery.timepicker.css', false, null);
		wp_enqueue_style('zestsms-timepicker', ZESTSMS_FIELDS_URL . 'timepicker/css/zestsms-timespan.css', false, null);
	}
}
add_action( 'wp_enqueue_scripts', 'zestsms_timespan_field_assets' );
