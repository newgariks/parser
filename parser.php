<?php
require('simplehtmldom.php');
define("DBENCODING", "utf8");

$mysqli = new mysqli("localhost", "phpmyadmin", "phpmyadmin", "parser");
$mysqli->query("SET NAMES 'utf8' ");
$mysqli->query("TRUNCATE TABLE ppr");

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



$table = array();

$html = file_get_html('/usr/local/src/parser/1580.html');
// Парсим таблицу
foreach($html->find('tr') as $row) {
    $id = $row->find('td',0)->plaintext;
    $adress = $row->find('td',1)->plaintext;
    $vikon = $row->find('td',2)->plaintext;
    $problema = $row->find('td',3)->plaintext;
    $dataP = $row->find('td',4)->plaintext;
    $dataK = $row->find('td',5)->plaintext;
    $dataF = $row->find('td',6)->plaintext;
    $stan = $row->find('td',7)->plaintext;
    $primitka = $row->find('td',8)->plaintext;
    $prz = $row->find('td',9)->plaintext;
    $url = $row->find('td',10)->plaintext;

      //текст в котором ищем улицу
			// Список улиц из БД с которыми сравниваем
		
		$sql = "SELECT stsid, sts_name, sts_stodevid FROM street_synonym";
		$result = $mysqli->query($sql);
		$i=0;
		if ($result->num_rows > 0) {
				// Масив
			while($row = $result->fetch_assoc()) {
					//echo $row['sts_name'];
					//Сравнение 
				preg_match("/$row[sts_name]/", $adress, $match);
					//var_dump($match);
					// Действие если улица есть в адресе
				if (!empty($match)) {
					$i=$i+1;//echo "sss";
				}
			//echo $i;
			}
		//echo $i;
		if ($i>=1){
				if (!$mysqli->query("INSERT INTO ppr(id,adress,vikon,problema,dataP,dataK,dataF,stan,primitka,prz,url) VALUES ('$id','$adress','$vikon','$problema','$dataP','$dataK','$dataF','$stan','$primitka','$prz','$url')")); 
		}
		} 

else {
    echo "0 results";
}





//if (!$mysqli->query("INSERT INTO ppr(id,adress,vikon,dataP,dataK,dataF,stan,primitka,prz,url) VALUES ('$id','$adress','$vikon','$dataP','$dataK','$dataF','$stan','$primitka','$prz','$url')")); 
//if (!$mysqli->query("INSERT INTO ppr(id,adress,vikon,dataP,dataK,dataF,stan,primitka,prz,url) VALUES ($id,'$adress',1,1,1,1,1,1,1,1)")) 



//echo $id;
//echo $adress;
//echo $vikon;
//echo $dataP;
//echo $dataK;
//echo $dataF;
//echo $stan;
//echo $primitka;
//echo $prz;
//echo $url;
//echo '<br>';

}


//echo '<pre>';
//print_r($table);
//echo '</pre>';

?>
