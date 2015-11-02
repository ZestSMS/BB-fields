(function($){

	ZestSMSTimepicker = {
    _init: function()
    {
      $('body').delegate('.zestsms-timepicker .time', 'click', function(){
        if (!$(this).hasClass("ui-timepicker-input")) {
          $(this).timepicker({
            'appendTo': $(this).parent().parent(),
            'scrollDefault': '3:00pm',
            'showDuration': true,
            'timeFormat': 'g:i a'
          });
        }
        $(this).timepicker('show');
      });

			$('body').delegate('.zestsms-timepicker .time', 'change', function(){
        var range_input = $(this).attr('data-range'),
				start = $.trim($('.zestsms-timepicker .start[data-range='+ range_input +']').val()),
        end = $.trim($('.zestsms-timepicker .end[data-range='+ range_input +']').val());

        $('input.' + range_input).val(start + ' to ' + end);
      });
    }
  }

  $(function(){
      ZestSMSTimepicker._init();
  });

})(jQuery);
