<?php
	include 'variables.php';
	if(!session_id())session_start();	
	$email = $_SESSION['email'];
	if(isset($_POST['class'])){
	$data = array('key'=>$key,'email'=>$_SESSION['email'],'class'=>$_POST['class']);
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$resultv = file_get_contents($spark."/chatpull", false, $context);
}
else $resultv= "";
echo $resultv;
?>