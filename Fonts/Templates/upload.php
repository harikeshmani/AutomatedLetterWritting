<?php

if(!empty($_FILES['file']['name'])){
    $letter_id = $_POST['letter_id'];
    $uploadedFile = '';
    if(!empty($_FILES["file"]["type"])){
        $fileName = $letter_id.'_'.$_FILES['file']['name'];
    
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "../documents/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        
    }
    
    include_once '../config.php';
    
    $update = mysqli_query($link, "UPDATE tbl_all_letters SET attachments = '$fileName' WHERE id = '$letter_id'");
    echo $update?'ok':'err';
}