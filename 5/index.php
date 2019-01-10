<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<style> 
		table{
			border-color:#2d2359;
			border-collapse: collapse;
			background:#e2f442;
			} 
		table,tr,td{ 
			border: 1px solid black;
		} 
		td{
			width:80px;height:30px;
			font-family:Arial;
			font-size:10pt;
			}
		form{
				
				margin-left:450px;
				margin-right:450px;
				font-size:14pt;
				font-family:Arial;
			}
			form fieldset{
				background:#e2f442;
			}
		body{
				text-align:center;
			}
		</style>
	</head>
	<body>
	
	<?php
		$rows = array(9,9,9,9);
		$cols = array(9,9,9,9);
		if (isset($_POST["submit"])){
			$rows[0] = $_POST["rows1"];
			$rows[1] = $_POST["rows2"];
			$rows[2] = $_POST["rows3"];
			$rows[3] = $_POST["rows4"];
			
			$cols[0] = $_POST["cols1"];
			$cols[1] = $_POST["cols2"];
			$cols[2] = $_POST["cols3"];
			$cols[3] = $_POST["cols4"];
		}
		echo "<form action=\"index.php\" method=\"post\" enctype=\"multipart/form-data\">
				<fieldset><legend>Table №1</legend>
				<label>Rows: <input type=\"number\" name=\"rows1\" value=\"". $rows[0] ."\"></label><br>
				<label>Cols: <input type=\"number\" name=\"cols1\" value=\"". $cols[0] ."\"></label>
				</fieldset>
				<fieldset><legend>Table №2 </legend>
				<label>Rows: <input type=\"number\" name=\"rows2\" value=\"". $rows[1] ."\"></label><br>
				<label>Cols: <input type=\"number\" name=\"cols2\" value=\"". $cols[1] ."\"></label>
				</fieldset>
				<fieldset><legend>Table №3 </legend>
				<label>Rows: <input type=\"number\" name=\"rows3\" value=\"". $rows[2] ."\"></label><br>
				<label>Cols: <input type=\"number\" name=\"cols3\" value=\"". $cols[2] ."\"></label>
				</fieldset>
				<fieldset><legend>Table №4 </legend>
				<label>Rows: <input type=\"number\" name=\"rows4\" value=\"". $rows[3] ."\"></label><br>
				<label>Cols: <input type=\"number\" name=\"cols4\" value=\"". $cols[3] ."\"></label>
				</fieldset>
				<input type=\"submit\" value=\"create\" name=\"submit\">
		</form>
		<hr/>";
	?>
	
	<?php
		if (!empty($_POST["rows1"])||!empty($_POST["cols1"])){
			/*echo " <br><br> ";
			var_dump($_POST["rows1"]);
			echo " <br><br> ";*/
			$con = mysql_connect('localhost','root','');
			
			if (!$con) {
				die('Ошибка соединения: ' . mysql_error());
			}
			
			if (!mysql_select_db('llr4')) {
				die('Не удалось соединиться : ' . mysql_error());
			}
			
			$rows = $_POST["rows1"];
			$cols = $_POST["cols1"];
			
			if(($rows != $cols)||($rows<3)||($cols<3)){
				$sql = 'insert into lr4_incorrect(count_row,count_col) values('. $rows .','. $cols .')';
				echo '<b>Для видимого та коректного відображення візерунку rows >= 3, cols >= 3, rows = cols</b><br>';
			} else{
				$sql = 'insert into lr4_correct(count_row,count_col) values('. $rows .','. $cols .')';
			}
			/*перша таблиця*/
			if(mysql_query($sql) == TRUE){
					
				} else {
					echo "<br>Error: " . $sql . "<br>" . mysql_error() ."<br>";
				}
			mysql_close($con);
			
			if($rows < 3)
				$rows = 3;
			if($cols < 3)
				$cols = 3;
			if($cols > $rows){
				$cols = $rows;
			} else{
				$rows = $cols;
			}
			
			$span = $rows;
			echo 'Тable 1';
			echo '<table align=center>';
			echo '<tr><td colspan = '. $span .'><p>текст у клітинці</p></td></tr>';
			for ($tr=1; $tr<$rows; $tr++){
				$span--;
				echo '<tr>';
				if($tr!=2){
					echo '<td rowspan = '. $span .'><p>текст у клітинці</p></td>';
				} else{
					echo '<td rowspan = '. $span .'>Четверта клітинка</td>';
				}
				echo '<td colspan = '. $span .'></td>';
				echo '</tr>';
			}
			echo '</table>';
			echo '<br>';
		} else { echo '<br>';echo'emty value'; echo '<br>';}
	?>
	<?php
		if (!empty($_POST["rows2"])||!empty($_POST["cols2"])){
			$con = mysql_connect('localhost','root','');
			
			if (!$con) {
				die('Ошибка соединения: ' . mysql_error());
			}
			
			if (!mysql_select_db('llr4')) {
				die('Не удалось соединиться : ' . mysql_error());
			}
			
			$rows = $_POST["rows2"];
			$cols = $_POST["cols2"];
			
			if(($rows < 5)||($cols < 5)||abs($rows-$cols)!=1){
				$sql = 'insert into lr4_incorrect(count_row,count_col) values('. $rows .','. $cols .')';
				echo '<b>Для видимого та коректного відображення візерунку rows >= 5, cols >= 5, |rows - cols| = 1</b><br>';
			} else{
				$sql = 'insert into lr4_correct(count_row,count_col) values('. $rows .','. $cols .')';
			}
			/*друга таблиця*/
			if(mysql_query($sql) == TRUE){
					
				} else {
					echo "<br>Error: " . $sql . "<br>" . mysql_error() ."<br>";
				}
			mysql_close($con);
			
			if($rows < 5)
				$rows = 5;
			if($cols < 5)
				$cols = 5;
			if(abs($rows-$cols)!=1)
			{
				if($rows>$cols)
				{
					$rows = $cols+1;
				} else{
					$cols = $rows+1;
				}
			}
			
			echo 'Тable 2';
			echo '<table align=center>';
			$rowspan = $rows + 1;
			$colspan = $cols + 1;
			for ($tr=1; $tr<=$rows; $tr++){
				echo '<tr>';
				$rowspan--;
				if(($tr != $rows-3)&&($tr != $rows)){	
					$colspan--;
					echo '<td rowspan = '. $rowspan .'></td>';
					if($tr != 2){
						echo '<td colspan = '. $colspan .'></td>';
					} else{
						echo '<td colspan = '. $colspan .'>Четверта клітинка</td>';
					}
				} else{
					if($tr != 3){
						echo '<td colspan = '. $colspan .'></td>';
					} else{
						echo '<td colspan = '. $colspan .'>Четверта клітинка</td>';
					}
				}
				echo '</tr>';
			}
			echo '</table>';
			echo '<br>';
		}
		else { echo '<br>';echo'emty value'; echo '<br>';}
	?>
	<?php
		if (!empty($_POST["rows3"])||!empty($_POST["cols3"])){
			$con = mysql_connect('localhost','root','');
			
			if (!$con) {
				die('Ошибка соединения: ' . mysql_error());
			}
			
			if (!mysql_select_db('llr4')) {
				die('Не удалось соединиться : ' . mysql_error());
			}
			
			$rows = $_POST["rows3"];
			$cols = $_POST["cols3"];
			
			if(($rows <4)||($cols <4)){
				$sql = 'insert into lr4_incorrect(count_row,count_col) values('. $rows .','. $cols .')';
				echo '<b>Для видимого та коректного відображення візерунку rows >= 4, cols >= 4</b><br>';
			} else{
				$sql = 'insert into lr4_correct(count_row,count_col) values('. $rows .','. $cols .')';
			}
			/*третя таблиця*/
			if(mysql_query($sql) == TRUE){
					
				} else {
					echo "<br>Error: " . $sql . "<br>" . mysql_error() ."<br>";
				}
			mysql_close($con);
			
			if($rows < 4)
				$rows = 4;
			if($cols < 4)
				$cols = 4;
			$span = 2;
			$first = true;
			$no = 1;
			
			echo 'Тable 3';
			echo '<table align=center>';

			for ($tr=1; $tr<=$rows; $tr++){
				echo '<tr>';
				$cl = 0;
				if(!$first){
					echo '<td colspan = '. ($span/2) .'></td>';
					$no++;
					$cl++;
				}
				for ($td=$cl; $td<$cols; $td=$td+2){
					$sp = $span;
					if($td > $cols-2){
						$sp = $span/2;
					}
					if($no != 4){
						echo '<td colspan = '. $sp .'></td>';
						$no++;
					} else{
						echo '<td colspan = '. $sp .'>Четверта клітинка</td>';
						$no++;
					}
				}

				$first=!$first;
				echo '</tr>';
			}

			echo '</table>';
			echo '<br>';
		}
		else { echo '<br>';echo'emty value'; echo '<br>';}
	?>
	<?php
		if (!empty($_POST["rows4"])||!empty($_POST["cols4"])){ 
		$con = mysql_connect('localhost','root','');
			
			if (!$con) {
				die('Ошибка соединения: ' . mysql_error());
			}
			
			if (!mysql_select_db('llr4')) {
				die('Не удалось соединиться : ' . mysql_error());
			}
			
			$rows = $_POST["rows4"];
			$cols = $_POST["cols4"];
			
			if(($rows<5)||($cols<5)){
				$sql = 'insert into lr4_incorrect(count_row,count_col) values('. $rows .','. $cols .')';
				echo '<b>Для видимого та коректного відображення візерунку rows >= 5, cols >= 5</b><br>';
			} else{
				$sql = 'insert into lr4_correct(count_row,count_col) values('. $rows .','. $cols .')';
			}
			/*четверта таблиця*/
			if(mysql_query($sql) == TRUE){
					
				} else {
					echo "<br>Error: " . $sql . "<br>" . mysql_error() ."<br>";
				}
			mysql_close($con);
			
			if($rows < 5)
				$rows = 5;
			if($cols < 5)
				$cols = 5;
			$span = 3;
			$ost = $cols % $span;
			$add = ($cols - $ost)/3;
			$fst = $add;
			$scnd = $add;
			$thrd = $add;
			if($ost == 0){
				$scnd = $fst;
				$thrd = $fst;
			} elseif($ost == 2){
				$fst++;
				$scnd = $fst;
			} else{
				$fst++;
			}
			
			echo 'Тable 4';
			echo '<table align=center>';
			
			echo '<tr>';
			$cl = $cols + 3;
			for ($td=3; $td<$cl; $td++){
				$sp = $td % $span;
				if($sp == 0){
					$sp = $span;
				}
				if($td != 6){
					echo '<td rowspan = '. $sp .'></td>';
				} else{
					echo '<td rowspan = '. $sp .'>Четверта клітинка</td>';
				}
			}
			echo '</tr>';
			
			for ($tr=2; $tr<=$rows-($span-1); $tr++){
				echo '<tr>';
				$no = 0;
				if($tr % $span == 2){
					$no = $scnd;
				} elseif($tr % $span == 1){
					$no = $fst;
				} else{
					$no = $thrd;
				}
				for($i=1;$i<=$no;$i++){
					echo '<td rowspan = '. $span .'></td>';
				}
				echo '</tr>';
			}
			
			echo '<tr>';
			if($rows % $span == 2){
				$cl = $fst;
			} elseif(($rows-1) % $span == 2){
				$cl = $scnd;
			} else{
				$cl = $thrd;
			}
			for($i=1;$i<=$cl;$i++){
					echo '<td rowspan = '. ($span-1) .'></td>';
				}
			echo '</tr>';
			
			echo '<tr>';
			if($rows % $span == 1){
				$cl = $fst;
			} elseif(($rows-1) % $span == 1){
				$cl = $scnd;
			} else{
				$cl = $thrd;
			}
			for($i=1;$i<=$cl;$i++){
					echo '<td rowspan = '. ($span-2) .'></td>';
				}
			echo '</tr>';
			echo '</table>';
			echo '<br>';
		}
		else { echo '<br>';echo'emty value';echo '<br>'; }
	?>
	</body>
</html>