function getCookie(cname){
	var name = cname + "=";
	var ca = document.cookie.split(';');
			
	for(var i = 0;i < ca.length;++i) {
		var tmp = ca[i];
				
		while(tmp.charAt(0) == ' ')
			tmp = tmp.substring(1);

		if(tmp.indexOf(name) == 0)
			return tmp.substring(name.length,tmp.length);
	}
	return "";//default return value
}
