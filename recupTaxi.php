<?php

/*Connection BDD*/
$link = new MongoClient();                //connexion MongoDB
$db = $link->selectDB("bresil");          //connexion bdd
 
$coTaxi = $db->taxis;                     //choix collection



/*-- Affichage documents*/
$fruitQuery = array('track_id' => 2);        //condiction de recherche

$cursor = $coTaxi->find($fruitQuery);
$data_array = iterator_to_array($cursor,false);
//var_dump(iterator_to_array($cursor,false));
//$cursor = $coTaxi->find(taxi)->toArray();
//$taxiArray = iterator_to_array($cursor);
//foreach ($cursor as $doc) {
/*foreach ($cursor as $id => $doc) {
    echo ("$id: ------------------");       //recupére lid du 
   // var_dump($doc);
   
    echo('<br>');
}*/
/*$cursor = $db->executeQuery($coTaxi,$taxi1);
var_dump($cursor->toArray());*/

//echo json_encode($data_array);              //passage du tableau en json pour aller en js
$fp = fopen('tmp.json', 'w');
fwrite($fp, json_encode($data_array));
fclose($fp);
?>