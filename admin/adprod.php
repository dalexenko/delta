<?
include('../includes/func.inc');

?>
<form target="_blank" action="addprod.php" enctype="multipart/form-data">
<p>Выберите продкатегорию:
<select size="1" name="subcatid">
<?
$query="SELECT * FROM subcategories";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result))
{
echo "<option value=".$row[0].">".$row[1]."</option>";
}
?>
</select>
<p>Наименование продукта:
<input name="prodname" type="text" value="" style="border: 1px solid;">
<p>Описание:
<textarea name="proddescription" rows="10" cols="50" wrap="off" style="border: 1px solid;"></textarea>
<p>
<input type='hidden' name='MAX_FILE_SIZE' value='50000'>
<br>
Выберите фотографию продукта: <input name='userfile' type='file' value='обзор'>
<br>
<input type="submit" style="border: 2px solid;">
</form>