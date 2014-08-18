<?php

$user = 'fungroo';
$pass = 'fungroo1';
$db = 'fungroo_db';

$db=new mysqli('localhost', $user, $pass, $db) or die("unable to connect");

echo"Thanks for subscribe us !!";

?>