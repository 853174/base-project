<?php
  require_once("docs/php/config.php");
  require_once("docs/php/utils.php");

  /* If request file is a docs/ file, do this */

  if(preg_match("/.*\/(docs\/.*)/i",$_GET["page"],$re)){

    $file = $server_path . $re[1];

    if(file_exists($file)){
      header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
      header("Cache-Control: public"); // needed for internet explorer
      header("Content-Type: text/css");
      header("Content-Length:".filesize($file));
      readfile($file);
      die();
    }else{
      echo $file;
    }
  }

  $page = $_GET["page"];

  if(file_exists($server_path . "views/$page.php")){
    // CHECK FOR CUSTOM CONFIG
    if(file_exists($server_path . "views/configs/$page.php")){
      require_once("views/configs/$page.php");
      $page_config = array_replace_recursive($page_config,$custom_config);
    }
    $page = "views/$page.php";
  }else{
    $page = "views/errors/404.php";
  }
?>

<!DOCTYPE html>
<html lang="es" dir="ltr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_config["title"] ?></title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="static/css/bootstrap.css">
    <script src="static/js/jquery-3.5.1.js"></script>
    <script src="static/js/popper.js"></script>
    <script src="static/js/bootstrap.js"></script>


    <!-- OWN FILES -->
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/bootstrap-custom.css">
    <script src="static/js/somejs.js" charset="utf-8"></script>

  </head>
  <body class="d-flex flex-column h-100">

    <?php
      if($page_config["navbar"]){
        require_once("docs/php/templates/navbar.php");
      }
    ?>

    <main class="flex-shrink-0">
      <div class="">
        <?php
          // INSERT PAGE HERE
          require_once($page);
        ?>
      </div>
    </main>

    <pre>
      <?php //print_r($page_config); ?>
    </pre>
    <?php
      if($page_config["footer"]){
        require_once("docs/php/templates/footer.php");
      }
    ?>

  </body>
</html>
