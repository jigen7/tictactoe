<?php
/***
	Paolo Marco Manarang
	2016-03-05
	Simple PHP Script to show the logic of tictactoe
***/

$player1 = array();
$player2 = array();

function turn($player,$value){
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
 	array_push($GLOBALS['player1'], $value);
 	$player_arr = $GLOBALS['player1'];
 }
 elseif ($player == "p2"){
 	 	$player_sel = "Player 2";
 	array_push($GLOBALS['player2'], $value);
 	$player_arr = $GLOBALS['player2'];
 }

 //print_r($player_arr);


 foreach ($p as $arr){
 	$intersect = array_intersect($arr, $player_arr);
	if (count($intersect) == count($arr)) {
   	// Player X Wins
		echo $player_sel." Win<br>"; 
	} 
	else{
		//echo "Nothing<br>";
	}
 }//end foreach
 
 

} //end turn function

echo "turn(p1,02)<br>";
echo "turn(p2,01)<br>";
echo "turn(p1,12)<br>";
echo "turn(p2,00)<br>";
echo "turn(p1,22)<br><br>";

turn("p1","02");
turn("p2","01");
turn("p1","12");
turn("p2","00");
turn("p1","22");

?> 