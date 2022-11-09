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
        <form id="contact" method="POST" action="superadminPage.php">
            <table border="1" class="table">
                <?php
                require_once("../../BLL/userManager.php");

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $getReq = new GetUserDTORequests();
                    $getReq->setId($id);
                    $record = getUser($getReq);
                    session_start();
                    $_SESSION['targetid'] = $id;

                    $Id = $record->getId();
                    $username = $record->getUsername();
                    $email = $record->getEmail();
                    $level = $record->getIs_admin();
                }
                ?>
                <th>Details</th>
                <th>Values</th>
                <tr>

                    <td><label>Id:</label></td>
                    <td> 
                        <div><?php echo $Id; ?> </div> 
                    </td>
                </tr>
                <tr>
                    <td><label>Username:</label></td>
                    <td> 
                        <div><?php echo $username; ?> </div> 
                    </td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td> 
                        <div><?php echo $email; ?></div> 
                    </td>
                </tr>
                <tr>
                    <td><label>Level:</label></td>
                    <td>
                        <div><?php echo $level; ?></div> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="contact_back">
                            <button  type="submit" name="back">Back</button>
                        </div> 
                    </td>
                    <td>
                        <div id="contact_back">
                            <?php echo"<a href='deleteUser.php?id=" . $Id . "'>Delete</a> " ?>
                        </div>
                    </td>
                </tr>
            </table>

        </form>




    </body>
</html>




