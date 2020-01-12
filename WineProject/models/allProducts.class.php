<?php


namespace skwd\models;

class AllProducts extends BaseModel {
    const TABLENAME = 'AllProducts';
    protected $schema=[
        'productId'=> ['type'=>BaseModel::TYPE_INT],
        'name'=>['type'=> BaseModel::TYPE_STRING, 'min'=> 2, 'max'=>50],
        'value'=>['type'=> BaseModel::TYPE_STRING, 'min'=>2,  'max'=>50],
    ];
}