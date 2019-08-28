<?php
    include "Parsedown.php";
     $title = $_GET['title'];
     if(!isset($title))
     {
       $title = "Android";
     }
    $Parsedown = new Parsedown();
    echo $Parsedown->text(file_get_contents("notesmd/".$title.".md"));

 ?>
