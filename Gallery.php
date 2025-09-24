<?php
 /* Script name: displayGallery
 * Description: Displays all the image files that are
 * stored in a specified directory.
 */
 echo "<html><head><title>Image Gallery</title></head>
 <body>";

 $dir = "insert picture/local/";  // Ensure there's a trailing slash
 $dh = opendir($dir);

 if ($dh === false) {
     echo "Failed to open directory: $dir";
     exit();
 }

 $gallery = [];  // Initialize the array
 while (($filename = readdir($dh)) !== false) 
 {
     $filepath = $dir . $filename;
     if (is_file($filepath) && preg_match("/\.jpg$/i", $filename))  // Use preg_match and case-insensitive search
     {
         $gallery[] = $filepath;
     }
 }
 closedir($dh);

 if (empty($gallery)) {
     echo "No images found in the directory.";
 } else {
     sort($gallery);  // Sort the gallery array
     foreach ($gallery as $image) 
     {
         echo "<hr />";
         echo "<img src='$image' alt='Image' /><br />";
     }
 }

 echo "</body></html>";
?>
