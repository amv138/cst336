<?php

 if (!empty($_FILES)) {

    print_r($_FILES);
    
    if($_FILES['myFile']['size'] < 1048576){
    //You can not upload this file
   // echo "Image size: " . $_FILES['myFile']['size'];
    
    move_uploaded_file( $_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
    }

}


    function displayImagesUploaded() {

        $images = scandir("gallery"); //returns all file names within a folder
        
        //print_r($images);
        
        for ($i = 2; $i < count($images); $i++) {
            
            echo "<img src='gallery/$images[$i]' width='50' />";
            
        }//for
    
    }//function


?>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 9: File Upload </title>
          <!--Bootstrap files-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <!--Custom Styles-->
        <link href="style.css" rel="stylesheet" type="text/css" />
        <style>
            
            img { padding: 10px; }
            
            img:hover { width: 250px; }
            
        </style>
        <div id = "buddy">
            <img src="img/buddy_verified.png" alt="Buddy" class="active" id= "Buddy">
        </div>
    </head>
    <body>
        
        
        <form  method="POST" enctype="multipart/form-data">
        
            <input type="file" name="myFile" />
            <button> Upload File! </button>
            
        </form>

        <hr>
        <div id = "images">
            <h3> Images uploaded: </h3>
        
         <?= displayImagesUploaded() ?> 
        </div>
        
        
    </body>
</html>