<pre><?php
include("bagPropiedad.php");
$path = "../itemBags";
$blacklist = array('somedir','somefile.php');
$items = new SimpleXMLElement(file_get_contents("../ItemList.xml"));

foreach (new DirectoryIterator($path) as $fileInfo) {
    if(!$fileInfo->isDot()){
	    $file =  $fileInfo->getFilename();
			$archivo = file_get_contents($path."/".$file);

			foreach ($itembag as $key => $value) {
				unlink("../salida/".$file);
				if($value['nombre'] == $file){

					var_dump($items);

					$xml = new SimpleXMLElement(file_get_contents("../itemBags/".$file));
					unset($xml->DropAllow->Drop);

					for ($i=0; $i < 2; $i++) {
						$drop = $xml->DropAllow->addChild('Drop');
						$drop->addAttribute('Rate', 0);
						$drop->addAttribute('Count', 0);
					}

					foreach ($xml->DropAllow->Drop as $key => $drop) {
						$item = $drop->addChild('Item');
						$item->addAttribute('Cat', 0);
						$item->addAttribute('Exe', 0);
						$item->addAttribute('Name', 0);
					}

					$xml->saveXML("../salida/".$file);

					$archivo = file_get_contents("../salida/".$file);
					$archivo = str_replace("\n<Drop ", "<Drop ", $archivo);
					$archivo = str_replace("\n<Drop ", "<Drop ", $archivo);
					$archivo = str_replace("<Item ", "\n\t\t<Item ", $archivo);
					$archivo = str_replace("</Drop>", "\n\t</Drop>
", $archivo);
					$archivo = str_replace("</DropAllow>", "</DropAllow>", $archivo);
					var_dump($archivo);
					$fp = fopen('../salida/'.$file, 'w');
					fwrite($fp, $total);
					var_dump($archivo);

				}
			}
			//
			// $bagContent = new SimpleXMLElement($archivo);
			// $BagConfig = $bagContent->BagConfig->attributes();
			// echo $BagConfig['Name']."<br>";
		}
}




?>
