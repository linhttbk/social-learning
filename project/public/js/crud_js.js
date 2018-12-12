function OnsubmitClick(){
	var doclink =document.getElementById("document_link").value();
	var docdess =document.getElementById("document_des").value();
	if(doclink==""||docdess==""){
		if(doclink=="")
			document.getElementById("document-link-error").display="block";
		if(doclink=="")
			document.getElementById("document-des-error").display="block";
		return false;
	}
}
