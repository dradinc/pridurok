<?php
    $inst = $_POST['cc'];
    $dest = $_POST['select-type'];

    if(isset($_FILES) && $_FILES['inputfile']['error'] == 0)
    {
        $upd_dir = '/files/'.$inst.'/'.$dest;
        $name = $_FILES['inputfile']['name'];
        move_uploaded_file($_FILES['inputfile']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."$upd_dir/$name");
        header('Location: /areas.php');    
    }
    header('Location: /areas.php');
?>