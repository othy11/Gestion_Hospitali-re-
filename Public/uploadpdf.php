<?php
    if(isset($_FILES['cv']['type']))
    {
        // Check whether the file exists
        if(file_exists("Public/doc/".$_FILES['cv']['name']))
        {
            echo $_FILES['cv']['name']."<span id='invalid'><b> Already exists.</b></span>";

        }        
        else{ // Upload the file
            $valid_extensions = array("pdf");
            $sourcePath = $_FILES['cv']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "Public/doc/".$_FILES['cv']['name']; // Target path where file has to be stored
            $imageFileType = pathinfo($targetPath,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);

            if(in_array(strtolower($imageFileType),$valid_extensions))
            {
                move_uploaded_file($sourcePath, $targetPath); // Moving upload file to target folder
            }
            else
            {
            echo "<span id='invalid'><b> File type should be in pdf only. </b></span>";
            }
        }
    } 
?>