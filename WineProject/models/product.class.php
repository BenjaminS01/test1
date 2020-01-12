<?php
namespace skwd\models;
class Product extends BaseModel
{
    const TABLENAME = 'Product';
    protected $schema = [
        'id' => ['type' => BaseModel::TYPE_INT],
        'prodName' => ['type' => BaseModel::TYPE_STRING],
        'description' => ['type' => BaseModel::TYPE_STRING],
        'standardPrice' => ['type' => BaseModel::TYPE_FLOAT],
        'productType' => ['type' => BaseModel::TYPE_ENUM_G],
        'vendorID' => ['type' => BaseModel::TYPE_INT]];

}
