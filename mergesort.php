<?php


function merge_sort($arr) {
    
    if (count($arr) <= 1) {
        return $arr;
    }

    
    $mid = floor(count($arr) / 2);
    $left_half = merge_sort(array_slice($arr, 0, $mid));
    $right_half = merge_sort(array_slice($arr, $mid));

    
    return merge($left_half, $right_half);
}


function merge($left, $right) {
    $sorted_list = [];
    $i = $j = 0;

    
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $sorted_list[] = $left[$i];
            $i++;
        } else {
            $sorted_list[] = $right[$j];
            $j++;
        }
    }

    
    while ($i < count($left)) {
        $sorted_list[] = $left[$i];
        $i++;
    }

    while ($j < count($right)) {
        $sorted_list[] = $right[$j];
        $j++;
    }

    return $sorted_list;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = json_decode(file_get_contents('php://input'), true);

    $inputArray = isset($data['initial_array']) ? $data['array'] : null;

    if (!is_array($inputArray)) {
       
        echo json_encode(['error' => 'Input should be a valid array.']);
        exit;
    }


    $sortedArray = merge_sort($inputArray);


    echo json_encode([
        'original_array' => $inputArray,
        'sorted_array' => $sortedArray
    ]);
} else {
    
    echo json_encode(['error' => 'Invalid request']);
    exit;
}
?>