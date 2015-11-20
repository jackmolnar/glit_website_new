<?php
  if(file_exists("../".$_REQUEST['file'])){
    echo "true";
  }else{
    echo "false";
  }
?>
