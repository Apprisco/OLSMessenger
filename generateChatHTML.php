<?php
	include 'variables.php';
	if(!session_id())session_start();	
	$email = $_SESSION['email'];
	if(isset($_POST['userid'])){
		$data = array('key'=>$key,'email'=>$_SESSION['email'],'id'=>$_POST['userid']);
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);
		$message=$_POST['content'];
		$context  = stream_context_create($options);
		$resultv = file_get_contents($spark."/verifyID", false, $context);
		$chat="";
		$time=$_POST['time'];
		$time=date('m/d/Y',(int)$time/1000); 
if($resultv==$_SESSION['name'])
$chat="<div class='d-flex justify-content-end mb-4'><div class='message_sent'>".$message."<span class='time_date'>Me,".$time." </span></div><div class='profile_picture'><img src='https://cdn.discordapp.com/attachments/582274693097193472/778992941900627998/unknown.png'class='rounded-circle user_pfp'></div></div>";
else
$chat="<div class='d-flex justify-content-start mb-4'><div class='profile_picture'><img src='https://josephchen.tech/wp-content/uploads/2020/08/test1.jpg'class='rounded-circle user_pfp'></div><div class='message_received'>".$message."<span class='time_date'>".substr($resultv,0,strrpos($resultv,' ')).", ".$time."</span></div></div>";

}
echo $chat;
?>