<?php
//Joan Poon, CSD275, May10,2018
//Assignment 5
//
//
//set default values to be used when page first loads
$character = 0;
$letter = 0;
$consonant = 0;
$digit = 0;
$space = 0;
$wordChar = 0;
$punctuation = 0;
$num_of_word = 0;
$text = '';

//take action based on variable in POST array
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    case 'process_text':
        $text = $_POST['text'];
        
        

        break;
        
    
}
include 'assignment5.php';
?>