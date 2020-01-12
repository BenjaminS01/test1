<?php
namespace skwd\models;

class PropertyProProduct extends BaseModel{
    const TABLENAME='PropertyProProduct';
    protected $schema=[
        'id'	=>['type'=>BaseModel::TYPE_INT],
        'productID'	=>['type'=>BaseModel::TYPE_INT],
        'propertyID'=>['type'=>BaseModel::TYPE_INT],
        'value'		=>['type'=>BaseModel::TYPE_STRING],
    ];
}