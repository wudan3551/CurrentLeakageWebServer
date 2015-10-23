$(document).ready(function(){
$("#password").keydown(function(){
	var email = $("#email").val();
	var password = $("#password").val();
	var key = event.which;
	
	//console.log(key);
	
	if(key == 13){
	if( email == '' || password == ''){
		$('input[type="text"],input[type="password"]').css("border","2px solid red");
		$('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
		alert("请输入用户名和密码！");
	}else {
		$.post("login.php",{ myemail: email, mypassword: password},
		function(data) {
			//data stored date from server after post meathod
			if(data == 1) {
				//step 1 : set global scope cookie
				document.cookie = "UserName=" + email + ";path=/";
				//step 2 : redirect to data page
				window.location.href = "/index.html";
			} else{
				$('input[type="text"],input[type="password"]').css("border","2px solid red");
				$('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
				alert("请输入正确的用户名或密码!");
			}
		});
	}
	}
});
$("#login").click(function(){
	var email = $("#email").val();
	var password = $("#password").val();
	// Checking for blank fields.
	if( email == '' || password == ''){
		$('input[type="text"],input[type="password"]').css("border","2px solid red");
		$('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
		alert("请输入用户名和密码！");
	}else {
		$.post("login.php",{ myemail: email, mypassword: password},
		function(data) {
			//data stored date from server after post meathod
			if(data == 1) {
				//step 1 : set global scope cookie
				document.cookie = "UserName=" + email + ";path=/";
				//step 2 : redirect to data page
				window.location.href = "/index.html";
			} else{
				$('input[type="text"],input[type="password"]').css("border","2px solid red");
				$('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
				alert("请输入正确的用户名或密码!");
			}
		});
	}
});

});
