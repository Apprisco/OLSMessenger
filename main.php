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
  if (isset($_GET['logout']))logout();
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
    $cl=explode("!",$result);
    $classs=$cl;
    $current=$cl[0];
    for($x=0;$x<5;$x++)
         if(strlen($classs[$x])>=30)
         $classs[$x]=substr($classs[$x],0,27)."...";
?>
<script>
    var autoScroll = true;
function ScrollChat(){
    $('#11').scrollTop($('#11')[0].scrollHeight).trigger('scroll');
}
ScrollChat();
$('#11').on('scroll', function(){
    if($(this).scrollTop() < this.scrollHeight - $(this).height()){
        autoScroll = false;
    }
    else{
        autoScroll = true;
    }
});
    
</script>
<script>
$( document ).ready(function() {
    $.post("/chathistory.php",{class:'<?php echo $cl[0];?>'},function(data){
        $('.messages').empty();
        var c=data.split('|');
        var hi=[[],[]],gi=[];
        for(i=0;i<c.length-c.length%3;i+=3)
            if(i%3==0){
                hi[0][i/3]=c[i];hi[1][i/3]=c[i+1];gi[i/3]=c[i+2];
            }
        $.post("/generateChatHTML.php",{userid:hi[0],time:hi[1],content:gi},function(dat){
        if(dat!="undefined")$('.messages').append(dat);
        if(autoScroll)ScrollChat();
        });
    });
});
</script>
<script>
var k=1;
var z=<?php echo json_encode($cl); ?>;
$(document).on('click', "button.friend-drawer", function() {
    var id = $(this).attr('id');
    k=id.charAt(1)-1;
    $('p#dad').text(z[k]);
    $.post("/chathistory.php",{class:z[k]},function(data){
        $('.messages').empty();
        var c=data.split('|');
        var hi=[[],[]],gi=[];
        for(i=0;i<c.length-c.length%3;i+=3)
            if(i%3==0){
                hi[0][i/3]=c[i];hi[1][i/3]=c[i+1];gi[i/3]=c[i+2];
            }
        $.post("/generateChatHTML.php",{userid:hi[0],time:hi[1],content:gi},function(dat){
        if(dat!="undefined")$('.messages').append(dat);
        if(autoScroll)ScrollChat();
        });
    });
});
$(document).on('click', ".send-btn", function() {
    var l=$('#send').val();
    if(l.length!=0)
    {
    $.post("/sendchat.php",{class:z[k],content:l},function(data)
    {
        $.post("/chathistory.php",{class:z[k]},function(data)
        {
        $('.messages').empty();
        var c=data.split('|');
        var hi=[[],[]],gi=[];
        for(i=0;i<c.length-c.length%3;i+=3)
            if(i%3==0){
                hi[0][i/3]=c[i];hi[1][i/3]=c[i+1];gi[i/3]=c[i+2];
            }
        $.post("/generateChatHTML.php",{userid:hi[0],time:hi[1],content:gi},function(dat){
        if(dat!="undefined")$('.messages').append(dat);
        if(autoScroll)ScrollChat();
        });
    });
});
    $('#send').val('');
}});

setInterval(function()
    {
        
        $.post("/chathistory.php",{class:z[k]},function(data)
        {
        $('.messages').empty();
        var c=data.split('|');
        var hi=[[],[]],gi=[];
        for(i=0;i<c.length-c.length%3;i+=3)
            if(i%3==0){
                hi[0][i/3]=c[i];hi[1][i/3]=c[i+1];gi[i/3]=c[i+2];
            }
        $.post("/generateChatHTML.php",{userid:hi[0],time:hi[1],content:gi},function(dat){
        if(dat!="undefined")$('.messages').append(dat);
        if(autoScroll)ScrollChat();
        });
    });
    },10000);
</script>
<body onload="">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4">
                <div class="profile-bar" style="margin-top:20px;width:90%">
                    <img class="profile-picture"
                        src="https://cdn.discordapp.com/attachments/582274693097193472/778992941900627998/unknown.png"
                        alt="profile picture">
                    <b style="">
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
                                <?php echo $classs[0];?><br>
                                </p1>
                        </button>
                        <button class="friend-drawer"id="b2">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779023684911628288/apollo.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $classs[1];?>
                            </p1>
                        </button>
                        <button class="friend-drawer"id="b3">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779031661714341978/shapes.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $classs[2];?>
                            </p1>
                        </button>
                        <button class="friend-drawer"id="b4">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779033530080297000/yoga.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $classs[3];?>
                            </p1>
                        </button>
                        <button class="friend-drawer"id="b5">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779033530080297000/yoga.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                <?php echo $classs[4];?>
                            </p1>
                        </button>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-md-7 chat-column">
                <div class="profile-bar" style="margin-top:20px;text-align:center;">
                    <b style="">
                        <?php echo "<p id='dad'>$current</p>"?>
                    </b> 
                </div>
                <div class="container text-chat" id="11">
                    <div id="dood" class="messages">
                    </div>
                </div>
                <div class="chat-footer">
                    <div class="input-group" onclick="return false;">
                        <textarea name="send" id="send" class="form-control type_msg" placeholder="Type your message..."></textarea>
                        <div class="send-btn">Send</div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</body>

</html>
