<!DOCTYPE HTML>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>proj</title>
    <meta charset="UTF-8" />
</head>

<body onload="myFunction(1)">
<?php
if ($_SESSION['login'] == false)
{
    echo "<h2>Forbidden. Please sign in first.</h2>";
}
?>
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4">
                <div class="profile-bar" style="margin-top:20px;">
                    <img class="profile-picture"
                        src="https://cdn.discordapp.com/attachments/582274693097193472/778992941900627998/unknown.png"
                        alt="profile picture">
                    <b style="color:#808080">
                        Jacob David
                    </b>
                    <span class="profile-bar--right float-right">
                    </span>
                </div>
                <div class="search-bar">
                    <div class="input-wrapper">
                        <b>
                            Search
                        </b>
                        <input type="text" placeholder="Search conversations...">
                    </div>
                    <div class="chat-list">
                        <div class="friend-drawer" onclick="myFunction(1)">
                            <img src="https://media.discordapp.net/attachments/582274693097193472/779031603132235806/atom.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                PHY640: Quantum Mechanics
                                </p>
                                <sup style="color:#bababa">
                                    Andrew Woo: Check the Discord??
                                    <span class="time text-muted small">
                                        11:06
                                    </span>
                        </div>
                        <div class="friend-drawer" onclick="myFunction(2)">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779023684911628288/apollo.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                LAT791: Special Readings
                            </p1>
                            <sup style="color:#bababa">
                                Felix Zou: here's the link to the hw ... 🔗
                                <span class="time text-muted small">
                                    03:24
                                </span>
                        </div>
                        <div class="friend-drawer" onclick="myFunction(3)">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779031661714341978/shapes.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                MAT790: Selected Topics in Mat...
                            </p1>
                            <sup style="color:#bababa">
                                Kevin Cong: SOOOOOOO BAD
                                <span class="time text-muted small">
                                    13:56
                                </span>
                        </div>
                        <div class="friend-drawer" onclick="myFunction(4)">
                            <img src="https://cdn.discordapp.com/attachments/582274693097193472/779033530080297000/yoga.png"
                                alt="friend profile picture" class=profile-picture>
                            <p1>
                                PEC104: Yoga As Meditation
                            </p1>>
                            <sup style="color:#bababa">
                                You: Can you tell coach I sprained ...
                                <span class="time text-muted small">
                                    07:34
                                </span>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-md-7 chat-column">
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


                    <div id="2" class="messages">
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
                                PAIN 2.0..............
                                <span class="time_date">Joseph, 7:42 PM, Today</span>
                            </div>
                        </div>
                    </div>


                    <div id="3" class="messages">
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
                                PAIN 3.0..............
                                <span class="time_date">Joseph, 7:42 PM, Today</span>
                            </div>
                        </div>
                    </div>

                    <div id="4" class="messages">
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
                                PAIN 4.0..............
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
</body>

</html>

<script src="script.js"></script>
