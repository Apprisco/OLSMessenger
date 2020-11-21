<?php
	include 'variables.php';
	if(!session_id())session_start();	
	$email = $_SESSION['email'];
	if(isset($_POST['userid'])){
	    $aid=$_POST['userid'];
	    $atime=$_POST['time'];
	    $acontent=$_POST['content'];
		$chat="";
	    for($x=0;$x<count($aid);$x++)
	    {
	        $idx=$aid[$x];
	        $timex=(float)$atime[$x];
		    $timex=date('M d, Y h:i:s',$timex/1000);
	        $contentx=$acontent[$x];
    		$data = array('key'=>$key,'email'=>$email,'id'=>$idx);
    		$options = array(
    			'http' => array(
    				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    				'method'  => 'POST',
    				'content' => http_build_query($data)
    			)
    		);
    		$context  = stream_context_create($options);
    		$resultv = file_get_contents($spark."/verifyID", false, $context);
            if($resultv==$_SESSION['name'])
		    $chat=$chat."<div class='d-flex justify-content-end mb-4'><div><div class='message_sent'>".$contentx."</div><div class='time_date'>Me, "."  ".$timex." </div></div><div class='profile_picture'><img src='https://cdn.discordapp.com/attachments/582274693097193472/778992941900627998/unknown.png'class='rounded-circle user_pfp'></div></div>";
		    else
		        $chat=$chat."<div class='d-flex justify-content-start mb-4'><div class='profile_picture'><img src='https://josephchen.tech/wp-content/uploads/2020/08/test1.jpg'class='rounded-circle user_pfp'></div><div class='hid'><div class='message_received'>".$contentx."</div><div class='time_date'>".substr($resultv,0,strrpos($resultv,' ')).", ".$timex."</div></div></div>";
	    }
}
echo $chat;
?>
