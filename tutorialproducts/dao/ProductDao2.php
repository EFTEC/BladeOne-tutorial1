<?php

namespace BladeOneTut1;

class ProductDao
{
    public static function list() {
    }

    /**
     * @param $product
     * @return mixed
     * @throws \Exception
     */
    public static function insert($product) {
        global $db; // it is OOP heresy but it works, and fast!. Call it container and we will be OOP friendly ;-)
        return $db->from('products')->set($product)->insert();
    }
}