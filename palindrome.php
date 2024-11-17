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




 
 $len = strlen($lowercaseInput);
 for ($i = 0; $i < $len / 2; $i++) {
     if ($lowercaseInput[$i] !== $lowercaseInput[$len - $i - 1]) {
         return false; 
     }
 }

 return true; 
}


$input = $_POST['string'] ?? '';

    
    if (empty($input)) {
        echo json_encode(['error' => 'Input string is required']);
        exit;
    }