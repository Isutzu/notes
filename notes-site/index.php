<?php

// TODO
// Create login page and settings to change in Night Mode.

foreach (glob("notesmd/*.md") as $file) {
    $path_parts = pathinfo($file);
    $filename = $path_parts['filename'];
    $list .= "<li class='titles' data-title = '$filename'><a href='#'> " .
                    $filename. "</a></li>";
}

include 'templates/header.php';

?>


  <div class="container">
    <br>
      <div id="content" class="markdown-body">

      </div>
  </div>



 <?php  include 'templates/footer.php';?>
