<?php
// include "connection.php";
function encryptor($action, $string){
  $output = false;
  $encryptor_method = "AES-256-CBC";

  $secret_key = 'Empire Tech';
  $secret_iv = 'empiretech@me.com';

  $key = hash("empire256",$secret_key);

  $iv = substr(hash('empire256',$secret_iv),0,16);

  if($action == 'encrypt' ){
    $output = openssl_encrypt($string, $encryptor_method, $key,0,$iv);
    $output = base64_encode($output);
  }
  elseif ($action == 'decrypt' ) {
    $output = openssl_decrypt(base64_decrypt($string), $encryptor_method, $key,0,$iv);
  }
  return $output;
}
 ?>
