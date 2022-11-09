<?php
include '../../DAL/connection.php';
session_start();

//Set Question Number
$number = $_GET['n'];


//Query for the Question
$query = "SELECT * FROM questions WHERE number = $number";

// Get the question
$result = mysqli_query(openConnection(), $query);
$question = mysqli_fetch_assoc($result);

//Get Choices
$query = "SELECT * FROM choices WHERE question_number = $number";
$choices = mysqli_query(openConnection(), $query);
// Get Total questions
$query = "SELECT * FROM questions";
$total_questions = mysqli_num_rows(mysqli_query(openConnection(), $query));


?>
<html>
<head>
    <title>PHP Quizer</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
    <div class="container">
        <p>PHP Quizer</p>
    </div>
</header>

<main>
    <div class="container">
        <div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div>
        <p class="question"><?php echo $question['text']; ?> </p>
        <form method="POST" action="process.php">
            <ul class="choicess">
                <?php while ($row = mysqli_fetch_assoc($choices)) { ?>
                    <li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['optionn']; ?></li>
                <?php } ?>


            </ul>
            <input type="hidden" name="number" value="<?php echo $number; ?>">
            <input type="submit" name="submit" value="Submit">


        </form>


    </div>

</main>
</body>
</html>