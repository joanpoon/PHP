<!DOCTYPE html>
<html>
<head>
    <!-- Yee Sin Joan Poon, Assignment 5, May10, 2018 -->
    <title>Assignment 5</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
<main>
    <h1>Assignment 5</h1>
    <h2>Text Statistics: </h2>
    <h2>This program will read the text from text area, and 
        output the statistics.</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="process_text">

        <label>Input text here:</label>
        <textarea name="text"
                  value="<?php echo htmlspecialchars($text); ?>"></textarea><br>


        <label>&nbsp;</label>
        <input type="submit" value="Process Texts"><br>
        
        <h2>Statistics: &nbsp;&nbsp;</h2>
        
        <label>Characters:</label>
        <span><?php echo $character; ?></span><br>

        <label>Letters:</label>
        <span><?php echo $letter; ?></span><br>

        <label>Consonants:</label>
        <span><?php echo $consonant; ?></span><br>
        
        <label>Digits:</label>
        <span><?php echo $digit; ?></span><br>
        
        <label>Spaces:</label>
        <span><?php echo $space; ?></span><br>
        
        <label>Word characters:</label>
        <span><?php echo $wordChar; ?></span><br>
        
        <label>Punctuation:</label>
        <span><?php echo $punctuation; ?></span><br>
        
        <label>Number of each word:</label>
        <span><?php echo $num_of_word; ?></span><br>
    </form>
    

</main>
</body>
</html>