//Simple ajax takes in a url and returns 
function ajax_simple_get(url, params)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		ajax_simple_response(JSON.parse(xmlhttp.responseText));
    }
  }
  if(params == null){
	parameters = url;  
  }
  else{
  	var parameters = url+"?users="+params;
  }
xmlhttp.open("GET", parameters, true);
xmlhttp.send();
}

//Ajax response function

function ajax_simple_response(serv_response){
	userData = serv_response;	
	
}
