<?php
    if(isset($_FILES['photo']['type']))
    {
        // Check whether the file exists
        if(file_exists("Public/img/data/".$_FILES['photo']['name']) && $_FILES["photo"]["name"]== "unknowm.jpg")
        {
            echo $_FILES['photo']['name']."<span id='invalid'><b> Already exists.</b></span>";

        }        
        else{ // Upload the file
            $valid_extensions = array("jpg","jpeg","png");
            $sourcePath = $_FILES['photo']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "Public/img/data/".$_FILES['photo']['name']; // Target path where file has to be stored
            $imageFileType = pathinfo($targetPath,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);

            if(in_array(strtolower($imageFileType),$valid_extensions))
            {
                move_uploaded_file($sourcePath, $targetPath); // Moving upload file to target folder
            }
            else
            {
            echo "<span id='invalid'><b> File type should be jpg, jpeg or png. </b></span>";
            }
        }
    } 
?>