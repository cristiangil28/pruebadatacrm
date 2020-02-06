<?php

$data = json_decode(
    file_get_contents('https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php?operation=getchallenge&username=prueba'),true);
$token = "";
$clave_acceso = "55kt1mJbtDFpsw1t";
foreach ($data as $value) {
    $token .=$value["token"];
    
}
$acces_key = md5($token.$clave_acceso);

$ch = curl_init();
 
 // definimos la URL a la que hacemos la petición
 curl_setopt($ch, CURLOPT_URL,"https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php");
 // indicamos el tipo de petición: POST
 curl_setopt($ch, CURLOPT_POST, TRUE);
 // definimos cada uno de los parámetros
 curl_setopt($ch, CURLOPT_POSTFIELDS, array("operation" => "login","username" => "prueba", "accessKey" => $acces_key));
  
 // recibimos la respuesta y la guardamos en una variable
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $remote_server_output = curl_exec ($ch);
  
 // cerramos la sesión cURL
 curl_close ($ch);

$data_login = json_decode($remote_server_output,true);
$session_name = "";
 foreach ($data_login as $value) {
    # code...
    $session_name.=$value["sessionName"];
    
}
$contacts = json_decode(
    file_get_contents("https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php?operation=query&sessionName={$session_name}&query=select%20*%20from%20Contacts;"),true);

print_r($contacts);
