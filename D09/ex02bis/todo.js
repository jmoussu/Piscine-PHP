
let i = 0;
console.log("START SCRIPT JQUERY");
function madelist()
{
	i = 0;
	for(var k = 0; k < 1000; k++) {
		if (checkCookie(k) == 1)
		{
			find = getCookie(k);
			setCookie(k, find, -100);
			speadd(find, i);
			i++;
		}
	}
	console.log("Fin de madelist()")
}

function speadd(toadd, ispe) //sprimer cookie
{
	var node = $('<p id='+ispe+'>'+toadd+'</p>');
		var textnode = document.createTextNode(toadd);
		node.prependTo("#ft_list");
		d = $("#ft_list").children().first();
		d.click(function() { del(d, ispe)});
		console.log("Speadd id = "+ ispe +" de :");
		console.log(d);
		setCookie(ispe, toadd, 365);
}

function add() 
{
	var person = prompt("Please enter your to do element", "");
	if (person != null && person !== "") 
	{
		var node = $('<p id='+i+'>'+person+'</p>');
		node.prependTo("#ft_list")
		d = $("#ft_list").children().first();
		var	ideadd;
		ideadd = i;
		d.click(function() { del(d, ideadd)});
		console.log("add id = " + ideadd + " de :");
		console.log(d);
		setCookie(i, person, 365);
		i++;
	}
}

function del(node, IDC)
{

	console.log("start function del() start");
	var retVal = confirm("Do you want to remove this To Do ? id = " + IDC );
	if( retVal == true ) {
		$( "#" + IDC ).remove();
		console.log("je remove avec id = " + IDC);
		setCookie(IDC, "deletted", -100);
		return true;
	 } 
	 else 
	 {
		console.log("Cancel del");
		return false;
	 }
}
// document.cookie = "username=John Doe; expires=Thu, 2 Jan 2020 12:00:00 UTC";

function setCookie(cname,cvalue,exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires=" + d.toGMTString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var j = 0; j < ca.length; j++) {
	  var c = ca[j];
	  while (c.charAt(0) == ' ') {
		c = c.substring(1);
	  }
	  if (c.indexOf(name) == 0) {
		return c.substring(name.length, c.length);
	  }
	}
	return "";
  }

function checkCookie(name) {
	var lecook = getCookie(name);
	if (lecook != "") {
	 return(1);
	} 
	else {
	 return(0);
	}
  }
