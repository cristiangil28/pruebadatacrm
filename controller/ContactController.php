<?php
class ContactController
{
    public function index()
    {
        require_once('../model/Contact.php');
        $contact = new Contact();
        $array = ["datos"=>$contact->getContacts(),"totalcontacts"=>$contact->getTotalContacts()];

        require_once('../datos.php');
    }
}

$controller = new ContactController();
$controller->index();
