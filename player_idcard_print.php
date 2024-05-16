<?php
include("../../connect.php");

$fac_id = $_GET['fac_id'];
$fac_name = $_GET['fac_name'];

$sqlrow = "SELECT std_id
	FROM player
	WHERE faculty = '$fac_id'";
$resRow = mysql_query($sqlrow);
$row = mysql_num_rows($resRow);

header('Location: player_idcard_print_page1.php?fac_id='.$fac_id.'&fac_name='.$fac_name);
exit;

// include_once "player_idcard_print_page1.php";

// if($row > 100) {
//     // header('Location: player_idcard_print_page2.php?fac_id='.$fac_id.'&fac_name='.$fac_name);
//     // exit;
//     include_once "player_idcard_print_page2.php";
// }


