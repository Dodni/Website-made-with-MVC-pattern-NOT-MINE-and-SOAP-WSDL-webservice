<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <title>MOBILOK</title>
  </head>

  <?php
     $options = array(
   
   'keep_alive' => false,
    //'trace' =>true,
    //'connection_timeout' => 5000,
    //'cache_wsdl' => WSDL_CACHE_NONE,
   );
  $client = new SoapClient('http://localhost/munka/soap/felveteli.wsdl',$options);
  
  $felvetelik = $client->getFelveteli();
  echo "<pre>";
  print_r($felvetelik);
  echo "</pre>";
  ?>
    
  <body>
  </body>
</html>