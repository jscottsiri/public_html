<?php
$date =  date('Y/m/d', time());
echo "The value of \$date: ".$date."<br>";

$tar = "2017/05/24";
echo "The value of \$tar: ".$tar."<br>";

$year = array("2012", "396", "300","2000", "1100", "1089");
echo "The value of \$year: ";
print_r($year);

if (strcmp($date, $tar)>0){
	echo "<br>the future<br>";
}
elseif (strcmp($date, $tar)<0){
	echo "<br>the past<br>";
}
elseif (strcmp($date, $tar)==0){
	echo "<br>Oops<br>";
}
if (strpos($date,'/')!== false){
	echo "The positions are: ";
	for ($i=0; $i < strlen($date)-1; $i++) { 
		if (substr($date, $i, 1) == '/')
			echo "".$i." ";
	}
	echo "<br>The segments are: ";
	foreach (explode('/',$date) as $key) {
		echo $key." ";
		# code...
	};
	echo "<br>";
}
echo "There is/are this many words: ".(str_word_count($date)+1)."<br>";
echo 'The string $date is this many characters long: '.strlen($date)."<br>";
echo 'The ASCII value of the first character of $date is: '.ord($date)."<br>";
echo 'The last two characters of $date are: '.substr($date, -2)."<br>";

echo "The foreach method of leap year calculation: ";
foreach ($year as $key) {
	switch ($key) {
		case (($key%4==0)&&(($key%100!==0)||($key%400==0))):
			echo 'True ';
			break;
		
		default:
			echo'False ';
			break;
	}
	
}
echo '<br>The for method of leap year calculation: ';
for ($i=0; $i < sizeof($year); $i++) { 
	switch ($year[$i]) {
		case (($year[$i]%4==0)&&(($year[$i]%100!==0)||($year[$i]%400==0))):
			echo 'True ';
			break;
		
		default:
			echo'False ';
			break;
}
}

?>