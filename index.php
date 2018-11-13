<html>
<head>
<title>Hello World</title>
</head>
<body style="text align: center; font-size: 50px;">
<?php
if(!isset($_GET['op']) || !isset($_GET['x']) || !isset($_GET['y'])){
	echo "<h1>Error! Incomplete data</h1>";
	exit();
}
$x=$_GET['x'];
$y=$_GET['y'];
/*
function sum($x, $y) {
	return $x + $y;
}	
function substract($x, $y) {
	return $x - $y;
}

function  multiply ($x, $y) {
	return $x * $y;
}

function divide ($x, $y) {
	if($y==0){
	echo "error, dividor can't be 0";
	}
	else {
		return $x / $y;
	}
}*/
switch ($_GET['op']) {
	case 'sum':
		$result=$x+$y;
		echo "<h1>$x + $y = $result</h1>";
	break;

	case 'subtract':
		$result=$x-$y;
		echo "<h1>$x - $y = $result </h1>";
	break;

	case 'divide':
		if($y==0){
			echo "error, dividor can't be 0";
		}
		else {
			$result=$x/$y;
			echo "<h1>$x / $y = $result</h1>";
		}
	break;

	case 'multiply':
		$result=$x*$y;
		echo "<h1>$x x $y = $result </h1>";
		break;

	default:
		$op=$_GET['op'];
		echo "<h1>Unrecognized operation: $op</h1>";
}


?>
</body>
</html>
