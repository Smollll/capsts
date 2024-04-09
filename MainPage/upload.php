<?php

if(isset($_POST["submit"])) {
    $targetDir = "uploads/";
    $thumbnailDir = "thumbnails/";
    $videoTitle = $_POST["title"]; // Get the title from the form and sanitize it
    // Sanitize the title to allow only alphanumeric characters, spaces, exclamation marks, question marks, commas, and periods
    $videoTitle = preg_replace("/[^a-zA-Z0-9\s!?.,]/", "", $videoTitle);
    $videoFile = $_FILES["video"];
    $videoName = basename($videoFile["name"]);
    $targetFile = $targetDir . $videoTitle . ".mp4"; // Rename the file with the provided title and change the extension to .mp4
    $thumbnailFile = $thumbnailDir . $videoTitle . ".jpg"; // Use the same title for the thumbnail

    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($videoName, PATHINFO_EXTENSION));


    // Check if file already exists
    // if (file_exists($targetFile)) {
    //     echo "Sorry, a file with the same title already exists.";
    //     $uploadOk = 0;
    // }

    // Check file size
    if ($videoFile["size"] > 50000000) { // 50 MB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = ["mp4", "avi", "mov", "wmv", "webm"];
    if(!in_array($videoFileType, $allowedFormats)) {
        echo "Sorry, only MP4, AVI, MOV, WMV, and WEBM files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        
        if (move_uploaded_file($videoFile["tmp_name"], $targetFile)) {
            echo "The file ". $videoTitle . " has been uploaded.";
            
       

        

            // Generate thumbnail using ffmpeg
            $ffmpegPath = "D:/Thumbnail/ffmpeg.exe"; // Specify the path to ffmpeg executable
            $cmd = "\"$ffmpegPath\" -i " . escapeshellarg($targetFile) . " -ss 00:00:01 -vframes 1 " . escapeshellarg($thumbnailFile);
            $compressedFile = $targetDir . $videoTitle . "_compressed.mp4"; // Compressed video file
            $output = null;
            $returnCode = null;
            exec($cmd, $output, $returnCode);

            if ($returnCode === 0) {
                echo "Thumbnail generated successfully.";
            } else {
                echo "Failed to generate thumbnail. Error code: $returnCode";
                // Log error information
                file_put_contents("thumbnail_generation_error.log", "Failed to generate thumbnail for file: $targetFile\n", FILE_APPEND);
            }
          
            header("Location: mainpage.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

