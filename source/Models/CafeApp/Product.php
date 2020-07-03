<?php


namespace Source\Models\CafeApp;


use Source\Core\Model;

class Product extends Model
{
    public function __construct()
    {
        parent::__construct("app_products", ["id"], ["sku", "description", "regular_price", "sale_price"]);
    }
}