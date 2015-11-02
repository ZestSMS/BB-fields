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
    }
  }

  $(function(){
      ZestSMSTimepicker._init();
  });

})(jQuery);
