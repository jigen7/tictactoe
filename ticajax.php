<?php
/***
    Paolo Marco Manarang
    2016-03-05
    PHP Script to be call in Ajax Call by tictactoe.html
***/
session_start();  //use session to retain the values of the array of p1 and p2
    if (!isset($_SESSION['player1'])) {
        $_SESSION['player1'] = array();
    }

    if (!isset($_SESSION['player2'])) {
        $_SESSION['player2'] = array();
    }



/*
 Pattern 1 - 0,0 , 0,1 , 0,2
 Pattern 2 - 1,0 , 1,1 , 1,2
 Pattern 3 - 2,0 , 2,1 , 2,2

 Pattern 4 - 0,0 , 1,0 , 2,0
 Pattern 5 - 0,1 , 1,1 , 2,1
 Pattern 6 - 0,2 , 1,2 , 2,2

 Pattern 7 - 0,0 , 1,1 , 2,2  
 Pattern 8 - 0,2 , 1,1 , 2,0
*/ 

$player = $_POST['player'];
$value  = $_POST['value'];

//echo $player."  ".$value;

 $p[] = array("00" , "01" , "02");
 $p[] = array("10" , "11" , "12");
 $p[] = array("20" , "21" , "22");
 $p[] = array("00" , "10" , "20");
 $p[] = array("01" , "11" , "21");
 $p[] = array("02" , "12" , "22");
 $p[] = array("00" , "11" , "22");  
 $p[] = array("02" , "11" , "20");

 if($player == "p1"){
 	$player_sel = "Player 1";
 	array_push($_SESSION['player1'], $value);
 	$player_arr = $_SESSION['player1'];
 }
 elseif ($player == "p2"){
 	 	$player_sel = "Player 2";
 	array_push($_SESSION['player2'], $value);
 	$player_arr = $_SESSION['player2']

 	;
 }
  

 //print_r($player_arr);
 $is_win = 0;

 foreach ($p as $arr){
 	$intersect = array_intersect($arr, $player_arr);
	if (count($intersect) == count($arr)) {
   	// Player X Wins
		$is_win = 1;
		session_destroy(); // if win destroy the session
	} 
	else{
		//echo "Nothing<br>";
	}
 }//end foreach

    echo json_encode(array("is_win"=>$is_win,"player"=>$player));

?> 