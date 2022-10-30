<?php
header('Access-control-Allow-Headers: *');
header('Access-control-Allow-Origin: *');
header('Access-control-Allow-Methods: POST, GET');

if ($_POST['matchId']) {
    $db = new SQLite3('data.sqlite');
    $matchId = $_POST['matchId'];
    $team = $_POST['team'];
    $sql = "select * from matchInfo where matchId = '".$matchId."'";
    $dump = $db->query($sql);
    $check = $dump->fetchArray();
    if($check){
        if($team==="team1"){
            $click = $check['team1'];
            $click++;
            $updateSql = "update  matchInfo set team1 = '".$click."' where matchId= '".$matchId."' ";
            $result= $db->query($updateSql);
        }else{
            $click = $check['team2'];
            $click++;
            $updateSql = "update  matchInfo set team2 = '".$click."' where matchId= '".$matchId."' ";
            $result= $db->query($updateSql);
        }
    }else{
        if($team==="team1"){
            $click =1;
            $updateSql = "insert into  matchInfo ('matchId','team1')values('".$matchId."','".$click."')";
            $result= $db->query($updateSql);
        }else{
            $click =1;
            $updateSql = "insert into  matchInfo ('matchId','team2')values('".$matchId."','".$click."')";
            $result= $db->query($updateSql);
        }
    }
}
if ($result) {
    $sql = "select * from matchInfo where matchId = '".$matchId."'";
    $dump = $db->query($sql);
    $check = $dump->fetchArray(SQLITE3_ASSOC);
    echo json_encode($check);
}



// $db = new SQLite3('data.sqlite');

// $db-> exec("CREATE TABLE IF NOT EXISTS matchInfo(id integer primary key, matchId varchar(10), team1 integer DEFAULT 0, team2 integer DEFAULT 0)")

?>