<?php
include "vendor/autoload.php"; // it is crap, I will explain it later.

// view
$blade=new \eftec\bladeone\BladeOne(__DIR__."/view",__DIR__."/compile");
$blade->setMode(\eftec\bladeone\BladeOne::MODE_DEBUG);

// persistence
$db=new \eftec\DaoOne("localhost","root","abc.123","bladeonetut1");
$db->connect();


// this page is two stage:
// stage one, the form is open as new
// stage two, the form was open and somebody clicked on the button

echo $blade->run("product.insert0",[]);
