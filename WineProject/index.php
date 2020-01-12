<?php
ini_set('session.cookie_lifetime', 0);
session_start();
require_once 'config/imports.php';
//codepen
//cookie speichern?
//null beim nicht eingegebenen phone=> null speichern
//timpestamp ubdated at

//$str=dateOfBirthFilter('2000February03');
/*$str=dateOfBirthFilter('2000February03');
$_POST['submitR']="d";
$_POST['fname']="dh";
$_POST['lname']="df";
$_POST['year'] ='2001';
$_POST['month'] ='February';
$_POST['day']='19';
$_POST['country']="dhhh";
$_POST['city']="dd";
$_POST['zip']="dd";
$_POST['street']="dd";
$_POST['email']="ddejejddjhjjjnwj";
$_POST['password1']="ufn5j88globus";
$_POST['password2']="ufn5j88globus";
$_POST['genderRadio']="m";*/
/*$customer=[
    'id'=>1,
    'firstName'=>'Olga',
    'lastName'=>'Klassen',
    'gender'=>'m',
    'dateOfBirth'=>'1996-05-04',
    'phoneNumber'=>'8928213',
    'addressID'=>1
];
$instance=new \skwd\models\Customer($customer);
$instance->save();*/

$controllerName=$_GET['c'] ?? 'pages';
$actionName=$_GET['a'] ?? 'start';

/*
$_COOKIE['id']=12;
$_GET['i']=1;
$_SESSION['shoppingCart']=array('id'=>1, 'prodName'=>"sd",'picturePath'=>"sf",'standardPrice'=>12);*/

$controllerPath=__DIR__ . '/controller/' . $controllerName. "Controller" . '.class.php';

if (file_exists($controllerPath)){
    include_once $controllerPath;
    $className='\\skwd\\controller\\'.ucfirst( $controllerName).'Controller';

    if (class_exists($className)){
        $controllerInstance= new $className($controllerName, $actionName);
        $controllerMethod='action'.ucfirst($actionName);
        if (method_exists($controllerInstance, $controllerMethod)){
            $controllerInstance->{$controllerMethod}();
            $controllerInstance->renderHTML();


        }
    else{
            header('Location: index.php?c=pages&a=error');
        }
    }
    else{
        header('Location: index.php?c=pages&a=error');
    }
}
else{
    header('Location: index.php?c=pages&a=error');
}


