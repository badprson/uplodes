<?php  
	/** @var 切片上传 [description] */


	$arr= $_FILES;
	// var_dump($arr);die;
	$info=$_REQUEST;
	// var_dump($info);die;
	$ext=explode(".",$info['filename'])[1];
	$fileName=$info['filename'];
	// var_dump($fileName);die;


	$baseDir="./".date("Y-m-d/",time());
	if(!is_dir($baseDir)){
		mkdir($baseDir,0,777);
	}
	$filePath = $baseDir.$fileName;


	$tmpName = $arr['data']['tmp_name'];
	$content = file_get_contents($tmpName);
	file_put_contents($filePath,$content,FILE_APPEND);


	$filePath = ltrim($filePath,".");
	$filePath1 = "/slice".$filePath;
	// var_dump($filePath);die;
	$arrReturn = array(
				"error" => 0,
				"data" => array(
					'path' => $filePath1,
				),
	);
	echo json_encode($arrReturn);