(function($){

	ZestSMSDatepicker = {
    _init: function()
    {
        $('body').delegate('.zestsms-datepicker', 'click', function(){
        	if (!$(this).hasClass("hasDatepicker")) {
            $(this).datepicker({
				      changeMonth: true,
				      changeYear: true,
				      dateFormat : 'MM d, yy'
				    });
            $(this).datepicker("show");
        	}
        });
    }
  }

  $(function(){
      ZestSMSDatepicker._init();
  });
    
})(jQuery);