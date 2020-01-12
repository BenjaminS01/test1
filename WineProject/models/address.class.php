<?php
namespace  skwd\models;

class Address extends BaseModel {

    const TABLENAME = 'Address';
   protected $schema=[
       'id'=> ['type'=>BaseModel::TYPE_INT],
       'country'=>['type'=> BaseModel::TYPE_STRING, 'min'=> 2, 'max'=>50],
       'city'=>['type'=> BaseModel::TYPE_STRING, 'min'=>2,  'max'=>50],
       'zip'=>['type'=> BaseModel::TYPE_STRING, 'min'=>2,'max'=>9],
       'street'=>['type'=> BaseModel::TYPE_STRING, 'min'=> 2, 'max'=>50]
   ];
}