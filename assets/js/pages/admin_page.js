$( function () {

	$(document).on('click', '.btn-add-action', function() {
		$('#default-modal').modal('show');
	});

	$('#level').on('change', function() {
		var level = $(this).val();

		if ( level == 1 ) {
			$('#level_name').html('<option value="">-</option>');
			return;
		}
		
		$.ajax({
			url : base_url + 'admsys/site/get_level_name',
			type : 'POST',
			dataType : 'JSON',
			data : {'key' : level},
			success : function (data) {
				if ( data.type == 'done') {
					$('#level_name').html('<option value="">-</option>');
					if ( data.msg.length != 0 ) {
						for (var i = 0; i < data.msg.length; i++) {
							$('#level_name').append('<option value="'+data.msg[i].value+'">'+data.msg[i].text+'</option>')
						}
					}
					$('#parent_plan').html('<option value="">-</option>');
					if ( data.msg2.length != 0 ) {
						for (var i = 0; i < data.msg2.length; i++) {
							$('#parent_plan').append('<option value="'+data.msg2[i].value+'">'+data.msg2[i].text+'</option>')
						}
					}
				}
			}
		});
	});
	
	$("#action-plan-form").ajaxForm({
		dataType: "json",
		url : base_url + 'admsys/site/save',
		beforeSubmit: function(){
			$('#btn-submit').removeClass('btn-primary').addClass('btn-warning').prop('disabled', true);
		},
		success: function(data){
			var sa_title = (data.type == 'done') ? "Success!" : "Failed!";
			var sa_type = (data.type == 'done') ? "success" : "warning";
			Swal.fire({ title:sa_title, type:sa_type, html:data.msg }).then(function(){ 
				if (data.type == 'done') window.location.reload(); 
			});
		},
		error: function(){
			Swal.fire ( "Failed!", "Error Occurred, Please refresh your browser.", "error" );
		},
		complete: function(){
			$('#btn-submit').removeClass('btn-warning').addClass('btn-primary').prop('disabled', false);
		}
	});
	
});