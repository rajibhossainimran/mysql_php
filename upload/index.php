<?php  

if(isset($_POST['btnSubmit'])){ 

    $filename = $_FILES['my_file']['name'];
    $temp_file = $_FILES['my_file']['tmp_name'];
    $file_size = $_FILES['my_file']['size'];
    $target_dir = "image/";
    
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    $new_filename = uniqid() . "." . $file_extension;
    $kb = $file_size / 1024;
    
    if ($kb > 400) {
        echo "File is too large. Maximum size is 400KB.";
    } else {
        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($temp_file, $target_dir . $new_filename)) {
                echo "File uploaded successfully!";
                $uploaded_image = $target_dir . $new_filename; 
            } else {
                echo "Error uploading file!";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h2>Upload Image</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="my_file" required>
        <input type="submit" name="btnSubmit" value="Upload">
    </form>
    
    <?php
    // If the file was uploaded successfully, show the image
    if (isset($uploaded_image)) {
        echo "<h3>Uploaded Image:</h3>";
        echo "<img src='$uploaded_image' width='300px' alt='Uploaded Image'>";
    }
    ?>
</body>
</html>
