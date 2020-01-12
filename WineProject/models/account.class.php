<?php
namespace skwd\models;
class Account extends BaseModel {

    const TABLENAME = 'Account';
    protected $schema=[
    'id'=>['type'=>BaseModel::TYPE_INT],
    'email'=>['type'=>BaseModel::TYPE_STRING, 'min'=>5, 'max'=> 50],
    'password'=>['type'=>BaseModel::TYPE_STRING, 'min'=>60, 'max'=> 255],
    'customerID'=>['type'=>BaseModel::TYPE_INT]];
}