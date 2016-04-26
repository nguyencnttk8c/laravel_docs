jQuery(function($) {
    $('.selectpicker').selectpicker();
    $('.danh-muc').delegate( ".selectpicker", 'changed.bs.select', function(e) {
        var _this = $(this);
        var tax_id = _this.val();
        if (tax_id != '') {
            $('#tax_id').val(tax_id);
            var url = '/find-taxonomy-by-parent';
            var data = {
                '_token' : $("input[name='_token']").val(),
                'tax_id' : tax_id
            };
            var _return = '';
            $.post(url, data,  function (res) {
                var response = $.parseJSON(res);
                if (!$.isEmptyObject(response)) {
                    _return = '<select title="Danh mục" class="selectpicker danh-muc-con">';
                    $.each(response, function (key, value) {
                        _return += '<option value="'+key+'">'+ value +'</option>'
                    });
                    _return += '</select>';
                    $('.danh-muc').append(_return);
                    $('.selectpicker').selectpicker();
                    $('#tax_id').val('');
                }
            });
        }
    });
});
