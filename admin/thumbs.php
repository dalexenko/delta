<?
include('../includes/func.inc'); 
$handle=opendir('../products/uploads');
while (false !== ($file_name = readdir($handle))) 
{
if ($file_name != "index.html" && $file_name != "." && $file_name != "..")
{ 
echo $file_name."<br>";
image_output($file_name, '../products/uploads', '../products/', 'file');
//copy ("../products/uploads/".$file_name, "../products/".$file_name);
unlink ("../products/uploads/".$file_name);
}
}
closedir($handle); 
?>