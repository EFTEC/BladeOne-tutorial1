<?php


include "vendor/autoload.php"; // it is crap, I will explain it later.

$blade=new \eftec\bladeone\BladeOne(__DIR__."/view",__DIR__."/compile");

// let's add a debug mode so we could know what's going on
$blade->setMode(\eftec\bladeone\BladeOne::MODE_DEBUG);
// aha, let's add an echo
echo $blade->run("example.tutorial",[]);
