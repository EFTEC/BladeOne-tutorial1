<?php
include "vendor/autoload.php"; // it is crap, I will explain it later.

$db=new \eftec\DaoOne("localhost","root","abc.123","bladeonetut1");
$db->connect();

echo "ok";