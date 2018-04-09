(function ($) {

    ZestSMSSelect2 = {
        _init: function () {
            $('select.zestsms-select2').each(function () {
                $(this).select2({
                    width: '100%',
                }).on('change', $.proxy(ZestSMSSelect2._maybePreview, this.context))
                    .on('select2:unselecting', function (e) {
                        $(this).data('unselecting', true);
                    }).on('select2:open', function (e) { // note the open event is important
                    if ($(this).data('unselecting')) {
                        $(this).removeData('unselecting'); // you need to unset this before close
                        $(this).select2('close');
                    }
                });

                if ($(this).attr('multiple')) {
                    var ul = $(this).siblings('.select2-container').first('ul.select2-selection__rendered');
                    ul.sortable({
                        placeholder: 'ui-state-highlight',
                        forcePlaceholderSize: true,
                        items: 'li:not(.select2-search__field)',
                        tolerance: 'pointer',
                        stop: function () {
                            $($(ul).find('.select2-selection__choice').get().reverse()).each(function () {
                                var id = $(this).data('data').id;
                                var option = $(this).find('option[value="' + id + '"]')[0];
                                $(this).prepend(option);
                            });
                        }
                    });
                }
            });
        },

        _maybePreview: function () {
            var e = {
                target: this
            };

            var field = $(this).closest('.fl-field');
            var previewType = field.data('preview');

            if ('refresh' == previewType.type) {
                FLBuilder.preview.delayPreview(e);
            }
        }
    }

    FLBuilder.addHook('settings-form-init', function () {
        ZestSMSSelect2._init();
    });

})(jQuery);
