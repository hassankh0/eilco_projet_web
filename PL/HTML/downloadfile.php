<?php

$filepath = $_GET['filepath'];
if (file_exists($filepath)) {
    header('Content-Type: application/octet-stream');
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename= ' . basename($filepath));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma:public');
    header('Content-Length' . filesize($filepath));
    readfile($filepath);
}
echo "<script type='text/javascript'>"
 . " window.location.href=WorkDetails.php;
                        </script>";
