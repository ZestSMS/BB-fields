<?php

function zestsms_get_field_options($settings, $field, $options = array()) {
  if(!is_object($settings) && !is_array($settings)) return $options;

  foreach($settings as $key=>$val) {
     if($key === $field) {
       if(is_array($val)) {
         foreach($val as $v) {
           $options[$v] = $v;
         }
       } else {
         $options[$val] = $val;
       }
    } else {
      if(is_array($val) || is_object($val)){
        $options = zestsms_get_field_options($val, $field, $options);
      }
    }
  }

  return array_unique($options);
}


function zestsms_select2_field( $name, $value, $field, $settings ) {
  $options = ($field['options']) ? $field['options'] : array();

  if($options_field = $field['options_from_field']) {
    $post_data = FLBuilderModel::get_post_data();
    $parent_settings = $post_data['node_settings'];

    $options = zestsms_get_field_options($parent_settings, $options_field, $options);
  }

  // Create attributes
  $attributes = '';
  if(is_array($field['attributes'])) {
    foreach($field['attributes'] as $key=>$val) {
      $attributes .= $key .'="'. $val .'" ';
    }
  }

  if(!empty($options) && $value) {
    uksort($options, function($key1, $key2) use ($value) {
      return (array_search($key1, $value) > array_search($key2, $value));
    });
  }

  // Show the select field
  ?>
  <select name="<?php echo $name; if(isset($field['multi-select'])) echo '[]'; ?>" class="zestsms-select2 <?php echo $field['class']; ?>" <?php if(isset($field['multi-select'])) echo 'multiple '; echo $attributes; ?>>
  	<?php

  	foreach ( $options as $option_key => $option_val ) :

  		if ( is_array( $option_val ) && isset( $option_val['premium' ] ) && $option_val['premium'] && true === FL_BUILDER_LITE ) {
  			continue;
  		}

  		$label = is_array( $option_val ) ? $option_val['label'] : $option_val;

  		if ( is_array( $value ) && in_array( $option_key, $value ) ) {
  			$selected = ' selected="selected"';
  		}
  		else if ( ! is_array( $value ) && selected( $value, $option_key, true ) ) {
  			$selected = ' selected="selected"';
  		}
  		else {
  			$selected = '';
  		}

  	?>
  	<option value="<?php echo $option_key; ?>" <?php echo $selected; ?>><?php echo $label; ?></option>
  	<?php endforeach; ?>
  </select>
  <?php
}
add_action( 'fl_builder_control_zestsms-select2', 'zestsms_select2_field', 1, 4 );

function zestsms_select2_field_assets() {
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_script( 'select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array('jquery'), '4.0.3', true );
		wp_enqueue_script( 'select2-settings', ZESTSMS_FIELDS_URL . 'zestsms-select2/js/select2-settings.js', array(), '1.0', true );
		wp_enqueue_style('select2', ZESTSMS_FIELDS_URL . 'zestsms-select2/css/select2.min.css', false, null);
	}
}
add_action( 'wp_enqueue_scripts', 'zestsms_select2_field_assets' );
