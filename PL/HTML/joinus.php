<!DOCTYPE html>
<html style="box-sizing: border-box;">
    <head>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src=../Scripts/3Dcube.js></script>
        <script src=../Scripts/script.js></script>
        <title>Coding Agency</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="../CSS/3Dcube.css">
        <link rel="stylesheet" href="../CSS/components.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

        <style>
            body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
            body {
                font-family: Arial;
                font-size: 15px;
                line-height: 1.6em;
            }

            li {
                list-style: none;
            }

            a {
                text-decoration: none;
            }

            .container {
                width: 60%;
                margin: 0 auto;
                overflow: auto;
            }

            header {
                border-bottom: 3px #f4f4f4 solid;
            }

            footer {
                padding-top: 5px;
                border-top: 3px #f4f4f4 solid;
                text-align: center;
            }

            main {
                padding-bottom: 20px;
            }

            a.start {
                display: inline-block;
                color: #666;
                background-color: #f4f4f4;
                border: 1px dotted #ccc;
                padding: 6px 13px;
            }

            .current {
                padding: 10px;
                background: #f4f4f4;
                border: #ccc dotted 1px;
                margin: 20px 0 10px 0;
            }

            label {
                display: inline-block;
                width: 180px;
            }

            input[type='text'] {
                width: 97%;
                padding: 4px;
                border-radius: 5px;
                border: 1px #ccc solid;
            }

            input[type='number'] {
                width: 50px;
                padding: 4px;
                border-radius: 5px;
                border: 1px #ccc solid;
            }

            @media only screen and (max-width: 960px) {

                .container {
                    width: 80%;
                }

            }
        </style>
    </head>
    <body class="light-grey content" style="max-width:1600px" onload = 'start()'>

        <div id="progress"></div>

        <!-- Sidebar/menu -->
        <nav class="sidebar collapse white animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="container">
                <a href="#" onclick="close()" class="hide-large right jumbo padding hover-grey" title="close menu">
                    <i class="fa fa-remove"></i>
                </a>
                <canvas id = 'full' onmousemove='mousePos(event)' onmousedown='mouseDown(event)' onmouseup='mouseUp(event)' ontouchmove='fingerPos(event)' ontouchstart='fingerDown(event)'></canvas>
                <div id= 'avatar'>
                    <a href="Agency.html">
                        <div id= 'cube'>
                            <img src="https://minio.codingblocks.com/amoeba/1008db10-135f-4b2b-a65a-5eee36be2171.svg" class= 'face one cc' draggable="false">
                            <img src="https://raw.githubusercontent.com/voodootikigod/logo.js/master/js.png" class= 'face two cc' draggable="false">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/CSS3_logo_and_wordmark.svg" class= 'face three cc' draggable="false">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/512px-HTML5_logo_and_wordmark.svg.png" class='face four cc' draggable="false">
                            <img src="https://pluralsight.imgix.net/paths/path-icons/csharp-e7b8fcd4ce.png" class='face five cc' draggable="false">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ17neJbjGh34qWkuGp1sPva9nidDs9iZ5FTUB6fteBJNr_-AHL" class='face six cc' draggable="false">
                        </div>
                    </a>
                </div>
                <img src="" style="width:45%;" class="round"><br><br>
                <h4><b>Agency.Yours</b></h4>
                <p class="text-grey">By Team Tia</p>
            </div>
            <div class="bar-block">
                <a href="#portfolio" onclick="close()" class="bar-item button padding text-teal"><i class="fa fa-th-large fa-fw margin-right"></i>Agency.Yours</a>
                <a href="#contact" onclick="close()" class="bar-item button padding"><i class="fa fa-envelope fa-fw margin-right"></i>Messages</a>
                <a href="usersettings.php" onclick="close()" class="bar-item button padding"><i class="fa fa-cog fa-fw margin-right"></i>Settings</a>
            </div>
            <div>

                <br>
                <br>
                <br>
                <ul>
                    <form action="logout.php"><button>Logout</button></form>
                </ul>
            </div>
        </nav>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="overlay hide-large animate-opacity" onclick="close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="main" style="margin-left:300px">

            <!-- Header -->
            <header id="portfolio">
                <a href="#"><img src="" style="width:65px;" class="circle right margin hide-large hover-opacity"></a>
                <span class="button hide-large xxlarge hover-text-grey" onclick="open()"><i class="fa fa-bars"></i></span>

            </header>
            <div name="container" >
                <h2>test your programming knowledge</h2>
                <p> this is a multiple choice quizz to test your knowledge of PHP</p>
                <ul>
                    <li><strong>Number of Questions: </strong>6</li>
                    <li><strong>Type: </strong> MCQ</li>
                </ul>
                <!--        n=1 is to know that we are at question number 1-->
                <a href="question.php ?n=1" class="start"> Start Quiz</a>
            </div>





            <!--Footer End-->


            <div class="black center padding-24">Powered by <a href="" title="Team Tia" target="_blank" class="hover-opacity">Team Tia</a></div>

            <!-- End page content -->
        </div>
    </body>
</html>

<script>
    /* ===================================
     message validation
     ====================================== */
    $(document).ready(function () {
        var errors = false;
        $('#contact_message').keyup(function () {
            var input = $(this);

            if (input.val() !== "")
            {
                input.removeClass("invalid").addClass("valid");
                $("#errorMessage").removeClass("error").addClass("error_hide");
                errors = true;
            } else
            {
                input.removeClass("valid").addClass("invalid");
                errors = false;
                $("#errorMessage").removeClass("error_hide").addClass("error");
            }

        });
        $("#contact_submit").click(function (event)
        {
            if (!errors)
            {
                alert("Fields are missing or invalid");
                event.preventDefault();
            } else {
                alert("Submitted");
            }
        });
    });
    // Script to open and close sidebar
    function open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>
