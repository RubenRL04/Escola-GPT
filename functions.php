<?php 

// 
function dd($value) {
    echo "<pre>";
    var_dump($value, true);
    echo "</pre>";

    die();
}

?>