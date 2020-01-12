<?php
namespace skwd\models;
class ShoppingCart extends BaseModel {

    const TABLENAME = 'ShoppingCart';
    protected $schema=[
        'id'=>['type'=>BaseModel::TYPE_INT],
        'accountId'=>['type'=>BaseModel::TYPE_INT]];
}