<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Notes</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/github-markdown.css">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <!--JS-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"/></script>
  <script type="text/javascript" src="js/init.js"/> </script>

</head>

<body>
  <div>
  <nav>

    <div class="nav-wrapper green accent-4">
      <a href="#" data-activates="slide-out" class="button-collapse">
          <i class="material-icons">menu</i>
      </a>
      <a href="#" class="brand-logo center">Notes</a>

      <ul id="slide-out" class="side-nav">
          <li>
              <div style="height:180px;" class="user-view green accent-2">
                  <h4> Notes </h4>
              </div>
            </li>

            <?php echo  $list; ?>
      </ul>
    </div>
  </nav>
  <!-- beginning of changable content -->
