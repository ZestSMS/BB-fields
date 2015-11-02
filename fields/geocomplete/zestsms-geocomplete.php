<?php

function zestsms_geocomplete_field( $name, $value, $field, $settings ) {
	$location_name = $name . '_location'; ?>
	<div class="zestsms-geocomplete">
		<input type="text" class="geocomplete-address" name="<?php echo $name; ?>" value="<?php echo $value; ?>" placeholder="Enter a location" size="50" />
		<div class="geo-details">
			<input type="hidden" class="geocomplete-location" data-geo="location" name="<?php echo $location_name; ?>" value="<?php echo $settings->{$location_name}; ?>" />
		</div>
	</div>
<?php }
add_action( 'fl_builder_control_zestsms-geocomplete', 'zestsms_geocomplete_field', 1, 4 );

function zestsms_geocomplete_field_assets() {
	if( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_script(
			'googlemaps-api',
			'//maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries=places',
			array(),
			NULL,
			true
		);
		wp_enqueue_script(
			'geocomplete',
			ZESTSMS_FIELDS_URL . 'geocomplete/js/lib/jquery.geocomplete.min.js',
			array('jquery'),
			'1.6.5',
			true
		);
		wp_enqueue_script(
			'zestsms-geocomplete',
			ZESTSMS_FIELDS_URL . 'geocomplete/js/zestsms-geocomplete.js',
			array('jquery', 'geocomplete'),
			'1.0',
			true
		);
		wp_enqueue_style(
			'zestsms-geocomplete',
			ZESTSMS_FIELDS_URL . 'geocomplete/css/zestsms-geocomplete.css'
		);

	}

}
add_action( 'wp_enqueue_scripts', 'zestsms_geocomplete_field_assets' );
