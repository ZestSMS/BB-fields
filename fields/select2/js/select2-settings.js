(function($){

  ZestSMSSelect2 = {
    _init: function()
    {
      var $el = $('select.zestsms-select2');
      $el.select2({
        width: '100%'
      }).on('select2:unselecting', function(e) {
        $el.data('unselecting', true);
      }).on('select2:open', function(e) { // note the open event is important
        if ($el.data('unselecting')) {
          $el.removeData('unselecting'); // you need to unset this before close
          $el.select2('close');
        }
      });
    }
  }

  $(function(){
    var initSettingsForms = FLBuilder._initSettingsForms;
    FLBuilder._initSettingsForms = function() {
      ZestSMSSelect2._init();
      initSettingsForms();
    };
  });

})(jQuery);
