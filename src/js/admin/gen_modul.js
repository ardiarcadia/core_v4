$(document).ready(function(){

    var url_ctrl = site_url+"admin/gen_modul/";
    
    $(document).on('click','button#create_main_btn',function(e){
		e.preventDefault();
        var folder_name1 	= $("input#folder_name1").val();
		var file_name1		= $("input#file_name1").val();
		$.ajax({
			method:"POST",
			url:url_ctrl+'act_main_modul',
			cache:false,
			data: {
                folder_name1:folder_name1,
                file_name1	:file_name1
			}
		})
		.done(function(result) {
			var obj = jQuery.parseJSON(result);
			if(obj.status == 1){
                notifNo(obj.notif);
			}
			if(obj.status == 2){
            	notifYesAuto(obj.notif);
			}
		})
		.fail(function(res){
			alert('Error Response !');
			console.log("responseText", res.responseText);
		});
	});

	$(document).on('click','button#create_sub_btn',function(e){
		e.preventDefault();
        var folder_name2 	= $("select#folder_name2").val();
		var file_name2 		= $("input#file_name2").val();
		$.ajax({
			method:"POST",
			url:url_ctrl+'act_sub_modul',
			cache:false,
			data: {
                folder_name2:folder_name2,
                file_name2	:file_name2
			}
		})
		.done(function(result) {
			var obj = jQuery.parseJSON(result);
			if(obj.status == 1){
                notifNo(obj.notif);
			}
			if(obj.status == 2){
            	notifYesAuto(obj.notif);
			}
		})
		.fail(function(res){
			alert('Error Response !');
			console.log("responseText", res.responseText);
		});
	});

});