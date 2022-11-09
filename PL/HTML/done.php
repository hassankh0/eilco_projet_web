<?php

require_once('../../BLL/messageManager.php');
require_once('../../BLL/workManager.php');
session_start();
$id = $_SESSION['worktargetid'];

makedone($id);

echo "<script type='text/javascript'>"
 . " window.location.href='adminMyWork.php';
                        </script>";
