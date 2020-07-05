<?php


namespace Source\Models\CafeApp;


use Source\Core\Model;

class Product extends Model
{
    public function __construct()
    {
        parent::__construct("app_products", ["id"], ["sku", "description", "regular_price", "sale_price"]);
    }

    public function bootstrap(
        string $sku,
        string $ean,
        string $description,
        int $id_category,
        float $regular_price,
        float $sale_price,
        string $image,
        int $id_environment
    ): Product {
        $this->sku = $sku;
        $this->ean = null;
        $this->description = $description;
        $this->id_category = null;
        $this->regular_price = $regular_price;
        $this->sale_price = $sale_price;
        $this->image = null;
        $this->id_environmet = null;
        return $this;
    }

}