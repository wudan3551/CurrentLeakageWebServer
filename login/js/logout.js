$(document).ready(function(){
	function delete_cookie( name ){
		document.cookie = name + '=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
	//clear cookie
	//console.log(document.cookie);
	delete_cookie("UserName");
	//console.log(document.cookie);
	document.location.replace("/login/login.html");
})
