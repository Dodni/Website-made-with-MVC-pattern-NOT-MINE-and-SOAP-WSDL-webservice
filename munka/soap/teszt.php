<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <title>HULLADEK</title>
  </head>

  <?php
     $options = array(
   
   'keep_alive' => false,
    //'trace' =>true,
    //'connection_timeout' => 5000,
    //'cache_wsdl' => WSDL_CACHE_NONE,
   );
  $client = new SoapClient('http://localhost/munka/soap/hulladek.wsdl',$options);
  
  $hulladek = $client->getHulladek();
  echo "<pre>";
  print_r($hulladek);
  echo "</pre>";
  ?>
    
  <body>
  </body>
</html>