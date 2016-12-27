<?
include('includes/func.inc');
include('includes/smalhead.inc');
echo "
<table width=100% align=center>
<tr>
<td class=subheader>
";
echo $fio."!<br>";

$mail="info@delta.in.ua";
$subject = 'Заказ прайса';
$message = "ФИО: ".$fio."\nКомпания: ".$Company."\nГород: ".$city."\nE-mail: ".$FROM."\nКонтактный телефон: ".$Phone."\nКатегория: ".$WhereHeard."\nКомментарии: ".$Comments;

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=windows-1251\r\n";
$headers .= "From: info@delta.in.ua\r\n";

$s = mail($mail, $subject, $message, $headers) or die("не смог разослать письмо!");

if ($s==1)
{
echo "Сообщение отправлено без ошибок!";
} else 
{
echo "Сообщение не было отправлено в связи с возникшей ошибкой! Попробуйте написать администратору по адресу <a href=mailto:info@delta.in.ua>info@delta.in.ua</a>"; 
}; 
echo "<center><button  onclick='window.close()'>закрыть окно</button></center>";
?>
</td>
</tr>
</table>
</body>
</html>


