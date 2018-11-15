<html>
<head>
<title>Friend's book</title>
<style>
header {
 background-color: #666;
 padding: 30px;
 text-align: center;
 font-size: 35px;
 color: white;
}
footer {
 background-color: #777;
 padding: 10px;
 text-align: center;
 color: white;
}
</style>
</head>
</html>
<body>
<header>
	<h2>
		Friend Book
	</h2>

</header>
<br>
<form action="index.php" method="post">
Name: <input type="text" name="name" />
<input type="submit" />
</form>
<?php
//writing
if (isset($_POST['name'])&& $_POST['name']!=NULL) {
 $name = $_POST['name'];
 $file=fopen("friendlist.txt","a");
 fwrite ($file,$name);
 fwrite ($file,"\n");
 fclose($file);
}
//reading
$file=fopen("friendlist.txt","r");
$i=0;
//with filter
if (isset($_POST['filtername'])&& $_POST['filtername']!= NULL){
	$filter=$_POST['filtername'];
	if (isset($_POST['startingWith'])){
		while (!feof($file)){
			$friend=fgets($file);
			$pos=strpos ($friend,$filter);
			if ($pos === 0){
					echo "<ul><li>$friend </li></ul>";
					$i++;	
				}
		}	
	}
	else{
		while (!feof($file)){
			$friend=fgets($file);
			if (strstr ($friend,$filter))  echo "<ul><li>$friend  </li></ul>";
			$i++;
		}
	}
}
//no filter
else{
	while (!feof($file)){
		$friend=fgets($file);
		if ($friend) echo "<ul><li>$friend  n</li></ul>";
		$i++;
	}
}

fclose($file);

?>
<br><br>
<form action="index.php" method="post">
<input type="text" name="filtername" />
<input type="submit" value="Filter list"/>
<input type="checkbox" name="startingWith" <?php if ($startingWith=='TRUE') echo "checked"?> value="TRUE">Only names starting with</input>
</form>
</body>