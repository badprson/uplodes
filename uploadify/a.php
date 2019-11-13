<?php

    $arrinfo = $_FILES['Filedata'];
    // print_r($arrinfo);
    $fileName = $arrinfo['name'];
    $tmpName = $arrinfo['tmp_name'];
    $ext = explode(".",$fileName)[1];
    // print_r($ext);
    $baseName = md5(uniqid()).".$ext";
    $baseDir = Date('Y/m/d/',time());
    if(!is_dir($baseDir)){
        mkdir($baseDir,0,777);
    }
    $filepath = $baseDir.$baseName;
    move_uploaded_file($tmpName,$filepath);
