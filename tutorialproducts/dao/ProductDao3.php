<?php

namespace BladeOneTut1;

class ProductDao
{
    /**
     * @return array|bool
     * @throws \Exception
     */
    public static function list() {
        global $db;
        return $db->select('*')->from('products')->toList();
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