<?php

function Upload($key = 'img',$options = []){

  $pathDest = isset($options['path']) ? $options['path'] : 'public/img' . '/'; 
  $name = isset($options['name']) ? $options['name'] : null;
  if (isset($_FILES[$key]) && $_FILES[$key] != '') {

    $file      = explode('.', $_FILES[$key]['name']);
    $extension = pathinfo($_FILES[$key]['name'],PATHINFO_EXTENSION);
    
    
    if ($name != null) {
      $image     = Slug($name) .  '.' . $extension;
    } else {
      $image     = Slug($file[0]) .  '.' . $extension;
    }

    $chemin    = ROOT . $pathDest . $image;
    $verif     = ['jpg','png','gif','jpeg','JPG','PNG','GIF','JPEG'];

    if (in_array($extension,$verif)) {
      if (move_uploaded_file($_FILES[$key]['tmp_name'],$chemin)) {
        return $image;
      }
    }
    
  }
}