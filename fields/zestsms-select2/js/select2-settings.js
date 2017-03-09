(function($){

  ZestSMSSelect2 = {
    _init: function()
    {
      var $el = $('select.zestsms-select2');

      $el.select2({
        width: '100%',
      });

      if($el.attr('multiple')) {
        var ul = $el.next('.select2-container').first('ul.select2-selection__rendered');
        ul.sortable({
          placeholder : 'ui-state-highlight',
          forcePlaceholderSize: true,
          items       : 'li:not(.select2-search__field)',
          tolerance   : 'pointer',
          stop: function() {
            $($(ul).find('.select2-selection__choice').get().reverse()).each(function() {
              var id = $(this).data('data').id;
              var option = $el.find('option[value="' + id + '"]')[0];
              $el.prepend(option);
            });
          }
        });
      }
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
