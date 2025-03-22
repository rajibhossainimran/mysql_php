<?php

function fibonacci($n) {
    if ($n < 0) {
        return "Invalid input! Enter a non-negative number.";
    } elseif ($n == 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    } else {
        return fibonacci($n - 1) + fibonacci($n - 2); 
    }
}


if (isset($_POST["btnSubmit"])) {
    $number = $_POST["number"];

    if (is_numeric($number)) {
        echo "<h3>Fibonacci Series:</h3>";
        for ($i = 0; $i < $number; $i++) {
            echo fibonacci($i) . " ";
        }
    } else {
        echo "Please enter a valid non-negative number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Calculator</title>
</head>
<body>

    <h2>Fibonacci Calculator</h2>
    <form action="" method="post">
        <label>Enter a Number:</label>
        <input type="number" name="number" min="0" required>
        <input type="submit" name="btnSubmit" value="Generate Fibonacci">
    </form>

</body>
</html>
