<?php
include "vendor/autoload.php"; // it is crap, I will explain it later.
include "dao/ProductDao3.php";
// view
$blade=new \eftec\bladeone\BladeOne(__DIR__."/view",__DIR__."/compile");
$blade->setMode(\eftec\bladeone\BladeOne::MODE_DEBUG);
// validation
$val=new \eftec\ValidationOne();
$message="";
// persistence
$db=new \eftec\DaoOne("localhost","root","abc.123","bladeonetut1");
try {
    $db->connect();
} catch (Exception $e) {
    // the end-version mustn't show the $e->getmessage
    $val->addMessage("general","Database is down :".$e->getMessage(),'error');
}
try {

    $list = \BladeOneTut1\ProductDao::list();
} catch (Exception $e) {
    $val->addMessage("general","Unable to get list :".$e->getMessage(),'error');
    $list =array();
}


echo $blade->run("product.list3",['products'=>$list,'messages'=>$val->messageList]);
