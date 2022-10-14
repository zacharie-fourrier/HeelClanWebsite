<?php
    $DB_SERVER='91.170.154.154:3306';
    $DB_USERNAME='HEELZacky';
    $DB_PASSWORD='F2F4Astg12';
    $DB_DATABASE='heel_db';
    $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);

    $tag = $_POST['tag'];
    $role = $_POST['role'];
    $team = $_POST['team-id'];
    $id = $_POST['req-id'];
    $choice = $_POST['choice'];
    $index = 2;

    if ($role == "Player") {$index=3;}
    if ($role == "Substitute") {$index=1;}

    if ($choice == 'Accept') { // If the request is accepted
        $sql = "SELECT * FROM members WHERE m_tag = '$tag'"; // Check if the member already exists

        $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

        if ($data = mysqli_fetch_assoc($req)) { // If the member already exists
            $sql2 = "INSERT INTO team_members VALUES ($team, ".$data['m_id'].", '$role', $index)"; // Add the member to the team

            $req2 = $db->query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
        } else {
            $sql2 = "INSERT INTO members (m_tag) VALUES ('$tag'); // Add the member to the members table
            SELECT * FROM members WHERE m_tag = '$tag';"; //gets the id of the new member

            $req2 = $db->query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
            if ($data2 = mysqli_fetch_assoc($req2)) {
                $sql3 = "INSERT INTO team_members VALUES ($team, ".$data2['m_id'].", '$role', $index)"; // Add the member to the team

                $req3 = $db->query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
            }
        }

        $sqlUpdate = "UPDATE join_request SET r_status = 1 WHERE r_id = $id"; // Update the request status

        $reqUpdate = $db->query($sqlUpdate) or die('Erreur SQL !<br>'.$sqlUpdate.'<br>'.mysql_error());

        echo "Accepted the request from " . $tag . " to join the team !";
    } else {
        $sqlUpdate = "UPDATE join_request SET r_status = 2 WHERE r_id = $id"; // Update the request status

        $reqUpdate = $db->query($sqlUpdate) or die('Erreur SQL !<br>'.$sqlUpdate.'<br>'.mysql_error());
        echo 'Rejected the request from ' . $tag; 
    }
    mysqli_close($db);
?>
<a href="/recruitment/admin_interface.php"><br>Back to the admin interface</a>