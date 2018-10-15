<?php
include "vendor/autoload.php"; // it is crap, I will explain it later.
include "dao/ProductDao2.php";
// view
$blade=new \eftec\bladeone\BladeOne(__DIR__."/view",__DIR__."/compile");
$blade->setMode(\eftec\bladeone\BladeOne::MODE_DEBUG);

// validation
$val=new \eftec\ValidationOne();

// persistence
$db=new \eftec\DaoOne("localhost","root","abc.123","bladeonetut1");
try {
    $db->connect();
} catch (Exception $e) {
    $val->addMessage("general","Database is down :".$e->getMessage(),'error');
}


// this page is two stage:
// stage one, the form is open as new
// stage two, the form was open and somebody clicked on the button

// collecting information


$button=$val
    ->type('integer') // it must be a number
    ->def(0) // default value is zero
    ->ifFailThenDefault() // if fails then, the button will be the default value=0
    ->post('frm_button'); // fetch the value
if ($button) {
    $product['name']=$val
        ->type('string') // it could be anything.
        ->required() // required is only if the fetch fails, not if the text is empty or not
        ->condition('betweenlen','',[4,40]) // the length must be between 4 and 40 characters
        ->post('frm_name');
    $product['price']=$val
        ->type('integer') // it must be a number
        ->required() // the field is required (post), again, it's not if the value is zero or not.
        ->condition('between','',[0,10000]) // the value must be between 0 and 10000.
        ->post('frm_price');
    if ($val->messageList->errorcount===0) {
        // we only insert if the number of errors is zero.
        try {
            $product['idproduct'] = \BladeOneTut1\ProductDao::insert($product);
            //we redirect to the list.
            header("location:list2.php");
            die(1);
        } catch (Exception $e) {
            $val->addMessage("general", "Unable to insert the product " . $e->getMessage(), 'error');
        }
    }
} else {
    $product['name']='';
    $product['price']='';
}
echo $blade->run("product.insert4",['product'=>$product,'messages'=>$val->messageList]);
