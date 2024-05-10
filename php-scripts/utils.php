<?php

function isEmpty($string) {

    $string = trim($string);
    
    return isset($string) === true && $string === '';
}