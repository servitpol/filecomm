//таблица со списком файлов

$(document).ready(function() {
	
var dataTable = $('#users-data').DataTable({
	
	"processing": true,
	"serverSide": true,
	"columns": [{"orderable": true},
				{"orderable": true},
				{"orderable": true},
				{"orderable": true},
				{"orderable": true},
				{"orderable": true},
				{"orderable": true},
				{"orderable": false}		//все поля кроме Actions - sortable
],
	"ajax":{
	url :"../includes/tablehand.php", 
	type: "post",  
	error: function(){
		$(".users-data-error").html("");
		$("#eusers-data").append('<tbody class="users-data-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
		$("#users-data-grid_processing").css("display","none");
	}
	}
});
});

//actions
$(document).on('click','.actions', function(){
    var val = $(this).val();
	var name = $(this).attr("name");
	
	var actionData = {
	action : name,
	value : val
	}
	
	aData = JSON.stringify(actionData);
	
	if(name == 'edit'){
		$('#myModalEdit').modal("show");
		$.ajax({
			url: "../includes/actions.php",
			type: "POST",
			data: {actdata: aData},
			dataType: 'json',
			success: function(json){
				$("#updtitle").val(json.title);
				$(".nicEdit-main").html(json.descr);
			}
		});
	} else if (name == 'download') {
	
		$.ajax({
			url: "../includes/actions.php",
			type: "POST",
			data: {actdata: aData},
			dataType: 'json',
			success: function(json){
				$('#users-data').DataTable().ajax.reload();
				var link = document.createElement('a');
				var filename = json.title + '.' + json.filetype;
				link.setAttribute('href',json.fileputh);
				link.setAttribute('download', filename);
				onload=link.click();
			}
		});
	}  else {
		
		$.ajax({
			url: "../includes/actions.php",
			type: "POST",
			data: {actdata: aData},
			dataType: 'json',
			success: function(json){
				$('#users-data').DataTable().ajax.reload();
			}
		});
	}
});



//edit
$('#myModalForm').on('submit', function(e){

	event.stopPropagation(); 
    event.preventDefault(); 
	
	var title = $("#updtitle").val();
	var descr = $(".nicEdit-main").html();				//WYSIWYG редактор заменяет textarea своим блоком, поэтому вытягиваем его значение
	
	var updData = {
		utitle : title,
		udescr : descr
	}
	
	updateData = JSON.stringify(updData);
	console.log(updateData);
	
		$.ajax({
			url: "includes/actions.php",
			type: "POST",
			data: {upddata: updateData},
			dataType: 'json',
			success: function(json){
				$('#myModalEdit').modal("hide");
				$('#users-data').DataTable().ajax.reload();
			}
		});
});



