$( function () {

	$(document).on('click', '.btn-update', function(e) {
		e.preventDefault();
		
		var id_child = $(this).data('id');
		var id_parent = $(this).data('id2');
		var level = $(this).data('level');

		$.ajax({
			url : base_url + 'site/get_last_progress',
			type : 'POST',
			dataType : 'JSON',
			data : {
				'id' : id_child,
				'level' : level
			},
			success : function (data) {
				if ( data.type == 'done' ) {
					$('#level_progress').val(data.msg);
					$('#level_progress').attr('min', data.msg);
					$('#id_parent').val(id_parent);
					$('#id_child').val(id_child);
					$('#level').val(level);
					$('#default-modal').modal('show');
				}
			}
		});
	});
	
	
	$("#progress-form").ajaxForm({
		dataType: "json",
		url : base_url + 'site/update_progress',
		beforeSubmit: function(){
			$('#btn-submit').html('Please Wait ...').removeClass('btn-primary').addClass('btn-warning').prop('disabled', true);
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
			$('#btn-submit').html('Save').removeClass('btn-warning').addClass('btn-primary').prop('disabled', false);
		}
	});

	$.ajax({
		url : base_url + 'site/get_progress_level_2',
		type : 'POST',
		dataType : 'JSON',
		data : {'level1_id' : $('#level1_id').text()},
		success : function (data) {
			if ( data.type == 'done') {
				for (var i = 0; i < data.msg.length; i++) {

					var chart = new Chart( $('#chart-doughnut-'+data.msg[i].id), {
						type : 'doughnut',
						data : {
							datasets	: [{
								data : [data.msg[i].level2_progress, 100-data.msg[i].level2_progress],
								backgroundColor : ['rgb(102, 255, 51)', 'rgb(255, 255, 0)'],
								borderWidth : 1
							}],
							labels 		: ['Tercapai : '+data.msg[i].level2_progress+'%'],
						},
						options : {
							tooltips : {
								enabled : false
							},
							legend : {
								position : 'bottom',
								fontSize : 14
							}
						}
					});

				}
			}
		}
	});

	$.ajax({
		url : base_url + 'site/get_progress_level_3',
		type : 'POST',
		dataType : 'JSON',
		data : {'level2_id' : $('#level2_id').text()},
		success : function (data) {
			if ( data.type == 'done') {
				for (var i = 0; i < data.msg.length; i++) {

					var chart = new Chart( $('#chart-doughnut-'+data.msg[i].id), {
						type : 'doughnut',
						data : {
							datasets	: [{
								data : [data.msg[i].level3_progress, 100-data.msg[i].level3_progress],
								backgroundColor : ['rgb(102, 255, 51)', 'rgb(255, 255, 0)'],
								borderWidth : 1
							}],
							labels 		: ['Tercapai : '+data.msg[i].level3_progress+'%'],
						},
						options : {
							tooltips : {
								enabled : false
							},
							legend : {
								position : 'bottom',
								fontSize : 14
							}
						}
					});

				}
			}
		}
	});

	$.ajax({
		url : base_url + 'site/get_progress_level_4',
		type : 'POST',
		dataType : 'JSON',
		data : {'level3_id' : $('#level3_id').text()},
		success : function (data) {
			if ( data.type == 'done') {
				for (var i = 0; i < data.msg.length; i++) {

					var chart = new Chart( $('#chart-doughnut-'+data.msg[i].id), {
						type : 'doughnut',
						data : {
							datasets	: [{
								data : [data.msg[i].level4_progress, 100-data.msg[i].level4_progress],
								backgroundColor : ['rgb(102, 255, 51)', 'rgb(255, 255, 0)'],
								borderWidth : 1
							}],
							labels 		: ['Tercapai : '+data.msg[i].level4_progress+'%'],
						},
						options : {
							tooltips : {
								enabled : false
							},
							legend : {
								position : 'bottom',
								fontSize : 14
							}
						}
					});

				}
			}
		}
	});

	$.ajax({
		url : base_url + 'site/get_progress_level_5',
		type : 'POST',
		dataType : 'JSON',
		data : {'level4_id' : $('#level4_id').text()},
		success : function (data) {
			if ( data.type == 'done') {
				for (var i = 0; i < data.msg.length; i++) {

					var chart = new Chart( $('#chart-doughnut-'+data.msg[i].id), {
						type : 'doughnut',
						data : {
							datasets	: [{
								data : [data.msg[i].level5_progress, 100-data.msg[i].level5_progress],
								backgroundColor : ['rgb(102, 255, 51)', 'rgb(255, 255, 0)'],
								borderWidth : 1
							}],
							labels 		: ['Tercapai : '+data.msg[i].level5_progress+'%'],
						},
						options : {
							tooltips : {
								enabled : false
							},
							legend : {
								position : 'bottom',
								fontSize : 14
							}
						}
					});

				}
			}
		}
	});

});