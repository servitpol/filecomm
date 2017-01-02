//авторизация
$(function(){
$('#auth').on('submit', function(e){
e.preventDefault();

var aemail = $("#authemail").val();
var apass = $("#authpass").val();
	
	var auth = {
	authemail : aemail,
	authpass : apass
	}
	
	authData = JSON.stringify(auth);
	console.log(authData);
$.ajax({
  url: "../includes/authhand.php",
  type: "POST",
  data: {authdata: authData},
  dataType: 'json',
  success: function(json){
	
	if(json){
	  $("#result").html(json);
	}
  }
});
});
});

//регистрация
$(function(){
$('#reg').on('submit', function(e){
e.preventDefault();

var remail = $("#regemail").val();
var rname = $("#name").val();
var rinfo = $("#info").val();
var rpass = $("#regpass").val();
var rpassr = $("#regpassr").val();
	
	var reg = {
	regemail : remail,
	regname : rname,
	reginfo : rinfo,
	regpass : rpass,
	regpassr : rpass
	}
	
	regData = JSON.stringify(reg);
	console.log(regData);
$.ajax({
  url: "../includes/reghand.php",
  type: "POST",
  data: {regdata: regData},
  dataType: 'json',
  beforeSend: function(){						
	$("#result").html('Loading...');
	},
  success: function(json){
	//document.location="../index.php?page=1&newuser";
	$("#result").html(json);
  }
});
});
});