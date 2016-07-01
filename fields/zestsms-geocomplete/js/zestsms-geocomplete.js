(function($){

	ZestSMSGeocomplete = {
    _init: function()
    {
      $('body').delegate('.zestsms-geocomplete .geocomplete-address', 'focusin', function(){
      	if (!$(this).hasClass("hasGeocomplete")) {
          $(this).geocomplete({
            details: $(this).parent().find('.geo-details'),
            detailsAttribute: "data-geo"
          }).addClass('hasGeocomplete');
      	}
        $(this).trigger('geocode');
      });

    }
  }

  $(function(){
      ZestSMSGeocomplete._init();
  });
    
})(jQuery);