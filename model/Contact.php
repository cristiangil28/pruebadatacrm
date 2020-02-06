<?php

class Contact
{

    /**
     * 
     */
    public function getChallenge()
    {
        $data = json_decode(
            file_get_contents('https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php?operation=getchallenge&username=prueba'),
            true
        );
        $token = "";
        foreach ($data as $value) {
            # code...
            $token .= $value["token"];
        }
        return $token;
    }

    public function login()
    {
        $clave_acceso = "55kt1mJbtDFpsw1t";
        $acces_key = md5($this->getChallenge() . $clave_acceso);

        $ch = curl_init();

        // definimos la URL a la que hacemos la petición
        curl_setopt($ch, CURLOPT_URL, "https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php");
        // indicamos el tipo de petición: POST
        curl_setopt($ch, CURLOPT_POST, TRUE);
        // definimos cada uno de los parámetros
        curl_setopt($ch, CURLOPT_POSTFIELDS, array("operation" => "login", "username" => "prueba", "accessKey" => $acces_key));

        // recibimos la respuesta y la guardamos en una variable
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $remote_server_output = curl_exec($ch);

        // cerramos la sesión cURL
        curl_close($ch);

        $data_login = json_decode($remote_server_output, true);
        $session_name = "";
        foreach ($data_login as $value) {
            $session_name .= $value["sessionName"];
        }
        return $session_name;
    }

    public function getContacts()
    {
        $contacts = json_decode(
            file_get_contents("https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php?operation=query&sessionName={$this->login()}&query=select%20*%20from%20Contacts;"),
            true
        );
        $array_contacts = null;
        foreach ($contacts as $contact) {
            $array_contacts = $contact;
        }
        return $array_contacts;
    }
}
$c = new Contact();
foreach ($c->getContacts() as $contact) {
    echo $contact['contact_no'] . "\n";
}
