<!DOCTYPE HTML>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>proj</title>
    <meta charset="UTF-8" />
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
  if (isset($_GET['class'])) {
      $i=$_GET['class'];
      if($i==1)$current=$class1;
      if($i==2)$current=$class2;
      if($i==3)$current=$class3;
      if($i==4)$current=$class4;
      if($i==5)$current=$class5;
  }
    if(strlen($class1)>=33)$class1s=substr($class1,0,30);$class1s=$class1s."...";
    if(strlen($class2)>=33)$class2s=substr($class2,0,30);$class2s=$class2s."...";
    if(strlen($class3)>=33)$class3s=substr($class3,0,30);$class3s=$class3s."...";
    if(strlen($class4)>=33)$class4s=substr($class4,0,30);$class4s=$class4s."...";
    if(strlen($class5)>=33)$class5s=substr($class5,0,30);$class5s=$class5s."...";
?>
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
                        <a href="/main.php?class=1">
                        <button class="friend-drawer">
                            <img src="https://media.discordapp.net/attachments/582274693097193472/779031603132235806/atom.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class1s;?><br>
                                </p1>
                                <sup style="color:#bababa">
                                    Andrew Woo: Check the Discord??
                                    <span class="time text-muted small">
                                        11:06
                                    </span></sup>
                        </button></a>
                        <a href="/main.php?class=2">
                        <button class="friend-drawer">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779023684911628288/apollo.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class2s;?>
                            </p1>
                            <sup style="color:#bababa">
                                Felix Zou: here's the link to the hw ... 🔗
                                <span class="time text-muted small">
                                    03:24
                                </span></sup>
                        </button></a>
                        <a href="/main.php?class=3">
                        <button class="friend-drawer">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779031661714341978/shapes.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class3s;?>
                            </p1>
                            <sup style="color:#bababa">
                                Kevin Cong: SOOOOOOO BAD
                                <span class="time text-muted small">
                                    13:56
                                </span></sup>
                        </button></a>
                        <a href="/main.php?class=4">
                        <button class="friend-drawer">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779033530080297000/yoga.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class4s;?>
                            </p1>
                            <sup style="color:#bababa">
                                You: Can you tell coach I sprained ...
                                <span class="time text-muted small">
                                    07:34
                                </span></sup>
                        </button></a>
                        <a href="/main.php?class=5">
                        <button class="friend-drawer">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779033530080297000/yoga.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $class5s;?>
                            </p1>>
                            <sup style="color:#bababa">
                                You: Can you tell coach I sprained ...
                                <span class="time text-muted small">
                                    07:34
                                </span></sup>
                        </button></a>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-md-7 chat-column">
                <div class="profile-bar" style="margin-top:20px;">
                    <b style="color:#808080">
                        <?php echo $current;?>
                    </b> 
                </div>
                <div class="container text-chat" id="11">
                    <div id="1" class="messages">
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
