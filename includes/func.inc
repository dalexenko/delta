<?
error_reporting(E_ERROR);

$mysqlhost='db.biz.ua';
$mysqlbase ='delta_deltadb';
$mysqluser ='delta';
$mysqlpass ='q1wzes';

$conn = mysql_connect ($mysqlhost, $mysqluser, $mysqlpass)
or die ("Could not connect");
$tbl = mysql_select_db ($mysqlbase, $conn) or die ("Could not select db");

////////////////////////////////////////////////////////////////////////////////

function put_menu($parent_id, $id = null, $flag = null)
{
#$parent_id = $HTTP_GET_VARS['parent_id'];
	$result = mysql_query("select id, parent_id, caption, href from menu where parent_id ".($parent_id ? "= ".$parent_id : "is null")." order by sort, caption");
	if ($parent_id)
	{
		$result1 = mysql_query("select parent_id from menu where id = $parent_id");
		$row1 = mysql_fetch_array($result1, MYSQL_ASSOC);
		if ($flag <> 2)
			$level = put_menu($row1["parent_id"], $parent_id, 1) + 1;
		else
			$level = put_menu($row1["parent_id"], -1, 2) + 1;
	}
	else
		$level = 0;
	if ($flag == 2)
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
			if ($row["id"] == $id)
				break;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		echo "</td></tr><tr><td><A class=menu HREF='?id=".$row['id']."'>".$row["caption"]."</A>";
		if ($flag == 1 && $row["id"] == $id)
			break;
	}
	if ($parent_id)
		if ($flag <> 1 && $id != -1)
			put_menu($row1["parent_id"], $parent_id, 2);
	return $level;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////

function massage($mysql_qv)
{
global $host;
include("../includes/smalhead.inc");
if ($mysql_qv==1)
{
echo "
<table align=center width=50% border=1>
<tr>
<td class=header>
Запись...
</td>
</tr>
<tr>
<td class=subheader>
Ваши данные успешно внесены в базу!
</td>
</tr>
</table>
"; 
}
else
{
echo "
<table width=100%>
<tr>
<td class=header>
Запись...
</td>
</tr>
<tr>
<td class=subheader>
<font color='red'>Ошибка записи. Закройте, пожалуйста, это окно и повторите ввод данных!</font>
</td>
</tr>
</table>
"; 
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////

function emptybase ()
{
echo "<table border=1 width='95%' bordercolor='navy' align=center><tr><td class=grey align=center>";
echo "<font color=red>ДАННЫЕ В БАЗЕ ОТСУТСТВУЮТ!</font><br>";
echo "</td></tr></table><br>";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////

function admin_delete_massage($mysql_qv)
{
global $host;
include("../includes/smalhead.inc");
if ($mysql_qv==1)
{
echo "
<table align=center width=100% border=1>
<tr>
<td class=header>
Удаление...
</td>
</tr>
<tr>
<td class=subheader>
запись успешно удалена!
</td>
</tr>
</table>
"; 
}
else
{
echo "
<table width=100%>
<tr>
<td class=header>
Запись...
</td>
</tr>
<tr>
<td class=subheader>
<font color='red'>Ошибка записи. Закройте, пожалуйста, это окно и перепроверьте вводимые данные!</font>
</td>
</tr>
</table>
"; 
}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////

function validEmail($email) {
if (eregi("^[a-z0-9]+([-_.]?[a-z0-9])+@[a-z0-9]+([-_.]?[a-z0-9])+.[a-z]{2,4}", $email)) {
   return TRUE;
} else {
       return FALSE;
  }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
function image_output($file_name, $in_dir, $out_dir, $out)
{
if ($out<>'file')
	{
	$thumb = imagecreatefromjpeg ($in_dir."/".$file_name);
	$output = imagejpeg ($thumb, '', '100');
	}
	else
	{
	$thumb_file=$file_name;
	$size=getimagesize ($in_dir."/".$file_name);
if ($size[0]>=$size[1])
{
$width=150;
$height=round($size[1]*$width/$size[0]);
}
else
{
$height=150;
$width=round ($size[0]*$height/$size[1]);
}
$thumb = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg ($in_dir."/".$file_name);
imagecopyresampled($thumb, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));
$output = imagejpeg ($thumb, $out_dir."/".$thumb_file,  '100');
}
return $output;
}
?>







