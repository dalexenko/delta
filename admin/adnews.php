<form  method="post" target="_blank" action='addnews.php'>
<table width="99%" cellpadding="5" cellspacing="0" border="1" class="regular" bgcolor="#FFCC99">
</tr>
<tr>
<td><b>Тема новости:</b><br>
<select name="newstheme">
<option selected>выставки</option>
<option>семинары</option>
<option>вакансии</option>
</select>
</td>
<td>
<td><b>Дата новости:</b><br>
использовать текущую дату:<select name="today">
<option selected>ДА</option>
<option>НЕТ</option>
</select>
</td>
<td>
год:<select name="newsyear">
<option selected>2003</option>
<option>2004</option>
<option>2005</option>
<option>2006</option>
<option>2007</option>
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
<option>2021</option>
<option>2022</option>
<option>2023</option>
<option>2024</option>
<option>2025</option>
</select>
месяц:<select name="newsmnth">
<option selected>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>
день:<select name="newsday">
<option selected>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
</td>
</tr>
<tr>
<td valign="top" colspan="3"><font size="2" face="Tahoma" color="red">*</font>
Введите текст новости:<br>
<textarea name="newstext" cols="60" rows="5" style="border: 1px solid;">введите данные</textarea>
</td>
</tr>
<tr>
<td>
<div align="center">
<input name="submit" type="submit" value="Добавить новость" style="border: 2px solid; background-color: #99CCFF;">
</div>
</td>
<td>
<div align="center">
<input name="reset" type="reset" value="Очистить" style="border: 2px solid; background-color: #99CCFF;">
</div>
</td>
</tr>
</table>
</form>