<html lang="english">
<head>
<title>BlackJack</title>
</head>
<body>
<h1>BlackJack</h1>
<br>
<form>
    <input type="submit" name="submit" value="Play">
</form>


</body>
</html>

<?php

//var_dump($_GET);
//echo '<br>';

$player1 = array(
    'card1' => 0,
    'card2' => 0,
    'card3' => 0,
    'card4' => 0,
    'card5' => 0,
    'score' => 0
);

$player2 = array(
    'card1' => 0,
    'card2' => 0,
    'card3' => 0,
    'card4' => 0,
    'card5' => 0,
    'score' => 0
);

$cardArray = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];

function makeValues($card) : int{
    if (is_int($card)){
        return $card;
    }
    else if ($card == 'A') {
        return 11;
    }
    else{
        return 10;
    }
}

if (isset($_GET['submit'])){
    shuffle($cardArray);
//    var_dump($cardArray);
    echo '<br> <br>';
    $player1['card1'] = array_shift($cardArray);
    $player1['card2'] = array_shift($cardArray);
//    $player1['card3'] = array_shift($cardArray);
//    $player1['card4'] = array_shift($cardArray);
//    $player1['card5'] = array_shift($cardArray);
    $player2['card1'] = array_shift($cardArray);
    $player2['card2'] = array_shift($cardArray);
//    $player2['card3'] = array_shift($cardArray);
//    $player2['card4'] = array_shift($cardArray);
//    $player2['card5'] = array_shift($cardArray);

    $a1 = makeValues($player1['card1']);
    $a2 = makeValues($player1['card2']);
    $a3 = makeValues($player1['card3']);
    $a4 = makeValues($player1['card4']);
    $a5 = makeValues($player1['card5']);

    $b1 = makeValues($player2['card1']);
    $b2 = makeValues($player2['card2']);
    $b3 = makeValues($player2['card3']);
    $b4 = makeValues($player2['card4']);
    $b5 = makeValues($player2['card5']);

//    $draw1 = ($player1['score'] < 14);
//    $draw2 = ($player2['score'] < 14);


//    for($i = 0; $player1['score'] <= 14; $i++){
//        $player1['score'] = $a1+$a2+($a3 * ($i===3))+($a4 * ($i===4))+($a5 * ($i===5));
//    }
//
//    for($j = 0; $player2['score'] <= 14; $j++){
//        $player2['score'] = $b1+$b2+($b3 * ($i===3))+($b4 * ($i===4))+($b5 * ($i===5));
//    }

    $player1['score'] = $a1+$a2;
    $player2['score'] = $b1+$b2;

    if (($player1['score'] - $player2['score']) > 0){
        $winner = 'Player 1';
    }
    else if (($player1['score'] - $player2['score']) < 0){
        $winner = 'Player 2';
    }
    else{
        $winner = 'No one';
    }

    echo "PLAYER 1 <br>";
    echo "Card 1: " . $player1['card1'];
    echo '<br>';
    echo "Card 2: " . $player1['card2'];
    echo '<br>';
    if ($player1['card3'] > 0) {echo "Card 3: " . $player1['card3'];}
    echo '<br>';
    echo "Score: " . $player1['score'];

    echo '<br> <br>';
    echo "PLAYER 2 <br>";
    echo "Card 1: " . $player2['card1'];
    echo '<br>';
    echo "Card 2: " . $player2['card2'];
    echo '<br>';
    if ($player2['card3'] > 0) {echo "Card 3: " . $player2['card3'];}
    echo '<br>';
    echo "Score: " . $player2['score'];

    echo '<br> <br>';
    echo "$winner is the winner";
}

?>