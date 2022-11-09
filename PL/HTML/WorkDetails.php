<html>
    <head>
        <style>
            #contact label{
                display: inline-block;
                width: 130px; 
                text-align: left;
            }
            #contact div{
                margin-top: 1em;
            }
            .table{border-collapse:collapse;border-spacing:0;width:100%;display:table}.table{border:1px solid #ccc}
            .w3-bordered tr,.table tr{border-bottom:1px solid #ddd}.w3-striped tbody tr:nth-child(even){background-color:#f1f1f1}
            .table tr:nth-child(odd){background-color:#fff}.table tr:nth-child(even){background-color:#f1f1f1}
            .w3-hoverable tbody tr:hover,.w3-ul.w3-hoverable li:hover{background-color:#ccc}.w3-centered tr th,.w3-centered tr td{text-align:center}
            .w3-table td,.w3-table th,.table td,.table th{padding:8px 8px;display:table-cell;text-align:left;vertical-align:top}
            .w3-table th:first-child,.w3-table td:first-child,.table th:first-child,.table td:first-child{padding-left:16px}
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Details</title>
    </head>
    <body>
        <form id="contact" method="POST" action="adminMyWork.php">
            <table border="1" class="table">
                <?php
                require_once("../../BLL/WORKManager.php");

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $getReq = new WorkDTORequest("a", "a", "a", 0, 0, "a");
                    $getReq->setId($id);
                    $record = getWorkById($getReq->getId());
                    session_start();
                    $_SESSION['worktargetid'] = $id;
                    $Id = $record->getId();
                    $title = $record->getTitle();
                    $content = $record->getContent();
                    $Budget = $record->getBudget();
                    $FileName = $record->getFilename();
                    $UserId = $record->getIduser();
                }
                ?>

                <tr>
                    <td><label>Id:</label></td>
                    <td> 
                        <div><?php echo $Id; ?> </div> 
                    </td>
                </tr>
                <tr>
                    <td><label>Title:</label></td>
                    <td> 
                        <div><?php echo $title; ?> </div> 
                    </td>
                </tr>
                <tr>
                    <td><label>Content:</label></td>
                    <td> 
                        <div><?php echo $content; ?></div> 
                    </td>
                </tr>
                <tr>
                    <td><label>Budget:</label></td>
                    <td>
                        <div><?php echo $Budget; ?></div> 
                    </td>
                </tr>
                <tr>
                    <td><label>FileName:</label></td>
                    <td>
                        <div><?php echo $FileName; ?><a <?php echo "href='downloadfile.php?filepath=" . $FileName . "'" ?>>Download</a></div> 
                    </td>


                </tr>
                <tr>
                    <td><label> User Id:</label></td>
                    <td>
                        <div><?php echo $UserId; ?></div> 
                    </td>
                </tr>

                <tr> 



                </tr>

            </table>
            <div id="contact_back">
                <button  type="submit" name="back">Back</button>
            </div> 
        </form>

        <form method="" action="done.php">
            <div id="contact_back">
                <button  type="submit" name="done" >Done</button>
            </div> 
        </form>




    </body>
</html>

