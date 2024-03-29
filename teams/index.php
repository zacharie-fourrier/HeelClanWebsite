<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Heel Clan - Teams" property="og:title" />
        <meta content="Browse our teams' latest achievements and get to know them !" property="og:description" />
        <meta content="http://www.heelclan.com/teams" property="og:url" />
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
                <a href="/teams/" class="active">Teams</a>
                <a href="/results/"><strike>Results</strike></a>
                <a href="/booking/"><strike>Book a match</strike></a>
                <a href="/recruitment/">Join us</a>
            </div>
            <div class="account">
                <a href="/account/"></a>
            </div>
        </div>
        <div class="content">
            <p>
                <br>
                <br>
            </p>
            <?php 
                $DB_SERVER='91.170.154.154:3306';
                $DB_USERNAME='website_presentation';
                $DB_PASSWORD='T*A3gxGoBeZ(Qe1q';
                $DB_DATABASE='heel_db';
                $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);

                $sql = 
                'SELECT t_id, t_banner, t_name, t_game_logo FROM teams';

                $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

                while($data = mysqli_fetch_assoc($req)) {

                    echo '<div class="team_pannel">';
                    echo '<img src="'.$data['t_banner'].'" height="auto" width="100%">';
                    echo '<div class="team_name">'.$data['t_name'].'</div>';
                    echo '<img src="'.$data['t_game_logo'].'" class="team_game" width="50%", height="auto">';
                    echo '<div class="team_member"><p>';

                    $sql2 =
                    'SELECT teams.t_game, members.m_tag, team_members.m_role
                    FROM teams
                    INNER JOIN team_members ON teams.t_id = team_members.t_id
                    INNER JOIN members ON team_members.m_id = members.m_id
                    WHERE teams.t_id = '.$data['t_id'].'
                    ORDER BY m_index DESC';

                    $req2 = $db->query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());

                    $i = 0;

                    while($data2 = mysqli_fetch_assoc($req2)) {
                        if ($i <= 7) {
                            echo $data2['m_tag'].' - '.$data2['m_role'].'<br>';
                        }
                    }
                    echo '</p></div>';
                    echo '</div>';
                }
                mysqli_close($db);
            ?>
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