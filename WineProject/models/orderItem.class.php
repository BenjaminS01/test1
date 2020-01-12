<?php
namespace skwd\models;
class OrderItem extends BaseModel{
    const TABLENAME='OrderItem';
    protected $schema=[
        'id'=>['type'=>BaseModel::TYPE_INT],
        'actualPrice'=>['type'=>BaseModel::TYPE_FLOAT],
        'qty'=>['type'=>BaseModel::TYPE_INT],
        'productID'=>['type'=>BaseModel::TYPE_INT],
        'orderID'=>['type'=>BaseModel::TYPE_INT]
    ];
}