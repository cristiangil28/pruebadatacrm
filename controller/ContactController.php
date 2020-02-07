<?php
require_once('../model/Contact.php');
$contact = new Contact();
$datos = $contact->getContacts();
require_once('../datos.php');