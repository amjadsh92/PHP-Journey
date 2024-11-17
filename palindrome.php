<?php

function ispalindrome($input) {
   
    $lowercaseInput = '';
    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i];
        if ($char >= 'A' && $char <= 'Z') {
            $lowercaseInput .= chr(ord($char) + 32); 
        } else {
            $lowercaseInput .= $char;
        }
    }

}