<?php

function removeVoWels($inputArray){
    $vowels = ['a','e','i','o','u'];
    $outputArray = [];
    foreach($inputArray as $input){
        if(!in_array($input, $vowels)){
            array_push($outputArray, $input);
        }
    }
    var_dump($outputArray);
}

removeVoWels(['a', 'p', 'p', 'l', 'e']);
removeVoWels(['a', 'p', 'p', 'l', 'e', 'u']);
removeVoWels([]);
removeVoWels(['d']);

?>