<?php

use Illuminate\Validation\Rules\Exists;

    if(!function_exists('pre')){
        function pre($data){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }
    }
?>