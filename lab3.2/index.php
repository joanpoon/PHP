<?php
//Joan Poon, CSD275, April 19,2018
//Lab3.2
//
//
//set default values to be used when page first loads
$scores = array();
$scores[0] = 70;
$scores[1] = 80;
$scores[2] = 90;
        
$scores_string = '';
$score_total = 0;
$score_average = 0;
$max_rolls = 0;
$average_rolls = 0;

//Variable to break the loop when the scores are invalid
$goOn = 0;

//take action based on variable in POST array
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    case 'process_scores':
        $scores = $_POST['scores'];
        $i = 0;
        
        // validate the scores
        // Converted the if statement to a for loop
        for($i = 0; $i < 3 ; $i++){
            if( empty($scores[$i]) ||
            !is_numeric($scores[$i]) ){
                echo 'You must enter three valid numbers for scores.';
                //set this variable to 1 so that it will break the switch case later
                $goOn = 1;
                break;
            }
        }
        
        //if any of the scores is invalid, $goOn will be set to 1, it will break the loop
        if($goOn==1){
            break;
        }
        
        // process the scores
        // TODO: Add code that calculates the score total
        $scores_string = '';
        
        foreach ($scores as $s) {
            $scores_string .= $s . '|';
            // calculate the score total 
            $score_total += $s;
        }
        $scores_string = substr($scores_string, 0, strlen($scores_string)-1);
        
        
        
        
        // calculate the average
        $score_average = $score_total / count($scores);
        
        // format the total and average
        $score_total_f = number_format($score_total, 2);
        $score_average_f = number_format($score_average, 2);

        break;
        
    case 'process_rolls':
        $number_to_roll = filter_input(INPUT_POST, 'number_to_roll', 
                FILTER_VALIDATE_INT);

        $total = 0;
        $count = 0;
        $max_rolls = -INF;

        //converted the outer loop from a while loop to a for loop
        for($count = 0; $count < 10000; $count++) {
            $rolls = 1;
            while (mt_rand(1, 6) != 6) {
                $rolls++;
            }
            $total += $rolls;
            $max_rolls = max($rolls, $max_rolls);
        }
        $average_rolls = $total / $count;

        break;
}
include 'loop_tester.php';
?>