<!-- Start

// NOTE: If you use a ' add a slash before it like this \'

// FLOATING MENU AREA - SEE NOTE BELOW FOR MOVING THE MENU UP ON THE PAGE


if (!document.layers)
document.write('<div id="Floater" style="position:absolute">')

document.write('<layer id="Floater">');
document.write('<table border="0" cellspacing="0" cellpadding="0" width="150"><tr><td>');
document.write('<img src="picts/menu-top.gif"><br>');


// START LINK 1

document.write('</td></tr><tr><td>');
document.write('<a href="#top" class="menu">Вверх</a>');


// START LINK 2

document.write('</td></tr><tr><td>');
document.write('<a href="index.html" class="menu">На главную</a>');


// START LINK 3

document.write('</td></tr><tr><td>');
document.write('<a href="index.php?id=20" class="menu">Контакты</a>');



document.write('</td></tr></table>');
document.write('</layer>');


// NOTE: If you add links you will need to alter the "placeY" 82 number below


if (!document.layers)
document.write('</div>')

function JSFX_FloatTopDiv()
{
	var placeX = 0,
	placeY = 82;
	var ns = (navigator.appName.indexOf("Netscape") != -1);
	var d = document;
	function DeLayer(id)
	{
		var GetElements=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
		if(d.layers)GetElements.style=GetElements;
		GetElements.sP=function(x,y){this.style.left=x;this.style.top=y;};
		GetElements.x = placeX;
		GetElements.y = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		GetElements.y -= placeY;
		return GetElements;
	}
	window.stayTopLeft=function()
	{
		var pY = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		ftlObj.y += (pY - placeY - ftlObj.y)/15;
		ftlObj.sP(ftlObj.x, ftlObj.y);
		setTimeout("stayTopLeft()", 10);
	}
	ftlObj = DeLayer("Floater");
	stayTopLeft();
}
JSFX_FloatTopDiv();


//  End -->

