<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
//    $file = $_FILES['file'];
//
//    $fileName = $file['name'];
//    $fileSize = $file['size'];
//    $fileTmpName = $file['tmp_name'];
//    $fileType = $file['type'];
//
//    print_r($file);
    print_r($_SERVER['HTTP_REFERER']);
}

?>