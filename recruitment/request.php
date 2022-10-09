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
            <div class="inscription">
            <?php 
                $name = $_POST['name'];
                $tag = $_POST['tag'];
                $referer = $_POST['referer'];
                $team = $_POST['team'];
                if (isset($_POST['txtbox'])) {
                    $txtbox = $_POST['txtbox'];
                } else {
                    $txtbox = "No";
                }
                if ($referer == "other") {
                    $referer = $txtbox;
                }
                $text = $_POST['text'];
                $contact = $_POST['contact'];
                $contact_mean = $_POST['contact-mean'];

                $regex = "/\'/";
                $regex2 = "/\"/";

                $text = preg_replace($regex, "\'", $text);
                $text = preg_replace($regex2, '\"', $text);

                $DB_SERVER = '91.170.154.154:3306';
                $DB_USERNAME = 'website_user';
                $DB_PASSWORD = '8.Mtw)cF@1mi8X1t';
                $DB_DATABASE = 'heel_db';
                $db = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }
                
                $sql = "INSERT INTO join_request (r_name, r_tag, r_team, r_referred, r_text, r_contact_info, r_contact_mean, r_status)
                VALUES ('$name', '$tag', $team, '$referer', '$text', '$contact', '$contact_mean', 0);";

                if ($db->query($sql) === TRUE) {
                    echo "<h1>Your request has been sent</h1><br>Thank you for your interest ! You can expect to hear from us very soon.<br>You can already join the discord server, it is open to everyone !<br><br>
                    <iframe src=\"https://discord.com/widget?id=791315477871067166&theme=dark\" width=\"100%\" height=\"400px\" allowtransparency=\"true\" frameborder=\"0\" sandbox=\"allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts\"></iframe>";
                } else {
                    echo "Error: please try again later or contact us on discord.";
                }
            ?>
            </div>
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