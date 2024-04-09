<?php
session_start();

// Check if session variables are set
if (isset($_SESSION["title"]) && isset($_SESSION["category"]) && isset($_SESSION["difficulty"]) && isset($_SESSION["price"]) && isset($_SESSION["description"])) {
    // Access session variables
    $title = $_SESSION["title"];
    $category = $_SESSION["category"];
    $difficulty = $_SESSION["difficulty"];
    $price = $_SESSION["price"];
    $description = $_SESSION["description"];

    // Now you can display these variables wherever you want on the page
    echo "<h2>Form Data</h2>";
    echo "<p><strong>Title:</strong> $title</p>";
    echo "<p><strong>Category:</strong> $category</p>";
    echo "<p><strong>Difficulty:</strong> $difficulty</p>";
    echo "<p><strong>Price:</strong> $price</p>";
    echo "<p><strong>Description:</strong> $description</p>";
} else {
    // Session variables are not set, handle the case accordingly
    echo "Session data is not available.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
</head>
<body>
    <?php
    // Display form data
    include("view.php");
    ?>

    <!-- Add a button to go back to the form page -->
    <a href="gab.php">Go Back to Form</a>
</body>
</html>

</body>
</html>