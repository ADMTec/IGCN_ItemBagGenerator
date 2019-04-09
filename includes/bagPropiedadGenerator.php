<pre><?php

$path = "../itemBags";
$blacklist = array('somedir','somefile.php');

$i = 0;
echo '$itembag = array(
	';
foreach (new DirectoryIterator($path) as $fileInfo) {
    if(!$fileInfo->isDot()){;
		echo 'array(';
	    $file =  $fileInfo->getFilename();
			echo '
	\'nombre\' => "'.$file.'",
	\'probabilidad_exe\' => 80';
		echo "),
	";
		}
}
echo ');';
