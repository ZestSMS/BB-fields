<?php

add_action('update_post_meta', 'ZestSMSBuilder::update_post_meta', 1, 4);

final class ZestSMSBuilder {
	
	static public function create_post_meta( $settings, $args ) {
		if(!is_array($args)) return $settings;

		foreach($args as $key=>$val) {
			if(is_int($key)) {
				$key = $val;
				$val = $settings->{$val};
			}
			$settings->{'$zestsms_post_meta'}[$key] = $val;
		}

		return $settings;
	}

	static public function set_terms( $settings, $args ) {
		if(!is_array($args)) return $settings;

		foreach($args as $key=>$val) {
			if(is_int($key)) {
				$key = $val;
				$val = $settings->{$val};
			}
			$settings->{'$zestsms_terms'}[$key] = $val;
		}

		return $settings;
	}

	static public function update_post_meta($meta_id, $post_id, $meta_key, $meta_value){
		if('_fl_builder_data' === $meta_key) {
			$modules = $meta_value;

			if(is_array($modules)) { 
				foreach($modules as $module_id => $module_class){
					if(property_exists($module_class, 'settings')) {
						if(property_exists($module_class->settings, '$zestsms_post_meta') && is_array($module_class->settings->{'$zestsms_post_meta'})) {
							foreach($module_class->settings->{'$zestsms_post_meta'} as $key=>$val) {
								update_post_meta($post_id, $key, $val);
							}
						} else if(property_exists($module_class->settings, '$zestsms_terms') && is_array($module_class->settings->{'$zestsms_terms'})) {
							foreach($module_class->settings->{'$zestsms_terms'} as $key=>$val) {
								wp_set_post_terms($post_id, array((int)$val), $key);
							}
						}
					}
				}
			}
		}
	}

}