<?php
class ContactController
{
    public function index()
    {
        require_once('../model/Contact.php');
        $contact = new Contact();
        $datos = $contact->getContacts();
        require_once('../datos.php');
    }
}

$controller = new ContactController();
$controller->index();
