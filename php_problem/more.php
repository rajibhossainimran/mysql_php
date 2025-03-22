<?php

// Create a function to find the second-largest element in an array of integers.

function findSecondLargest(array $numbers): int {
    rsort($numbers);
    return $numbers[1];
}


?>