<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" id="icon">
        <link rel="stylesheet" href="/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
        <script src="/Favicon.js"></script>
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
            <form>
                <label for="name">Full Name</label><br>
                <input type="text" id="name" name="name" placeholder="Your name.."><br><br>
                <label for="tag">In-game name</label><br>
                <input type="text" id="tag" name="tag" placeholder="Your in-game name.."><br><br>
                <label for="team">Team</label><br>
                <select id="team" name="team"><br><br>
                <?php 
                    define('DB_SERVER', '91.170.154.154:3306');
                    define('DB_USERNAME', 'HEELZacky');
                    define('DB_PASSWORD', 'F2F4Astg12');
                    define('DB_DATABASE', 'heel_db');
                    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

                    $sql =
                    "SELECT t_name FROM teams";

                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['t_name'] . "'>" . $row['t_name'] . "</option>";
                    }
                ?>
                </select><br><br>
                <fieldset>
                    <legend>Who referred you to us ?</legend>
                    <div>
                        <input type="radio" id="none" class="radio" name="referer" value="noone" checked>
                        <label for="noone">No one</label>
                    </div>
                    <div>
                        <input type="radio" id="ag" class="radio" name="referer" value="alligator">
                        <label for="alligator">Alligator Gaming</label>
                    </div>
                    <div>
                        <input type="radio" id="other" class="radio" name="referer" value="other">
                        <label for="other">Other :</label>
                        
                        <div>
                            <input type="text" id="referertxt" class="inputCustom" name="txtbox" disabled="disabled" placeholder="Type here...">
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
                    </div>
                </fieldset>
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