<?
include('../includes/func.inc');
$query="SELECT * FROM sitenews ORDER BY `news_id` DESC"; 
$mysql_qv = mysql_query ($query, $conn) or die("Invalid query"); 
$num_rows = mysql_num_rows($mysql_qv);
if ($num_rows>0)
{
while ($row = mysql_fetch_array($mysql_qv))
{
$newsdateyear=substr($row[0], 0, 4);
$newsdatemonth=substr($row[0], 4, 2);
$newsdateday=substr($row[0], 6);
$newsdate=$newsdateday.".".$newsdatemonth.".".$newsdateyear;
echo "<table border=1 width='99%' align=center  bordercolor='navy'><tr>";
echo "<td align=right class=subheader bgcolor='#CCFFCC'>".$newsdate."</td>";
echo "</tr><tr>";
echo "<td colspan=2 class=regular>".$row[1]."<br>";
echo "<tr><td>";
$winstat='width=750 height=500 toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1';
	$kav="'";
	$i=1;
	$about="newsdel.php?n=".$row[2];
	echo'<a href='.$kav.$about.$kav.' target="1" onclick="window.open('.$kav.$about.$kav.', '.$kav.$i.$kav.', '.$kav.$winstat.$kav.');">удалить новость</a>';
echo "</td></tr></table><br>";

}
}
else
{
emptybase ();
}
?>