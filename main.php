<!DOCTYPE HTML>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>PEA Messenger</title>
    <meta charset="UTF-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<?php 
include 'variables.php';
if (!session_id()) session_start();
if (!$_SESSION['login']){ 
    header("Location:index.php");
    die();
}
?>
<?php
  function logout() {
      session_destroy();
    header("Location:index.php");
    die();
  }

  if (isset($_GET['logout'])) {
    logout();
  }
?>
<?php
    include 'variables.php';
    $email = $_SESSION['email'];
    $email=trim($email);
    $data = array('key'=>$key,'email'=>$_SESSION['email']);
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($spark."/classes", false, $context);
    list($class1,$class2,$class3,$class4,$class5)=explode("!",$result);
    $class1s=$class1;
    $class2s=$class2;
    $class3s=$class3;
    $class4s=$class4;
    $class5s=$class5;
    $current=$class1;
    if(strlen($class1)>=30)$class1s=substr($class1,0,27);$class1s=$class1s."...";
    if(strlen($class2)>=30)$class2s=substr($class2,0,27);$class2s=$class2s."...";
    if(strlen($class3)>=30)$class3s=substr($class3,0,27);$class3s=$class3s."...";
    if(strlen($class4)>=30)$class4s=substr($class4,0,27);$class4s=$class4s."...";
    if(strlen($class5)>=30)$class5s=substr($class5,0,27);$class5s=$class5s."...";

?>
<script>
$( document ).ready(function() {
    $.post("/chathistory.php",{class:'<?php echo $class1;?>'});
})
</script>
<script>
$(document).on('click', "button.friend-drawer", function() {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    var k=id.charAt(1);
    if(k==1)$('p#dad').text("<?php echo $class1;?>");
    if(k==2)$('p#dad').text("<?php echo $class2;?>");
    if(k==3)$('p#dad').text("<?php echo $class3;?>");
    if(k==4)$('p#dad').text("<?php echo $class4;?>");
    if(k==5)$('p#dad').text("<?php echo $class5;?>");
    if(k==1)$.post("/chathistory.php",{class:'<?php echo $class1;?>'},function(data){alert(data);});
    if(k==2)$.post("/chathistory.php",{class:'<?php echo $class2;?>'},function(data){alert(data);});
    if(k==3)$.post("/chathistory.php",{class:'<?php echo $class3;?>'},function(data){alert(data);});
    if(k==4)$.post("/chathistory.php",{class:'<?php echo $class4;?>'},function(data){alert(data);});
    if(k==5)$.post("/chathistory.php",{class:'<?php echo $class5;?>'},function(data){alert(data);});   
});</script>
<body onload="myFunction(1)">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4">
                <div class="profile-bar" style="margin-top:20px;">
                    <img class="profile-picture"
                        src="https://cdn.discordapp.com/attachments/582274693097193472/778992941900627998/unknown.png"
                        alt="profile picture">
                    <b style="color:#808080">
                        <?php 
                        echo $_SESSION['name'];
                        ?>
                    </b>
                    <span class="profile-bar--right float-right">
                    <button class="btn btn-primary" style="background-color:#862727!important;"><a style="color:white;" href="/main.php?logout=true">Log out</a></button>
                    </span>
                </div>
                <div class="search-bar">
                    <div class="chat-list">
                        <button class="friend-drawer" id="b1">
                            <img src="https://media.discordapp.net/attachments/582274693097193472/779031603132235806/atom.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class1s;?><br>
                                </p1>
                        </button>
                        <button class="friend-drawer"id="b2">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779023684911628288/apollo.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class2s;?>
                            </p1>
                        </button>
                        <button class="friend-drawer"id="b3">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779031661714341978/shapes.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class3s;?>
                            </p1>
                        </button>
                        <button class="friend-drawer"id="b4">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779033530080297000/yoga.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class4s;?>
                            </p1>
                        </button>
                        <button class="friend-drawer"id="b5">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779033530080297000/yoga.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class5s;?>
                            </p1>
                        </button>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-md-7 chat-column">
                <div class="profile-bar" style="margin-top:20px;text-align:center;">
                    <b style="color:#808080">
                        <?php echo "<p id='dad'>$current</p>"?>
                    </b> 
                </div>
                <div class="container text-chat" id="11">
                    <div id="0" class="messages">
                        <div class="d-flex justify-content-start mb-4">
                            <div class="profile_picture">
                                <img src="https://josephchen.tech/wp-content/uploads/2020/08/test1.jpg"
                                    class="rounded-circle user_pfp">
                            </div>
                            <div class="message_received">
                                Hey, did you get the frontend working?
                                <span class="time_date">Joseph, 5:42 PM, Today</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <div class="message_sent">
                                Bro, what's frontend?
                                <span class="time_date">Me, 6:55 PM, Today</span>
                            </div>
                            <div class="profile_picture">
                                <img src="https://cdn.discordapp.com/attachments/582274693097193472/778992941900627998/unknown.png"
                                    class="rounded-circle user_pfp">
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mb-4">
                            <div class="profile_picture">
                                <img src="https://josephchen.tech/wp-content/uploads/2020/08/test1.jpg"
                                    class="rounded-circle user_pfp">
                            </div>
                            <div class="message_received">
                                Yo, we only have like one day.
                                <span class="time_date">Joseph, 7:00 PM, Today</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <div class="message_sent">
                                Oof, sounds like a personal problem.
                                <span class="time_date">Me, 7:06 PM, Today</span>
                            </div>
                            <div class="profile_picture">
                                <img src="https://cdn.discordapp.com/attachments/582274693097193472/778992941900627998/unknown.png"
                                    class="rounded-circle user_pfp">
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mb-4">
                            <div class="profile_picture">
                                <img src="https://josephchen.tech/wp-content/uploads/2020/08/test1.jpg"
                                    class="rounded-circle user_pfp">
                            </div>
                            <div class="message_received">
                                .........................
                                <span class="time_date">Joseph, 7:42 PM, Today</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mb-4">
                            <div class="profile_picture">
                                <img src="https://josephchen.tech/wp-content/uploads/2020/08/test1.jpg"
                                    class="rounded-circle user_pfp">
                            </div>
                            <div class="message_received">
                                .........................
                                <span class="time_date">Joseph, 7:42 PM, Today</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mb-4">
                            <div class="profile_picture">
                                <img src="https://josephchen.tech/wp-content/uploads/2020/08/test1.jpg"
                                    class="rounded-circle user_pfp">
                            </div>
                            <div class="message_received">
                                PAIN 1.0..............
                                <span class="time_date">Joseph, 7:42 PM, Today</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-footer">
                    <div class="input-group">
                        <textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
                    </div>
                    <div class="send-btn">Send</div>
                </div>
            </div>
        </div>
    </div>
        
</body>

</html>

<script src="script.js"></script>
