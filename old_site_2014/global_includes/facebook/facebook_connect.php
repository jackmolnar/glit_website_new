<?php

include("global_includes/facebook/facebook.php");

 $config = array(
      'appId' => '250200485145048',
      'secret' => '849e4690751849e2ea000853621f2889',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  
  $fb_user_id = $facebook->getUser();
  
  ?>