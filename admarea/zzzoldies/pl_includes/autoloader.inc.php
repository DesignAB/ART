<?php
spl_autoload_register('myAutoloader');
function myAutoloader($className){
  $path = ADMCLASSES."/classes/";
  $extension = ".class.php";

  // to do
  // check if file exist if not do stmh
  $fullPath = $path.$className.$extension;
  $fullPath = str_replace('\\',"/",$fullPath);
  if (!file_exists($fullPath)) {
    echo 'error'.'<br>'. $fullPath;
    exit();
  } else{
  include_once $fullPath;
  }

  // to do
}
