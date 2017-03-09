(function($){

    ZestSMSMeasurement = {
        _init: function()
        {
            $('.zestsms-measurement').on('input keyup change', function(){
				setTimeout($.proxy(ZestSMSMeasurement._updateAndPreview, this), 0);
            });
        },

		_updateAndPreview: function()
		{
			var e = {
				target: this
			};

            var field_value,
            	measurement_input = $(this).find('input.measurement-input'),
            	measurement_unit = $(this).find('select.measurement-unit');

            field_value = $('option:selected', measurement_unit).val();
            if(measurement_input.css('display') != 'none') {
				var field_measurement = (measurement_input.val()) ? $.trim(measurement_input.val()) : '0';
                field_value = field_measurement + field_value;
            }

            $(this).find('input.field-value').val(field_value);

			FLBuilder.preview.delayPreview(e);
		}
    }

	FLBuilder.addHook('settings-form-init', function() {
	    ZestSMSMeasurement._init();
	});

})(jQuery);
