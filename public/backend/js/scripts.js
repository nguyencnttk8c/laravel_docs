$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#larvel_token').val()
        }
});
function deleteRecord(id,table){
	var cofirm = window.confirm("Bạn có chắc chắn muốn xóa ? ");
	if(cofirm){
		var data = {
			id:id,
			table:table,
		}
		var url = '/backend/ajax/delete-record';
		$.post(url,data,function(response){
			if(response){
				location.reload();
			}else{
				alert('Đã có lỗi trong quá trình xử lý, vui lòng tải lại trang');
			}
		})
	}
}

var rulesData = [];
$('.form-validate input,.form-validate select').each(function(e){
	var rulesValidate = $(this).data('validate');

	var $this = this;
	if(rulesValidate){
		var properties = rulesValidate.replace('}','').replace('{','').split(',');
		var obj = {};
		properties.forEach(function(property) {
		    var tup = property.split(':');
		    obj[tup[0]] = (tup[1] == "true")?true:tup[1];
		});
		rulesData[$($this).attr("name")] = obj;
	}
	
})
var rules = $.extend({}, rulesData);
$(".form-validate").validate({
	rules: rules
});
$('#navigate-submit').on('click',function(){
	$('#submit').click();
})
$('#navigate-reset').on('click',function(){
	$('#reset').click();
})
$(document).ready(function(){

	$('body').delegate('.tags .tag .close','click',function(){
		alert(1);
	})
})