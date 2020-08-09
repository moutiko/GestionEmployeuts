<?php

session_start();
require_once './bootstrap.php';
spl_autoload_register('autoload');
function autoload($class_name){
  $array__paths = array(
      'Database/',
      'models/',
      'app/classe/',
      'controllers/'
  );
  $parts = explode('\\',$class_name);
  $name = array_pop($parts);

  foreach($array__paths as $path){
      $file = sprintf($path.'%s.php',$name);
      if(is_file($file)){
          include_once $file;
      }


  }


}



?>