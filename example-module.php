<?php

/**
 * @class FLMapModule
 */
class ZestSMSExampleModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          => __('Example Fields Module', 'zestsms'),
			'description'   => __('Demonstration of new fields', 'zestsms'),
			'category'      => __('Advanced Modules', 'zestsms'),
			'dir'           => ZESTSMS_MODULES_DIR . 'example/',
			'url'           => ZESTSMS_MODULES_URL . 'example/'
		));

	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('ZestSMSExampleModule', array(
	'general'       => array(
		'title'         => __('General', 'zestsms'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
          'datepicker'    => array(
            'type'      => 'zestsms-datepicker',
            'label'     => __('Datepicker', 'zestsms')
          ),
          'geocomplete'   => array(
            'type'      => 'zestsms-geocomplete',
            'label'     => __('Geocomplete', 'zestsms')
          ),
          'pdf'           => array(
            'type'      => 'zestsms-pdf',
            'label'     => __('PDF', 'zestsms')
          ),
					'timepicker'		=> array(
						'type'			=> 'zestsms-timepicker',
						'label'			=> __('Timepicker', 'zestsms')
					),
          'timespan'      => array(
            'type'      => 'zestsms-timespan',
            'label'     => __('Timespan', 'zestsms')
          ),
          'dropdown_pages'  => array(
						'type'			=> 'zestsms-wp-dropdown',
						'label'     => __('Pages', 'zestsms'),
						'show_option_none' => __('-- Select --', 'zestsms'),
						'option_none_value'=> 0
					),
					'select2'			=> array(
						'type'				=> 'zestsms-select2',
						'label'				=> __('Select2', 'zestsms'),
						'options'			=> array(
							'option-1'		=> __('Option 1', 'zestsms'),
							'option-2'		=> __('Option 2', 'zestsms'),
							'option-3'		=> __('Option 3', 'zestsms')
						),
						'multi-select' => true
					),
					'select2_custom'			=> array(
						'type'				=> 'zestsms-select2',
						'label'				=> __('Select2 Custom', 'zestsms'),
						'options_from_field' => 'select2_custom',
						'attributes'  => array(
							'data-placeholder'  => __('Optional'),
							'data-tags' => true
						)
					)
				)
			)
		)
	)
));
