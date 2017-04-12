<?php
/*
* @Resume: lecture du fichier txt et enregistrement sous format JSON
*/
        $monfichier = fopen('test1Taxi.txt', 'r');
        if (!$monfichier) {
            echo 'ERROR : non ouverture fichier';
        }else                                       //ouverture fichier = ok
        {
             $coords = array();     //Tableau coordonnées (2dimension)
             $lng = array();
             $lat = array();
            //Lecture ligne par ligne fichier
            while(($line = fgets($monfichier)) !== false)
            {
                $coo = explode(" ", $line);    //Recupere les infos entre les espaces
                array_push($lat,$coo[0]);
                array_push($lng,$coo[1]);
            }    
            /*$coords[0] = $lat;
            $coords[1] = $lng;*/ 
            $coords["lat"] = $lat;
            $coords["lng"] = $lng;
            //echo json_encode($coord);
            fclose($monfichier);
            
            $fp = fopen('employes.json', 'w');
            fwrite($fp, json_encode($coords));
            fclose($fp);
        }
        
        
?>
