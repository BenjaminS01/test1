<?php
namespace  skwd\models;
class Orders extends BaseModel{

    const TABLENAME = 'Orders';

    protected $schema=[
        'id'=>['type'=>BaseModel::TYPE_INT],
        'orderDate'	=>['type'=>BaseModel::TYPE_STRING, 'min'=>10, 'max'=>10],
        'shipDate'	=>['type'=>BaseModel::TYPE_STRING, 'min'=>10, 'max'=>10],
        'shipPrice' =>['type'=> BaseModel::TYPE_FLOAT], 
        'payStatus'=>['type'=>BaseModel::TYPE_ENUM_G],
        'payMethod'=>['type'=>BaseModel::TYPE_ENUM_G], 
        'payDate'=>['type'=>BaseModel::TYPE_STRING, 'min'=>10, 'max'=>10],	
        'customerID'=>['type'=>BaseModel::TYPE_INT],	
        'addressID'=>['type'=>BaseModel::TYPE_INT]	
    ];

}