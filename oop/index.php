<?php
// Include the class file
require_once("student_class.php");

// Check if the form is submitted
if (isset($_POST["btnSubmit"])) {

    // Get the form data
    $id = $_POST["txtId"];
    $name = $_POST["txtName"];
    $course = $_POST["txtCourse"];
    $phone = $_POST["txtPhone"];

    // Validate the phone number format using regex (Only numbers and + allowed)
    if (preg_match("/^[0-9+]{11,14}$/", $phone)) {

        // Create a new Student object and save the data
        $student = new Student($id, $name, $course, $phone);
        $student->save();
        echo "<p style='color:green;'>Success! Student has been added.</p>";
    } else {
        echo "<p style='color:red;'>Invalid Phone Number</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1,
        h3 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Student Registration Form</h1>

        <!-- Form to collect student data -->
        <form action="#" method="post">
            <div>
                <label for="txtId">ID:</label>
                <input type="text" name="txtId" id="txtId" required />
            </div>

            <div>
                <label for="txtName">Name:</label>
                <input type="text" name="txtName" id="txtName" required />
            </div>

            <div>
                <label for="txtCourse">Course:</label>
                <input type="text" name="txtCourse" id="txtCourse" required />
            </div>

            <div>
                <label for="txtPhone">Phone:</label>
                <input type="text" name="txtPhone" id="txtPhone" required />
            </div>

            <div>
                <input type="submit" name="btnSubmit" value="Submit" />
            </div>
        </form>

        <!-- Display success or error messages -->
        <?php if (isset($message)) { echo "<div class='message $message[type]'>$message[text]</div>"; } ?>

        <hr>

        <!-- Display list of students -->
        <?php
        Student::display_students();
        ?>

    </div>

</body>

</html>
