<?php 

if (isset($_POST['data'])) {

    $numeros =  json_decode(stripslashes($_POST['data']));

    
    foreach($numeros as $d){
        echo $d;
     }
}
