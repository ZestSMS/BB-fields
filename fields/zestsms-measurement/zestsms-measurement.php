<?php

function get_bb_measurement_units() {
	$units = array(
		'auto'  => array(
			'label'   => __('Auto', 'zestsms'),
			'hide_input'  => true
		),
		'px' => array(
			'label'   => 'px'
		),
		'%' => array(
			'label'   => '%'
		),
		'em'  => array(
			'label'   => 'em'
		),
		'rem'	=> array(
			'label'	=> 'rem'
		)
	);

	return apply_filters('bb_measurement_units', $units);
}

function zestsms_measurement_field( $name, $value, $field, $settings ) {
	$units = get_bb_measurement_units();
	$toggle = array();

	$field_input = $settings->{$name . '-input'};
	$field_unit = $settings->{$name . '-unit'};

	if(!isset($field['placeholder'])) $field['placeholder'] = '0';
	if(!isset($field['default'])) $field['default'] = 'auto';
	if(!isset($value) || $value == '') $value = 'auto';

	foreach($units as $unit=>$param) {
		// Define toggle
		if(!$param['hide_input']) $toggle[$unit]['fields'] = array($name .'-input');

		// Set value from default field settings
		if(isset($field['default']) && $field['default'] != 'auto' && $value == $field['default']) {
			if(strpos($field['default'], $unit)) {
				$field_input = strstr($field['default'], $unit, true);
				$field_unit = strstr($field['default'], $unit);
			}
		}

		// Define options
		$options .= '  <option value="'. $unit .'"';
		if($field_unit == $unit) $options .= ' selected="selected"';
		$options .= '>'. $param['label'] .'</option>';
	}

	?>
	<div class="zestsms-measurement">
		<input type="text" id="fl-field-<?php echo $name; ?>-input" name="<?php echo $name; ?>-input" value="<?php echo $field_input; ?>" class="text measurement-input<?php if(isset($field['class'])) echo ' '. $field['class']; if(!isset($field['size'])) echo ' text-full'; ?>" <?php if(isset($field['placeholder'])) echo ' placeholder="'. $field['placeholder'] .'"'; if(isset($field['maxlength'])) echo ' maxlength="'. $field['maxlength'] .'"';  if(isset($field['size'])) echo ' size="'. $field['size'] .'"'; ?> />
		<select name="<?php echo $name;?>-unit" class="measurement-unit" data-toggle='<?php echo json_encode($toggle); ?>'><?php echo $options; ?></select>
		<input type="hidden" class="field-value" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
	</div>
	<?php
}
add_action( 'fl_builder_control_zestsms-measurement', 'zestsms_measurement_field', 1, 4 );

function zestsms_measurement_field_assets() {
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_script(
			'zestsms-measurement',
			ZESTSMS_FIELDS_URL . 'zestsms-measurement/js/zestsms-measurement.js',
			array(),
			NULL,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'zestsms_measurement_field_assets' );
