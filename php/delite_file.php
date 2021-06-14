<?php
    $filename = $_GET['filename'];
    unlink($_SERVER['DOCUMENT_ROOT']."/".$filename);
    header('Location: /areas.php');
?>