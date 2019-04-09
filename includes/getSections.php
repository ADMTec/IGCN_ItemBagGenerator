<pre><?php
include 'readItemList.php';
$itemList = new SimpleXMLElement($xmlstr);

$secciones = $itemList->Section;

foreach ($secciones as $key => $seccion) {
    $seccion_data = $seccion->attributes();
    foreach ($seccion->Item as $key => $item) {
        $item_data = $item->attributes();
        var_dump($item_data);
        echo $item_data['DropLevel']."<br>";
    }
}
