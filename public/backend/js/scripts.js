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