<?php


include "vendor/autoload.php"; // it is crap, I will explain it later.

$blade=new \eftec\bladeone\BladeOne(__DIR__."/view",__DIR__."/compile");

$blade->run("example.tutorial",[]);
