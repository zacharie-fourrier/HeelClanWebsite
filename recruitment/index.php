<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Heel Clan - Join Us" property="og:title" />
        <meta content="The inscription page to apply for a position in the Heel Clan" property="og:description" />
        <meta content="http://www.heelclan.com/recruitment" property="og:url" />
        <meta content="http://www.heelclan.com/img/Icon White.svg" property="og:image" />
        <meta content="#7712a6" data-react-helmet="true" name="theme-color" />
        <link rel="icon" id="icon">
        <link rel="stylesheet" href="/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
        <script src="/Favicon.js"></script>
        <script src="/Form_check.js"></script>
        <title>Heel Clan - Home</title>
    </head>
    <body>
        <div class="navbar">
            <div class="logo">
                <a href="/"><img src="/img/Icon White.svg" height="auto" width="6%" id="homeLogo"></a>
                <script src="/Logo.js"></script>
            </div>
            <div class="menu">
                <a href="/">Home</a>
                <a href="/teams/">Teams</a>
                <a href="/results/"><strike>Results</strike></a>
                <a href="/booking/"><strike>Book a match</strike></a>
                <a href="/recruitment/" class="active">Join us</a>
            </div>
            <div class="account">
                <a href="/account/"></a>
            </div>
        </div>
        <div class="content">
            <form name="joinRequestForm" action="/recruitment/request.php" method="post">
                <h1>Join us and make the difference !</h1>
                <label for="name">Full Name</label><br>
                <input type="text" id="name" name="name" placeholder="Your name..." maxlength = "64"><br><br>
                <label for="tag">In-game name</label><br>
                <input type="text" id="tag" name="tag" placeholder="Your in-game name..." maxlength = "64"><br><br>
                <label for="team">Team</label><br>
                <select id="team" name="team">
                <?php 
                    define('DB_SERVER', '91.170.154.154:3306');
                    define('DB_USERNAME', 'website_presentation');
                    define('DB_PASSWORD', 'T*A3gxGoBeZ(Qe1q');
                    define('DB_DATABASE', 'heel_db');
                    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

                    $sql =
                    "SELECT t_name, t_game, t_id FROM teams";

                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['t_id'] . "'>" . $row['t_name'] . " (" . $row['t_game'] . ")</option>";
                    }
                    mysqli_close($db);
                ?>
                </select><br><br>
                <fieldset>
                    <legend>Did someone refer you to us ?</legend>
                    <div class="label">
                        <input type="radio" id="other" name="referer" value="other" checked>
                        <label for="other">Yes : <input type="text" id="referertxt" class="inputCustom" name="txtbox" maxlength="64"></label>
                        <div class="check"><div class="inside"></div></div>
                    </div>
                    <div class="label">
                        <input type="radio" id="ag" name="referer" value="alligator gaming">
                        <label for="ag">Yes, Alligator Gaming</label>
                        <div class="check"><div class="inside"></div></div>
                    </div>
                    <div class="label">
                        <input type="radio" id="none" name="referer" value="none">
                        <label for="none">No, nobody</label>
                        <div class="check"><div class="inside"></div></div>
                    </div>
                    <script type="text/javascript">
                        var referer = document.getElementById("other");
                        var referertxt = document.getElementById("referertxt");
                        referer.addEventListener("click", function() {
                            referertxt.disabled = false;
                        });
                        var noone = document.getElementById("none");
                        noone.addEventListener("click", function() {
                            referertxt.disabled = true;
                        });
                        var ag = document.getElementById("ag");
                        ag.addEventListener("click", function() {
                            referertxt.disabled = true;
                        });
                    </script>
                </fieldset><br><br>
                <label for="text">Tell us about you</label><br>
                <textarea id="text" name="text" maxlength = "512" placeholder="Write down your previous experiences, if you're a new or returning player, etc... This is only to know you better, you do not need anything in particular to join the team" style="height:200px"></textarea><br><br>
                <label for="contact-mean">How can we contact you ?</label><br>
                <select id="contact-mean" name="contact-mean">
                    <option value="discord">Discord</option>
                    <option value="instagram">Instagram</option>
                    <option value="messenger">Messenger</option>
                    <option value="email">Email</option>
                </select>
                <input type="text" id="contact-info" name="contact" placeholder="Your contact info..." maxlength = "64">
                <br><br>
                <input type="button" value="Submit" onclick="validateForm()">
            </form>
        </div>
        <div class="footer">
            <div class="info">
                <div class="socials">
                    <accent>Check out our socials !</accent>
                    <br><a href="https://discord.gg/ECqAJNmvef" id="dis"><img src="/img/discord_logo.svg" height="20px" width="20px" id="l_dis"> Discord</a>
                    <br><a href="" id="twi"><img src="/img/twitter_logo.svg" height="20px" width="20px" id="l_twi"> Twitter</a>
                    <br><a href="" id="ins"><img src="/img/instagram_logo.svg" height="20px" width="20px" id="l_ins"> Instagram</a>
                    <br><a href="" id="ttv"><img src="/img/twitch_logo.svg" height="20px" width="20px" id="l_ttv"> Twitch</a>
                    <br><a href="https://www.youtube.com/channel/UCUad12eHavWluVfnzjgp6FA" id="ytb"><img src="/img/youtube_logo.svg" height="20px" width="20px" id="l_ytb"> Youtube</a>
                </div>
                <div class="presentation">
                    <accent>Heel Clan</accent>
                    <br><a href="/">News</a>
                    <br><a href="/teams/">Teams</a>
                    <br><a href="/results/">Results</a>
                    <br><a href="/booking/">Book a match</a>
                    <br><a href="/recruitment/">Join us</a>
                </div>
            </div>
            <div class="legal">
                <p style="text-align:left;float:left;">© 2022, EU - <strong>Heel Clan</strong></p>
                <p style="text-align:right;float:right;">Web design by <a href="http://heelsoft.tk"><strong>Heel Software Services</strong></a></p>
            </div>
        </div>
    </body>
</html>