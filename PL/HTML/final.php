<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PHP Quizzer</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" type="text/css">

    </head>
    <body>
        <header>
            <div class="container">
                <h1>PHP QUIZZER</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>You're Done! We will study your case</h2>

<?php
$score = $_SESSION['score'];
unset($_SESSION['score']);
echo $score;
if ($score == 6) {
    echo "<script type='text/javascript'>"
    . " window.location.href='JoinRequest/joinRequest.php';
                        </script>";
} else {
    echo "<script type='text/javascript'>"
    . " window.location.href='Agency.html';
                        </script>";
}
?>
            </div>
        </main>
    </body>

</html>
