<?php

function zestsms_timespan_field( $name, $value, $field, $settings ) {
?>
	<div class="zestsms-timespan">
		<input type="text" name="<?php echo $name; ?>_start" class="time start" value="<?php echo $settings->{$name . '_start'}; ?>" data-range="<?php echo $name; ?>" size="10" /><span class="between">&nbsp;&nbsp;to&nbsp;&nbsp;</span><input type="text" name="<?php echo $name; ?>_end" class="time end" value="<?php echo $settings->{$name . '_end'}; ?>" data-range="<?php echo $name; ?>" size="10" />
		<input type="hidden" class="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
	</div>
<?php }
add_action( 'fl_builder_control_zestsms-timespan', 'zestsms_timespan_field', 1, 4 );

function zestsms_timespan_field_assets() {
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_script( 'jquery-timepicker', ZESTSMS_FIELDS_URL . 'timespan/js/lib/jquery.timepicker.min.js', array('jquery'), '1.8.0', true );
		wp_enqueue_script( 'zestsms-timespan', ZESTSMS_FIELDS_URL . 'timespan/js/zestsms-timespan.js', array('jquery-timepicker'), '1.0', true );
		wp_enqueue_style('jquery-timepicker', ZESTSMS_FIELDS_URL . 'timespan/css/lib/jquery.timepicker.css', false, null);
	}
}
add_action( 'wp_enqueue_scripts', 'zestsms_timespan_field_assets' );
