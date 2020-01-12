<?php
namespace skwd\models;
class Picture extends BaseModel{
    const TABLENAME='Picture';
    protected $schema=[
        'pictureID'=>['type'=> BaseModel::TYPE_INT],
        'path'=>['type'=> BaseModel::TYPE_STRING],
        'productID'=>['type'=>BaseModel::TYPE_INT]];

}