$('#button_r').click(function(){

var name= $("#name").val();
var email=$("#email").val();
var pass=$("#password").val();
var repass=$("#repassword").val();
var phone=$('#phone').val();
var coll=$('#college').val();
	if (pass.length<6) {
		$('#register_status').html("Password is less than 6 character");
		return;
	};
	if(pass!=repass)
	{
		$('#register_status').html("Password Don't match");
		return;
	}
		
	$.ajax({
		url :'public/php/tempreg.php',
		data:'na='+encodeURIComponent(name)+'&em='+encodeURIComponent(email)+'&pas='+encodeURIComponent(pass)+'&pho='+encodeURIComponent(phone)+'&col='+encodeURIComponent(coll),
		success:function(data){
			$('#register_status').html(data);
		}
	});
});
