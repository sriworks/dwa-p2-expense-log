<?php 

require('Email.php'); 

use DWA\Email;

$email = new Email('sriworks@gmail.com');
$email->send('This is the subject', 'This is the body');

?>