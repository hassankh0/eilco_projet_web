

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
            .table{border-collapse:collapse;border-spacing:0;width:100%;display:table}.table{border:1px solid #ccc}
            .w3-bordered tr,.table tr{border-bottom:1px solid #ddd}.w3-striped tbody tr:nth-child(even){background-color:#f1f1f1}
            .table tr:nth-child(odd){background-color:#fff}.table tr:nth-child(even){background-color:#f1f1f1}
            .w3-hoverable tbody tr:hover,.w3-ul.w3-hoverable li:hover{background-color:#ccc}.w3-centered tr th,.w3-centered tr td{text-align:center}
            .w3-table td,.w3-table th,.table td,.table th{padding:8px 8px;display:table-cell;text-align:left;vertical-align:top}
            .w3-table th:first-child,.w3-table td:first-child,.table th:first-child,.table td:first-child{padding-left:16px}
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
                    <div id= 'cube'>
                        <img src="https://minio.codingblocks.com/amoeba/1008db10-135f-4b2b-a65a-5eee36be2171.svg" class= 'face one cc' draggable="false">
                        <img src="https://raw.githubusercontent.com/voodootikigod/logo.js/master/js.png" class= 'face two cc' draggable="false">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/CSS3_logo_and_wordmark.svg" class= 'face three cc' draggable="false">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/512px-HTML5_logo_and_wordmark.svg.png" class='face four cc' draggable="false">
                        <img src="https://pluralsight.imgix.net/paths/path-icons/csharp-e7b8fcd4ce.png" class='face five cc' draggable="false">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ17neJbjGh34qWkuGp1sPva9nidDs9iZ5FTUB6fteBJNr_-AHL" class='face six cc' draggable="false">
                    </div>
                </div>
                <img src="" style="width:45%;" class="round"><br><br>
                <h4><b>Agency.Yours</b></h4>
                <p class="text-grey">By Team Tia</p>
            </div>
            <div class="bar-block">
                <a href="#portfolio" onclick="close()" class="bar-item button padding text-teal"><i class="fa fa-th-large fa-fw margin-right"></i>Agency.Yours</a>

                <a href="superadminPage.php" onclick="close()" class="bar-item button padding"><i class="fa fa-users fa-fw margin-right"></i>Users</a>

                <a href="superadminRequests.php" onclick="close()" class="bar-item button padding"><i class="fa fa-reply fa-fw margin-right"></i>Requests</a>
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
            <div name="content" >

                <table border="1" class="table">
                    <?php
                    require_once("../../BLL/userManager.php");
                    $profiles = getAllUsersForSuperAdmin();
                    if ($profiles == null) {
                        echo "no results";
                    } else {
                        echo
                        "<tr>"
                        . "<th>" . "User Id" . "</th>"
                        . "<th>" . "Name" . "</th>"
                        
                        . "<th>" ."User Level"."</th>"
                        . "<th>" . "Details" . "</th>"
                        . "</tr>";

                        for ($i = 0; $i < count($profiles); $i++) {
                            
                            if($profiles[$i]->getIs_admin()==3)
                                $usertype="Client";
                            else
                                $usertype="Admin";
                            echo
                            "<tr>"
                            . "<td>" . $profiles[$i]->getId() . "</td>"
                            . "<td>" . $profiles[$i]->getUsername() . "</td>"
                            
                            . "<td>". $usertype."</td>"
                         
                            . "<td><a href='userDetails.php?id=" . $profiles[$i]->getId() . "'>Details</a></td>"
                           
                            . "</tr>";
                        }
                    }
                    ?>
                </table>

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


