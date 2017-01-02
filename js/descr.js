//скрипт вызова полного description через ajax
var timer;

$(document).on('mouseover','.descrinfo', function(){
	var val = $(this).val();
	var name = $(this).attr("name");
	
	var block = ('#descrinfo' + val);
	//таймер для того чтобы НЕ отображать данные в description при случайном проведении мышью
	timer = setTimeout(function () {
	
	var descInfo = {
	action : name,
	value : val
	}
	
	dInfo = JSON.stringify(descInfo);
	console.log(dInfo);
	$.ajax({
		url: "includes/actions.php",
		type: "POST",
		data: {descinfo: dInfo},
		dataType: 'json',
		success: function(json){
			$(block).html(json.descr);
			$(block).css('display', 'block');
		}
	});}, 500);
	$(document).on('mouseout','.descrinfo', function(){
	clearTimeout(timer);
	$(block).css('display', 'none');
});

});
