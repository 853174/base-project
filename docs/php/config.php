<?php

  $app_name = "Base";
  $path = "/base/";

  $server_root = $_SERVER["CONTEXT_DOCUMENT_ROOT"];
  $server_path = "$server_root$path";


  // DEFAULT PAGE CONFIG
  $page_config = [
    "title" => $app_name,
    "navbar" => [
      "title" => $app_name,
      "home" => $path,
      "links" => [
        "1" => ["About Us",$path . "about"],
        "2" => ["Contact",$path . "contact"]
      ]
    ],
    "footer" => true
  ];

?>
