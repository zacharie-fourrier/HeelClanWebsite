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
            <div class="requests">
                <div class="unseen">
                    Unseen requests :<br>
                    <?php 
                        $DB_SERVER='91.170.154.154:3306';
                        $DB_USERNAME='HEELZacky';
                        $DB_PASSWORD='F2F4Astg12';
                        $DB_DATABASE='heel_db';
                        $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);

                        $sql = "SELECT r_id, r_name, r_tag, r_referred, r_contact_mean, r_contact_info, r_text, teams.t_name, teams.t_game, r_team, sender_ip
                        FROM join_request
                        INNER JOIN teams ON join_request.r_team = teams.t_id
                        WHERE r_status = 0;";

                        $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

                        $i = 0;

                        while(($data = mysqli_fetch_assoc($req)) && ($i < 10)) {
                            echo '<form action="/recruitment/admin_exec.php" method="post">';
                            echo '<div class="request-box">';
                            echo '<div class="request-header">';
                            $firstName = substr($data['r_name'], 0, strpos($data['r_name'], ' '));
                            $lastName = substr($data['r_name'], strpos($data['r_name'], ' ')+1);
                            $dispName = $firstName . ' <accent>"' . $data['r_tag'] . '"</accent> ' . $lastName;
                            echo '<weak>#' . $data['r_id'] . '</weak> ' . $dispName;
                            echo '</div>';
                            echo '<div class="request-content">';
                            echo '<weak>Referred by </weak>' . ucfirst($data['r_referred']) . '<br>';
                            echo '<weak>Applies to </weak>' .$data['t_name'] . '<weak> (' . $data['t_game'] . ')</weak> :';
                            echo '<p><weak>' . $data['r_text'] . '</weak></p>';
                            echo '<weak>Contact : ' . ucfirst($data['r_contact_mean']) . ' - </weak>' . $data['r_contact_info'];
                            echo '<input type="text" name="role" placeholder="Role" required>';
                            echo $data['sender_ip'];
                            echo '</div>';
                            echo '<div class="request-footer">';
                            echo '<input type="hidden" name="team-id" value="' . $data['r_team'] . '">';
                            echo '<input type="hidden" name="tag" value="' . $data['r_tag'] . '">';
                            echo '<input type="hidden" name="req-id" value="' . $data['r_id'] . '">';
                            echo '<input type="submit" id="acceptbtn" name="choice" value="Accept"> <input type="submit" id="rejectbtn" name="choice" value="Reject">';
                            echo '</div>';
                            echo '</div>';
                            echo '</form>';
                            $i++;
                        }
                        mysqli_close($db);
                    ?>
                    Closed requests :<br>
                    <?php 
                        $DB_SERVER='91.170.154.154:3306';
                        $DB_USERNAME='HEELZacky';
                        $DB_PASSWORD='F2F4Astg12';
                        $DB_DATABASE='heel_db';
                        $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);

                        $sql = "SELECT r_id, r_name, r_tag, r_referred, r_status, r_contact_mean, r_contact_info, r_text, teams.t_name, teams.t_game, r_team, sender_ip
                        FROM join_request
                        INNER JOIN teams ON join_request.r_team = teams.t_id
                        WHERE r_status != 0;";

                        $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

                        $i = 0;

                        while(($data = mysqli_fetch_assoc($req)) && ($i < 10)) {
                            echo '<div class="request-box">';
                            echo '<div class="request-header">';
                            $firstName = substr($data['r_name'], 0, strpos($data['r_name'], ' '));
                            $lastName = substr($data['r_name'], strpos($data['r_name'], ' ')+1);
                            $dispName = $firstName . ' <accent>"' . $data['r_tag'] . '"</accent> ' . $lastName;
                            echo '<weak>#' . $data['r_id'] . '</weak> ' . $dispName;
                            echo '</div>';
                            echo '<div class="request-content">';
                            echo '<weak>Referred by </weak>' . ucfirst($data['r_referred']) . '<br>';
                            echo '<weak>Applies to </weak>' .$data['t_name'] . '<weak> (' . $data['t_game'] . ')</weak> :';
                            echo '<p><weak>' . $data['r_text'] . '</weak></p>';
                            echo '<weak>Contact : ' . ucfirst($data['r_contact_mean']) . ' - </weak>' . $data['r_contact_info'];
                            echo $data['sender_ip'];
                            echo '</div>';
                            echo '<div class="request-footer">';
                            if ($data['r_status'] == 1) {
                                echo '<weak style="color:#32cd32;">Accepted</weak>';
                            } else {
                                echo '<weak style="color:#d30000;">Rejected</weak>';
                            }
                            echo '</div>';
                            echo '</div>';
                            $i++;
                        }
                        mysqli_close($db);
                    ?>
                </div>
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