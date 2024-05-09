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

function makeDeck() : array{

    $cardArray = [];
    for ($i = 0; $i < 4; $i++){
        if ($i === 0) {$suit = "\u{2660}";}
        if ($i === 1) {$suit = "\u{2665}";}
        if ($i === 2) {$suit = "\u{2666}";}
        if ($i === 3) {$suit = "\u{2663}";}
        array_push($cardArray,
            ['suit' => $suit, 'face' => 'A', 'value' => 11],
            ['suit' => $suit, 'face' => 2, 'value' => 2],
            ['suit' => $suit, 'face' => 3, 'value' => 3],
            ['suit' => $suit, 'face' => 4, 'value' => 4],
            ['suit' => $suit, 'face' => 5, 'value' => 5],
            ['suit' => $suit, 'face' => 6, 'value' => 6],
            ['suit' => $suit, 'face' => 7, 'value' => 7],
            ['suit' => $suit, 'face' => 8, 'value' => 8],
            ['suit' => $suit, 'face' => 9, 'value' => 9],
            ['suit' => $suit, 'face' => 10, 'value' => 10],
            ['suit' => $suit, 'face' => 'J', 'value' => 10],
            ['suit' => $suit, 'face' => 'Q', 'value' => 10],
            ['suit' => $suit, 'face' => 'K', 'value' => 10]
        );
    }
    return $cardArray;
}

$cardArray = makeDeck();

if (isset($_GET['submit'])){
    shuffle($cardArray);
    echo '<br> <br>';
    $player1['card1'] = array_shift($cardArray);
    $player1['card2'] = array_shift($cardArray);

    $player2['card1'] = array_shift($cardArray);
    $player2['card2'] = array_shift($cardArray);

    $player1['score'] = $player1['card1']['value'] + $player1['card2']['value'];
    $player2['score'] = $player2['card1']['value'] + $player2['card2']['value'];




    if ((($player1['score'] - $player2['score']) > 0)){
        if ($player1['score'] <= 21){
            $winner = 'Player 1';
        }
        else{
            $winner = 'Player 2';
        }

    }
    else if (($player1['score'] - $player2['score']) < 0){
        if ($player2['score'] <= 21) {
            $winner = 'Player 2';
        }
        else{
            $winner = 'Player 1';
        }
    }
    else{
        $winner = 'No one';
    }

    echo "PLAYER 1 <br>";
    echo 'Card 1: ' . ($player1['card1']['face']) . ' ' . ($player1['card1']['suit']);
    echo '<br>';
    echo 'Card 2: ' . ($player1['card2']['face']) . ' ' . ($player1['card2']['suit']);
//    echo '<br>';
//    if ($player1['card3'] > 0) {echo "Card 3: " . $player1['card3'];}
    echo '<br>';
    echo "Score: " . $player1['score'];

    echo '<br> <br>';
    echo "PLAYER 2 <br>";
    echo 'Card 1: ' . ($player2['card1']['face']) . ' ' . ($player2['card1']['suit']);
    echo '<br>';
    echo 'Card 2: ' . ($player2['card2']['face']) . ' ' . ($player2['card2']['suit']);
//    echo '<br>';
//    if ($player2['card3'] > 0) {echo "Card 3: " . $player2['card3'];}
    echo '<br>';
    echo "Score: " . $player2['score'];

    echo '<br> <br>';
    echo "$winner is the winner";

}

?>