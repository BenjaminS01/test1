<?php

function dateOfBirthFilter()
{

    $array = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
        'August', 'September', 'October', 'November', 'December'];
    $monthNumber = 0;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] === $_POST['month']) {
            $monthNumber = $i + 1;
            break;
        }
    }
    if ($monthNumber < 10) {
        $monthNumberWith0 = '0' . $monthNumber;
    }
    $resultMonth = isset($monthNumberWith0) ? $monthNumberWith0 : $monthNumber;
    $day = $_POST['day'];
    if (strlen($day) === 2) {
        $day = '0' . $day;
    }
    return $_POST['year'] . '-' . $resultMonth . '-' . $day;

}

function requiredCheck(&$errors)
{
    //country, year, month and day can not be unset
    if (!isset($_POST['fname'])) {
        array_push($errors, "Please fill out first name field");
    }
    if (!isset($_POST['lname'])) {
        array_push($errors, "Please fill out last name field");
    }
    if (!isset($_POST['email'])) {
        array_push($errors, "Please fill out email field");
    }
    if (!isset($_POST['password1'])) {
        array_push($errors, "Please fill out password field");
    }
    if (!isset($_POST['password2'])) {
        array_push($errors, "Please fill out repeat password field");
    }
    if (!isset($_POST['genderRadio'])) {
        array_push($errors, "Please set your gender");
    }
    if (!isset($_POST['zip'])) {
        array_push($errors, "Please fill out zip field");
    }
    if (!isset($_POST['city'])) {
        array_push($errors, "Please fill out city field");
    }
    if (!isset($_POST['street'])) {
        array_push($errors, "Please fill out street field");
    }
}

//should have minimum 1 char and 1 number
function validatePasswordForm(&$errors, $password)
{

    if (!preg_match('/[a-zA-Z]/', $password)) {
        array_push($errors, "Use at least one letter symbol for your password");
        return false;
    }
    if (!preg_match('/[0-9]/', $password)) {

        array_push($errors, "Use at least one number for your password");
        return false;
    }
    if (strlen($password) < 8) {
        array_push($errors, "The length of our password should be more than 7 symbols");
        return false;
    }
    return true;
}

function validatePassword(&$errors, $password1, $password2)
{
    //the passwords1 and password 2 should be equal
    if ($password1 !== $password2) {
        array_push($errors, "The both passwords should be equal");
        return false;
    }
    //the password should be valid
    if (validatePasswordForm($errors, $password1) === false) {
        return false;
    }
    return true;
}

function isUnique(&$errors, $email)
{
    $result = \skwd\models\Account::find('email= ' . '\'' . $email . '\'');
    if (count($result) === 0) {
        return true;
    }
    array_push($errors, "The user with this email already exists");
    return false;
}

function validateDateOfBirth(&$errors)
{
    if ($_POST['year'] === '') {
        array_push($errors, "Please enter valid year in your date of birth");
    }
    if ($_POST['month'] === '') {
        array_push($errors, "Please enter valid month in your date of birth");
    }
    if ($_POST['day'] === '') {
        array_push($errors, "Please enter valid day in your date of birth");
    }
}

function validateCountry(&$errors)
{
    if ($_POST['country'] === 'Country') {
        array_push($errors, "Please enter valid country");
    }
}

function findAddressInDb($address)
{
    $country = $address->__get('country');
    $city = $address->__get('city');
    $zip = $address->__get('zip');
    $street = $address->__get('street');
    $id = \skwd\models\Address::find('country= ' . '\'' . $country . '\'' . ' and city= ' .
        '\'' . $city . '\'' . ' and zip= ' . '\'' . $zip . '\'' . ' and street= ' . '\'' . $street . ' \' ');
    if (count($id) === 0) {
        return null;
    }
    return $id[0]['id'];
}

function validateCustomerTable(&$errors)
{

    if (empty($_POST['phone'])) {
        $_POST['phone'] = null;
    }
    $customer = ['firstName' => $_POST['fname'],
        'lastName' => $_POST['lname'],
        'gender' => $_POST['genderRadio'],
        'phoneNumber' => isset($_POST['phone']) ? $_POST['phone'] : NULL
    ];

    $customerInstance = new \skwd\models\Customer($customer);
    $customerInstance->validate($errors);
    validateDateOfBirth($errors);
    if (count($errors) === 0) {
        $customerInstance->__set('dateOfBirth', dateOfBirthFilter());
        return $customerInstance;
    } else {
        return false;
    }

}

function validateAddressTable(&$errors)
{

    $address = [
        'city' => $_POST['city'],
        'zip' => $_POST['zip'],
        'street' => $_POST['street']
    ];
    $addressInstance = new \skwd\models\Address($address);
    $addressInstance->validate($errors);
    validateCountry($errors);
    if (count($errors) === 0) {
        $addressInstance->__set('country', $_POST['country']);
        //it is not allowed to save the same addresses to the database
        $addressID = findAddressInDb($addressInstance);
        if (!is_null($addressID)) {
            $addressInstance->__set('id', $addressID);
        }
        return $addressInstance;
    } else {
        return false;
    }
}

function validateAccountTable(&$errors)
{
    if (!validatePassword($errors, $_POST['password1'], $_POST['password2']) || !isUnique($errors, $_POST['email'])) {
        return false;
    }
    $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
    $account = [
        'email' => $_POST['email'],
        'password' => $password
    ];
    $accountInstance = new \skwd\models\Account($account);
    $accountInstance->validate($errors);
    if (count($errors) === 0) {
        return $accountInstance;
    } else {
        return false;
    }
}

function register(&$errors)
{
    $db = $GLOBALS['db'];
    $db->beginTransaction();
    $customerInstance = validateCustomerTable($errors);
    $addressInstance = validateAddressTable($errors);
    $accountInstance = validateAccountTable($errors);
    if ($customerInstance === false || $addressInstance === false || $accountInstance === false) {
        return false;
    }

    if ($addressInstance->__get('id') === null) {
        $addressInstance->save($errors);
    }
    //only if the address is inserted we can go forward
    if (count($errors) === 0) {
        $customerInstance->__set('addressID', $addressInstance->__get('id'));
        $customerInstance->save($errors);
        //only if the customer is inserted we can go forward
        if (count($errors) === 0) {
            $accountInstance->__set('customerID', $customerInstance->__get('id'));
            $accountInstance->save($errors);
            //only if the account is inserted we can go forward
            if (count($errors) === 0) {
                $shoppingCart = [
                    'accountId' => $accountInstance->__get('id')
                ];
                $shoppingCartInstance = new skwd\models\ShoppingCart($shoppingCart);
                $shoppingCartInstance->save($errors);
                //only if all four instances are inserted we can commit the transaction
                if (count($errors) === 0) {
                    $db->commit();
                    return true;
                } else {
                    $db->rollBack();
                    return false;
                }
            } else {
                $db->rollBack();
                return false;
            }
        } else {
            $db->rollBack();
            return false;
        }
    } else {
        return false;
    }
}

function isPasswordfromUser($password, $email, &$errors)
{
    /*if(strlen($password)==1 || strlen($email)==1 ){
        return false;
    }*/

    $dbQuery = skwd\models\Account::find('email= ' . '\'' . $email . '\'');

    if (!empty($dbQuery)) {


        if (password_verify($password, $dbQuery[0]['password'])) {
            return true;
        } else {
            array_push($errors, "wrong password or email");
            return false;
        }
    } else {
        array_push($errors, "wrong password or email");
        return false;
    }

}

function login($password, $email, $rememberMe, &$errors)
{
    $isLoginSuccessful = false;
    $isLoginSuccessful = isPasswordfromUser($password, $email, $errors);
    if ($isLoginSuccessful == true && $rememberMe == true) {
        $dbQuery = skwd\models\Account::find('email= ' . '\'' . $email . '\'');
        $id = $dbQuery[0]['i    d'];
        rememberMe($email, $id);
    }

    return $isLoginSuccessful;
}

function logout()
{
    unset($_SESSION['logged']);
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    session_destroy();
    setcookie('email', '', -1, '/');
    setcookie('logged', '', -1, '/');
    setcookie('id', '', -1, '/');
    header('Location: index.php?c=pages&a=start');
}

function rememberMe($email, $id)
{
    $duration = time() + 3600 * 24 * 30;
    //setcookie('userId',$id,$duration,'/');
    setcookie('email', $email, $duration, '/');
    setcookie('logged', 'isLogged', $duration, '/');
    setcookie('id', $id, $duration, '/');
}

function usersIdIfLoggedIn()
{
    if (isset($_SESSION['id'])) {
        return $_SESSION['id'];
    } else if (isset($_COOKIE['id'])) {
        return $_COOKIE['id'];
    } else return null;
}

function dateOfBirthInRightOrder($dateOfBirth)
{

    $date = explode("-", $dateOfBirth);
    $newDate = $date[2] . '.' . $date[1] . '.' . $date[0];
    return $newDate;
}

function updatePersonalDataAccount($gender, $dateOfBirth, $addressID, $customerID, $email, $password, &$error)
{

    $customer = ['id' => $customerID,
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'gender' => $gender,
        'dateOfBirth' => $dateOfBirth,
        'phoneNumber' => $_POST['phoneNumber'],
        'addressID' => $addressID];

    if (isset($_SESSION['id'])) {
        $account = ['id' => $_SESSION['id'],
            'email' => $_POST['email'],
            'password' => $password,
            'customerID' => $customer['id']];
    } else if (isset($_COOKIE['id'])) {
        $account = ['id' => $_COOKIE['id'],
            'email' => $_POST['email'],
            'password' => $password,
            'customerID' => $customer['id']];
    }


    $account1 = new \skwd\models\Account($account);
    // $account1->validate($error);
    $account1->save($error);
    $customer1 = new \skwd\models\Customer($customer);

    //$customer1->validate($error);
    $customer1->save($error);

    // }
}

function validatePersonalDataAccount(&$error, $gender, $addressID, $dateOfBirth, $customerID, $email, $password)
{
    if (strlen($_POST['firstName']) <= 2) {
        array_push($error, "Please fill out first name field");
        return false;
    } else if (strlen($_POST['lastName']) <= 2) {
        array_push($error, "Please fill out last name field");
        return false;
    } else if (strlen($_POST['email']) <= 2) {
        array_push($error, "Please fill out email field");
        return false;
    } else if (strlen($_POST['phoneNumber']) <= 2) {
        array_push($error, "Please fill out phone number field");
        return false;
    } else {
        $test = true;
        if (strcmp($email, $_POST['email']) !== 0) {
            $test = isUnique($error, $_POST['email']);
            if ($test === true) {
                updatePersonalDataAccount($gender, $dateOfBirth, $addressID, $customerID, $email, $password, $error);
                return true;
            } else {
                return false;
            }
        } else {
            updatePersonalDataAccount($gender, $dateOfBirth, $addressID, $customerID, $email, $password, $error);
            return true;
        }

    }

}


function productsPicture($productId)
{

    $picture = \skwd\models\Picture::find('productID=' . $productId);
    return $picture;
}

function actionIfUserIsNotLoggedIn()
{
    if (isset($_SESSION['destination'])) {
        header('Location: index.php?c=pages&' . 'a=' . $_SESSION['destination']);
    } else {
        header('Location: index.php?c=pages&a=start');
    }
}


function upDateOrInsertProductInShoppingCart($productId, $price, $shoppingCartId, &$errors)
{
    //case: change qty upDate=>upDate
    //case: add product(existx in basket)=>update
    //case: add product (doesn't exist in basket)=>insert
    $databaseCheck = \skwd\models\ShoppingCartItem::find('productID=' . $productId . ' and shoppingCartId=' . $shoppingCartId);
    if (count($databaseCheck)===0){
        $shoppingCartItem = array('qty' => 1, 'actualPrice' => $price, 'productID' => $productId, 'shoppingCartId' => $shoppingCartId);
    }
    else{
        $shoppingCartItem=$databaseCheck[0];
        if (isset($_GET['cartOp'])&& $_GET['cartOp']==='upDate'){
            $shoppingCartItem['qty'] = $_POST['qty'];
        }
        else{
            if (($shoppingCartItem['qty']+1) > 10) {
                array_push($errors, 'You can not add more than 10 items of the same product');
            }
            else{
                $shoppingCartItem['qty'] += 1;
            }
        }
    }
    $shoppingCartItemInstance = new \skwd\models\ShoppingCartItem($shoppingCartItem);
    $shoppingCartItemInstance->save($errors);

}

function deleteProductFromShoppingCart($productId, $shoppingCartId, &$errors)
{
    $option = $_GET['cartOp'];
    $shoppingCartItem = \skwd\models\ShoppingCartItem::find('productID=' . $productId . ' and shoppingCartId=' . $shoppingCartId)[0];
    if ($option === 'delete') {
        $shoppingCartItemInstance = new \skwd\models\ShoppingCartItem($shoppingCartItem);
        $shoppingCartItemInstance->delete($errors);
    }
}

function userIsLoggedIn($accountId, &$errors)
{

    $shoppingCartId = \skwd\models\ShoppingCart::find('accountId=' . $accountId)[0]['id'];
    //case: after successfully registration/login the product will be saved to shoppingCart, that user wanted to save before he was logged in
    if (isset($_SESSION['destination']) && ($_SESSION['destination'] === 'shoppingCartShow') && isset($_SESSION['productToBasket'])) {
        upDateOrInsertProductInShoppingCart($_SESSION['productToBasket'],$_SESSION['price'], $shoppingCartId, $errors);
        unset($_SESSION['destination']);
        unset($_SESSION['price']);
        unset($_SESSION['productToBasket']);
    } //case user wanted to show his basket and he not logged in, now he is
    elseif (isset($_COOKIE['destination']) && ($_COOKIE['destination'] === 'shoppingCartShow')) {
        unset($_SESSION['destination']);
    }//case user is logged in and wants to delete
    elseif (isset($_GET['cartOp']) && $_GET['cartOp']==='delete') {
        $productId = $_GET['i'];
        //if user wants to delete  his purchase $_GET['cartOp'] must be set
        deleteProductFromShoppingCart($productId,$shoppingCartId, $errors);
    }//case user wants to insert new item or add quantity +1 to old item
    if ( isset($_GET['i']) && isset($_GET['p']) && (isset($_GET['cartOp']) && ($_GET['cartOp']==='upDate')  || 1)){
        upDateOrInsertProductInShoppingCart($_GET['i'], $_GET['p'], $shoppingCartId, $errors);
    }

}

function editPassword(&$error, $email, $accountId, $customerId){
    if(
    isPasswordfromUser($_POST['oldPassword'],$email,$error) 
  && validatePassword($error,$_POST['newPassword'],$_POST['newPasswordCheck'])
  &&validatePasswordForm($error, $_POST['newPassword'])){

      $account=['id'=>$accountId,
      'email'=>$email,
      'password'=>password_hash($_POST['newPassword'], PASSWORD_DEFAULT),
      'customerID'=>$customerId];

       $account1 = new \skwd\models\Account($account);
       $account1->save($error);
       return true;
  }
  else{
      return false;
  }
}

function editAddress(&$error, $addressId=null){
    $address = [
        'id' => $addressId,
        'city' => $_POST['city'],
        'zip' => $_POST['zip'],
        'street' => $_POST['street']
    ];
    $addressInstance = new \skwd\models\Address($address);
    $addressInstance->validate($error);
    validateCountry($error);
    if (count($error)===0){
        $addressInstance->__set('country', $_POST['country']);
        $addressInstance->save();
        return true;
    }
    else{
        return false;
    }
  
}
function requiredCheckCheckout(&$errors)
{
    

    if (!isset($_POST['zip'])) {
        array_push($errors, "Please fill out zip field");
    }
    if (!isset($_POST['city'])) {
        array_push($errors, "Please fill out city field");
    }
    if (!isset($_POST['street'])) {
        array_push($errors, "Please fill out street field");
    }

    if (!isset($_POST['payMethod'])) {
        array_push($errors, "Please choose a pay method");
    }

    validateCountry($errors);

    
    if(count($errors)===0){
        return true;
    }
    else{
        return false;
    }
}

function orderPrice($shopingcartItems){
    $orderPrice = 0.0;
    foreach($shopingcartItems as $key => $value){
       $orderPrice += $shopingcartItems[$key]['actualPrice'];
    }
    return $orderPrice;
}

function shipPrice($orderPrice){

    $shipPrice = 0.0;

    if($orderPrice < 50.00){
        $shipPrice = 3.49;
    }

    return $shipPrice;
}
function validateAddressTableCheckout(&$errors, $city, $zip, $street, $country)
{

    $address = [
        'country' => $country,
        'city' => $city,
        'zip' => $zip,
        'street' => $street
    ];
    $addressInstance = new \skwd\models\Address($address);
    $addressInstance->validate($errors);
    if (count($errors) === 0) {     
        $addressID = findAddressInDb($addressInstance);
        if (!is_null($addressID)) {
            $addressInstance->__set('id', $addressID);
            return $addressInstance;
        }
        else{
            $addressInstance->save($errors);
            return $addressInstance;
        }
 
    }
}



function createOrder($shopingcartItems, &$errors, $customer, $country, $city, $zip, $street, $payMethod){

    $shipPrice = shipPrice(orderPrice($shopingcartItems));

    $orderDate = date("Y-m-d");

    $shipDate = date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));

    $address = validateAddressTableCheckout($errors,$city, $zip, $street, $country);

    if(count($errors)===0){
        $order=['id'=>null,
      'orderDate'=>$orderDate,
      'shipDate'=>$shipDate,
      'shipPrice' =>$shipPrice,
      'payStatus'=>'unpaid',
      'payMethod'=>$payMethod,
      'payDate'=>null,
      'customerID'=>$customer[0]['id'],
      'addressID'=>$address->__get('id')
        ];

       $order1 = new \skwd\models\Orders($order);
       $order1->save($errors);

            if(count($errors===0)){

                foreach($shopingcartItems as $key => $value){
    
                $orderItem=['id'=>null,
                'actualPrice'=>$shopingcartItems[$key]['actualPrice'],
                'qty'=>$shopingcartItems[$key]['qty'],
                'productID'=>$shopingcartItems[$key]['productID'],
                'orderID'=>$order1->__get('id')
                ];
                $orderItem1 = new \skwd\models\OrderItem($orderItem);
                $orderItem1->save($errors);

                    if(count($errors===0)){

                        $shoppingCartItem=['id'=>$shopingcartItems[$key]['id'],
                        'actualPrice'=>$shopingcartItems[$key]['actualPrice'],
                        'qty'=>$shopingcartItems[$key]['qty'],
                        'productID'=>$shopingcartItems[$key]['productID'],
                        'shoppingcartId'=>$shopingcartItems[$key]['shoppingcartId']
                        ];
                        $shoppingCartItem1 = new \skwd\models\ShoppingCartItem($shoppingCartItem);
                        $shoppingCartItem1->delete($errors);

                    }

                }
                
            }

    }


}
