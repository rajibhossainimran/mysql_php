<?php

function factorial($num) {
    if ($num < 0) {
        return "Factorial of a negative number is not defined.";
    } elseif ($num == 0 || $num == 1) {
        return 1; 
    } else {
        return $num * factorial($num - 1); 
    }
}

if (isset($_POST["btnSubmit"])) {
    $number = $_POST["number"];

    if (is_numeric($number)) {
        $result = factorial($number);
    } else {
        $result = "Please enter a valid non-negative number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial Calculator</title>
</head>
<body>

    <h2>Factorial Calculator</h2>
    <form action="" method="post">
        <label>Enter a Number:</label>
        <input type="number" name="number" min="0" required>
        <input type="submit" name="btnSubmit" value="Calculate Factorial">
    </form>

    <?php
    if (isset($result)) {
        echo "<p>Factorial: $result</p>";
    }
    ?>

</body>
</html>
