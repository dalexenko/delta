<!-- Begin

// NOTE: If you use a ' add a slash before it like this \'


var color		= "999999"	// HEADER BACKGROUND COLOR
var stripcolor		= "CC0000"	// HEADER MENU STRIPE COLOR
var flashheight		= "100"		// HEIGHT OF THE FLASH (IN PIXELS)
var flashwidth		= "750"		// WIDTH OF THE FLASH (IN PIXELS)
var date 		= "yes" 	// SHOW DATE



document.write('<form action="index.php" method="post"><TABLE cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#'+color+'"><tr><td width="150" bgcolor="#000000">');
document.write('<img src="picts/spacer.gif" HEIGHT="10" WIDTH="150" bgcolor="#000000"><br>');
document.write('<td align="left" valign="top" height="110">');
//document.write('<img src="picts/logo.gif" height="110">');
document.write('<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="'+flashwidth+'" HEIGHT="'+flashheight+'" id="logo" ALIGN="">');
document.write('<PARAM NAME=movie VALUE="logo2.swf">');
document.write('<PARAM NAME=quality VALUE=high>');
document.write('<PARAM NAME=bgcolor VALUE=#'+color+'> <EMBED src="logo2.swf" quality=high wmode=transparent bgcolor=#'+color+'  WIDTH="'+flashwidth+'" HEIGHT="'+flashheight+'" NAME="logo" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>');
document.write('</OBJECT><br>');
document.write('</td><td width="10">');
document.write('&nbsp;<br>');
document.write('</td></tr><tr><td bgcolor="#'+stripcolor+'" colspan="2" height="20" align="right">');
document.write('<form action="index.php" method="get"><TABLE cellpadding="0" cellspacing="4" border="0" height="18"><tr><td><br>');


// START HORIZONTAL LINKS - COPY AND PASTE THE NEXT 3 LINES TO ADD A LINK


document.write('</td><td>');
document.write('<input type=text class="a" name="find" value="текст поиска">&nbsp;');



document.write('<input type="submit" value="Поиск" class="b">');



document.write('</td></tr></table>');
document.write('</td><td width="10" bgcolor="#'+stripcolor+'">');
document.write('&nbsp;<br>');
document.write('</td></tr></table></form>');






// START DATE SCRIPT

// COPYRIGHT 2004 © Allwebco Design Corporation
// Unauthorized use or sale of this script is strictly prohibited by law

   if (date == "yes") {
document.write('<div id="date-location">');
var d=new Date()
var weekday=new Array("Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота")
var monthname=new Array("Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря")
document.write("<span class=\"headermenu\">&nbsp;<nobr>" + weekday[d.getDay()] + " ")
document.write(d.getDate() + " ")
document.write(monthname[d.getMonth()] + " ")
document.write(d.getFullYear()+" г.")
document.write("</nobr><br></span>")
document.write('</div>');
}



//  End -->









