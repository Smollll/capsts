<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Videos</title>
    <style>
        .video-container {
           display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            justify-content: center; /* Center align thumbnails */
            margin-left: 10%;
            margin-right: 10%;
        }
        .video-item {
            margin: 10px;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-color: grey; /* Set background color to grey */
            color: #1b1c1e; /* Set text color to black */
            padding: 5px; /* Add padding */
            max-width: 300px; /* Set maximum width */
            width: auto; /* Allow the item to expand to fit content */
            background-color: whitesmoke;
            
        }
        .video-item img {
            width: 240px; /* Set thumbnail width */
            height: auto;
            cursor: pointer;
            border-radius: 5px; /* Add border radius for rounded corners */
            transition: transform 0.3s ease; /* Add smooth transition */
            display: block;
            margin: 0 auto; /* Center the thumbnail */
            
        }
        .video-item img:hover {
            transform: scale(1.05); /* Increase size on hover */
        }
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.3s ease;
            opacity: 0;
        }
        .video-item:hover .video-overlay {
            opacity: 1;
        }
        .video-overlay i {
            color: #fff;
            font-size: 4rem;
        }
        #videoPlayerContainer {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            z-index: 9999;
        }
        #videoPlayer {
            width: 640px; /* Set video player width */
            height: auto;
            display: block;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #fff;
            cursor: pointer;
            z-index: 9999;
        }
        .video-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .video-list-item {
            margin: 10px;
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .video-list-item img {
            width: 240px; /* Set thumbnail width */
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s ease;
            display: block;
            margin: 0 auto; /* Center the thumbnail */
        }
        .video-list-item img:hover {
            transform: scale(1.05);
        } #videoPlayer {
        width: 640px;
        height: 360px;
    }@media screen and (max-width: 768px) {
        #videoPlayer {
            width: 340px;
            height: 340px;
        }   
    }
    </style>
</head>
<body>
    <!-- Video Player Container -->
    <div id="videoPlayerContainer">
        <video id="videoPlayer" controls>
            <source id="videoSource" src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <button class="close-button" onclick="closeVideo()">Close</button>
    </div>
 
    <!-- Other Videos List -->

    <div class="video-container">
    <?php
function displayOtherVideos() {
    $videoDir = "uploads/";
    $thumbnailDir = "thumbnails/";
    $videos = glob($videoDir . "*.{mp4,avi,mov,wmv,webm}", GLOB_BRACE);

    foreach ($videos as $video) {
        // Get video filename without extension
        $videoName = pathinfo($video, PATHINFO_FILENAME);
        
        // Remove file extension and any characters after a dot
        $videoTitle = preg_replace('/\.[^.]+$/', '', $videoName);
        
        $thumbnail = $thumbnailDir . $videoName . ".jpg";
        if (!file_exists($thumbnail)) {
            // Command to generate thumbnail (requires ffmpeg installed)
            $cmd = "ffmpeg -i " . escapeshellarg($video) . " -ss 00:00:01 -vframes 1 " . escapeshellarg($thumbnail);
            // Execute command
            shell_exec($cmd);
        }

        // Display the video title
        echo "<div class='video-item'>";
        echo "<div class='video-overlay' onclick='playVideo(\"$video\")'><i class='fas fa-play'></i></div>";
         echo "<img src='$thumbnail' alt='Thumbnail'>";
        echo "<p>$videoTitle</p>";
        echo "</div>";
    }
}
displayOtherVideos();
?>



    </div>
 
    <script>
        // Function to play video
        function playVideo(videoUrl) {
            var videoPlayerContainer = document.getElementById("videoPlayerContainer");
            var videoPlayer = document.getElementById("videoPlayer");
            var videoSource = document.getElementById("videoSource");
            videoSource.src = videoUrl;
            videoPlayer.load();
            videoPlayerContainer.style.display = "block";
            videoPlayer.play();
        }
 
        // Function to close video
        function closeVideo() {
            var videoPlayerContainer = document.getElementById("videoPlayerContainer");
            var videoPlayer = document.getElementById("videoPlayer");
            videoPlayerContainer.style.display = "none";
            videoPlayer.pause();
        }
    </script>
</body>
</html>
 
 
