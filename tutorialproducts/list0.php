<?php
include "vendor/autoload.php"; // it is crap, I will explain it later.
include "dao/ProductDao3.php";
// view
$blade=new \eftec\bladeone\BladeOne(__DIR__."/view",__DIR__."/compile");
$blade->setMode(\eftec\bladeone\BladeOne::MODE_DEBUG);

// persistence
$db=new \eftec\DaoOne("localhost","root","abc.123","bladeonetut1");
$db->connect();


// this page is a single stage:
// it loads the list of products
// and it shows on the webpage

$list=\BladeOneTut1\ProductDao::list();


echo $blade->run("product.list1",['products'=>$list]);
