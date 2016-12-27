<?
include('../includes/func.inc');
?>
<form target="_blank" action="addsubcat.php" method="post">
<p>Выберите категорию:
<select size="1" name="catid">
<?
$query="SELECT id, caption FROM menu where parent_id=3";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result))
{
echo "<option value=".$row[0].">".$row[1]."</option>";
}
?>
</select>
<p>Наименование подкатегории:
<input name="subcatname" type="text" value="" style="border: 1px solid;">
<br>
<input type="submit" style="border: 2px solid;">
</form>