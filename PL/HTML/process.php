<?php include '../../DAL/connection.php'; ?>
<?php session_start(); ?>
<?php
// for the first question, score will not be there.
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}
if (($_POST)){
    // we need total question in process file too
    $query = "SELECT * FROM questions";
    $total_questions = mysqli_num_rows((mysqli_query(openConnection() , $query)));

    // we need to capture quest numb from where form was submitted
    $number = $_POST['number'];

    // here we are storing the selected option by the student
    $selected_choice = $_POST['choice'];

    //next question number
    $next = $number+1;

    // determine the correct answer for the current quest
    $query = "SELECT * FROM choices WHERE question_number = $number AND is_correct =1";
    $result = mysqli_query(openConnection() , $query);
    $row = mysqli_fetch_assoc($result);

    $correct_choice = $row['id'];

    //increase the score if selected choice is correct
    if ($selected_choice == $correct_choice){
        $_SESSION['score']+=1;
    }
    // redirect to the next question or final score page.
    if ($number == $total_questions){
        header("LOCATION: final.php ");
    }else{
        header("LOCATION: question.php?n=" .$next);
    }
}

?>
