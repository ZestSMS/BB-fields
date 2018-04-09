(function($){

	ZestSMSMeasurement = {
    _init: function()
    {
			$('body').delegate('.zestsms-measurement', 'focusout', function(){
        var field_value,
        measurement_input = $(this).find('input.measurement-input'),
				measurement_unit = $(this).find('select.measurement-unit');

        field_value = $('option:selected', measurement_unit).text();
        if(measurement_input.not(':hidden')) field_value = $.trim(measurement_input.val()) + field_value;

        $(this).find('input.field-value').val(field_value);
      });
    }
  }

  $(function(){
      ZestSMSMeasurement._init();
  });

})(jQuery);
