<?php
function P($val) {
    if(is_string($val)) {
        var_dump($val);
    } elseif( is_array($val)) {
        echo '<pre>';
        print_r($val);
        echo '</pre>';
    } else {
        print_r($val);
    }
}
