<?php
$dbpath = "127.0.0.1";
$dbuser = "root";
$dbpass = "root";
$dbname = "toby";

$connection = mysqli_connect($dbpath, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    echo (" System is offline.");
}

function userIsRegistered($email)
{
    $query = "SELECT * FROM users WHERE email='" . $email . "'";
    $result = mysqli_query($GLOBALS['connection'], $query);


    if (mysqli_num_rows($result) > 0) {

        return TRUE;
    }

    return FALSE;
}


function registerUser($username, $phone, $email, $address, $id_number ,$password)
{
    $email = mysqli_real_escape_string($GLOBALS['connection'], $email);
    $address = mysqli_real_escape_string($GLOBALS['connection'], $address);

    $query = "INSERT INTO users (username,phone,email,address,id_number,password)
     values ('{$username}','{$phone}','{$email}','{$address}','{$id_number}','{$password}')";
    $result = mysqli_query($GLOBALS['connection'], $query);

    return $result;
}


function updateOrgShares($total_shares, $shares_on_sale, $share_value, $details, $id)
{

    $query = 'UPDATE organizations SET total_shares=" ' . $total_shares . '", shares_on_sale="' . $shares_on_sale .
        '", share_value="' . $share_value . '", details="' .
        $details . '" WHERE id = "' . $id . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}

// $org_name, $shares_on_sale, $share_value, $email, $org['id']
function updateOrgDetails($org_name, $shares_on_sale, $share_value, $email, $id){
    $query = 'UPDATE organizations SET org_name=" ' . $org_name . '", shares_on_sale="' . $shares_on_sale .
        '", share_value="' . $share_value . '", email="' .
        $email . '" WHERE id = "' . $id . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}


function updateOrgOnSaleShares($shares_on_sale, $id)
{

    $query = 'UPDATE organizations SET shares_on_sale="' .
        $shares_on_sale . '" WHERE id = "' . $id . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}



function updateShareOnSale($total_shares, $id)
{

    $query = 'UPDATE organizations SET 	shares_on_sale="' .
        $total_shares . '" WHERE id = "' . $id . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}

function getOrgs()
{
    $query = "SELECT * FROM organizations";
    $result = mysqli_query($GLOBALS['connection'], $query);
    $orgs = [];
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $org['id'] = $row['id'];
            $org['org_name'] = $row['org_name'];
            $org['phone'] = $row['phone'];
            $org['email'] = $row['email'];
            $org['address'] = $row['address'];
            $org['password'] = $row['password'];
            $org['total_shares'] = $row['total_shares'];
            $org['shares_on_sale'] = $row['shares_on_sale'];
            $org['selling'] = $row['selling'];
            $org['owners'] = $row['owners'];
            $org['share_value'] = $row['share_value'];
            $org['share_value_history'] = $row['share_value_history'];
            $org['site_url'] = $row['site_url'];
            $org['docs'] = $row['docs'];
            $org['images'] = $row['images'];

            $orgs[] = $org;
        }
    }

    return $orgs;
}


function getOrgById($id)
{
    $query = "SELECT * FROM organizations WHERE id='" . $id . "'";
    $result = mysqli_query($GLOBALS['connection'], $query);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $org['id'] = $row['id'];
            $org['org_name'] = $row['org_name'];
            $org['phone'] = $row['phone'];
            $org['email'] = $row['email'];
            $org['address'] = $row['address'];
            $org['password'] = $row['password'];
            $org['total_shares'] = $row['total_shares'];
            $org['shares_on_sale'] = $row['shares_on_sale'];
            $org['selling'] = $row['selling'];
            $org['owners'] = $row['owners'];
            $org['share_value'] = $row['share_value'];
            $org['share_value_history'] = $row['share_value_history'];
            $org['site_url'] = $row['site_url'];
            $org['docs'] = $row['docs'];
            $org['images'] = $row['images'];
            $org['details'] = $row['details'];

            return $org;
        }
    }

    return FALSE;
}
function getOrgByEmail($email)
{
    $query = "SELECT * FROM organizations WHERE email='" . $email . "'";
    $result = mysqli_query($GLOBALS['connection'], $query);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $org['id'] = $row['id'];
            $org['org_name'] = $row['org_name'];
            $org['phone'] = $row['phone'];
            $org['email'] = $row['email'];
            $org['address'] = $row['address'];
            $org['password'] = $row['password'];
            $org['total_shares'] = $row['total_shares'];
            $org['shares_on_sale'] = $row['shares_on_sale'];
            $org['selling'] = $row['selling'];
            $org['owners'] = $row['owners'];
            $org['share_value'] = $row['share_value'];
            $org['share_value_history'] = $row['share_value_history'];
            $org['site_url'] = $row['site_url'];
            $org['docs'] = $row['docs'];
            $org['images'] = $row['images'];
            $org['details'] = $row['details'];

            return $org;
        }
    }

    return FALSE;
}

function updateOrgImagesById($id, $uploadedFile)
{
    $request = getOrgById($id);
    $attached = explode('/', $request['images']);
    $attached[] = $uploadedFile;
    $query = 'UPDATE organizations SET images="' . implode('/', $attached) . '" WHERE id = "' . $id . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}


function updateOrgAddOwner($orgId, $newOwner)
{
    $org = getOrgById($orgId);
    $owners = explode('/', $org['owners']);
    if (in_array($newOwner, $owners)) {
        return true;
    } else {
        $owners[] = $newOwner;
        $query = 'UPDATE organizations SET owners="' . implode('/', $owners) . '" WHERE id = "' . $orgId . '"';

        $result = mysqli_query($GLOBALS['connection'], $query);
        return $result;
    }
}


function updateOrgDocsById($id, $uploadedFile)
{
    $request = getOrgById($id);
    $attached = explode('/', $request['docs']);
    $attached[] = $uploadedFile;
    $query = 'UPDATE organizations SET docs="' . implode('/', $attached) . '" WHERE id = "' . $id . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}



function updateUserWatchlist($stockID, $userEmail)
{
    $user = getUserByEmail($userEmail);
    $watchlist = explode('/', $user['watchlist']);
    $watchlist[] = $stockID;
    $query = 'UPDATE users SET watchlist="' . implode('/', $watchlist) . '" WHERE id = "' . $user['id'] . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}

// var_dump($_SESSION['stocks']);

// 6-30/7-50/1-230/1-250

function updateUserStocks($userEmail, $stockID, $number){

    // var_dump($userEmail, $stockID, $number);
    $user = getUserByEmail($userEmail);
    // echo $user;
    $stocks = [];
    $stocks = explode('/', $user['stocks']);

    function array_search_partial($arr, $keyword) {
        foreach($arr as $index => $string) {
            if (strpos($string, $keyword) !== FALSE)
                return $index;
        }
    }

    if ($stocks[0] == '/' || $stocks[0] == '') {
        array_shift($stocks);
    }

    if(empty($stocks)){
        $stocks[]= '/'.$stockID . '-' . $number;
        // var_dump($stocks);
    }
    else{

        // var_dump(count($stocks));
        // $_SESSION['stocks'] = $stocks;

        
        for ($i = 0; $i < count($stocks); $i++) {

            $xx = array_search_partial($stocks, $stockID);

            $shares = explode('-', $stocks[$i]);
            // var_dump($stockID);
            if ($shares[0] == $stockID) {
                $newShares = $stockID . '-' . ($shares[1] + $number);
                unset($stocks[$i]);
                $stocks[] = $newShares;
                
            }  
            else {
                
                
                if(!$xx){

                    $newShares = $stockID . '-' .  $number;
                    unset($stocks[$xx]);
                    $stocks[] = $newShares;
                    break;
                } 
                else {
                    //  get the index of the stocks ... 
                    $currentShares = explode('-', $stocks[$xx]);
                    unset($stocks[$xx]);
                    $stocks[$xx] = $stockID . '-' . ($currentShares[1] + $number);
                    break;
                }
            }
        
        }

        


        
    }

    

    $query = 'UPDATE users SET stocks="' . implode('/', $stocks) . '" WHERE id = "' . $user['id'] . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    // var_dump($stocks);
    return $result;
}






function updateStockSell($userEmail, $stocks)
{
    $user = getUserByEmail($userEmail);

    $query = 'UPDATE users SET stocks="' . implode('/', $stocks) . '" WHERE id = "' . $user['id'] . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}


function updateUserBalance($userEmail, $balance)
{
    $user = getUserByEmail($userEmail);

    $query = 'UPDATE users SET balance="' . $balance . '" WHERE id = "' . $user['id'] . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}



function getUserByEmail($email)
{
    $query = "SELECT * FROM users WHERE email='" . $email . "'";
    $result = mysqli_query($GLOBALS['connection'], $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $user['id'] = $row['id'];
            $user['username'] = $row['username'];
            $user['phone'] = $row['phone'];
            $user['email'] = $row['email'];
            $user['address'] = $row['address'];
            $user['password'] = $row['password'];
            $user['watchlist'] = $row['watchlist'];
            $user['stocks'] = $row['stocks'];
            $user['balance'] = $row['balance'];

            return $user;
        }
    }

    return FALSE;
}




function getUserById($id)
{
    $query = "SELECT * FROM users WHERE id='" . $id . "'";
    $result = mysqli_query($GLOBALS['connection'], $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $user['id'] = $row['id'];
            $user['username'] = $row['username'];
            $user['phone'] = $row['phone'];
            $user['email'] = $row['email'];
            $user['address'] = $row['address'];
            $user['password'] = $row['password'];
            $user['watchlist'] = $row['watchlist'];
            $user['stocks'] = $row['stocks'];
            $user['balance'] = $row['balance'];

            return $user;
        }
    }

    return FALSE;
}

function updateUser($phone, $email, $address, $password, $id)
{

    $query = 'UPDATE users SET phone="' . $phone . '",email="' . $email .
        '", address="' . $address . '", password="' .
        $password . '" WHERE id = "' . $id . '"';

    $result = mysqli_query($GLOBALS['connection'], $query);
    return $result;
}


function loginOrganization($email, $password)
{
    $organizations = getOrgs();

    foreach ($organizations as $organization) {
        if ($organization['email'] == $email && $organization['password'] == $password) {
            return TRUE;
        }
    }

    return FALSE;
}








function orgIsRegistered($email)
{
    $query = "SELECT * FROM organizations WHERE email='" . $email . "'";
    $result = mysqli_query($GLOBALS['connection'], $query);


    if (mysqli_num_rows($result) > 0) {

        return TRUE;
    }

    return FALSE;
}

function orgIsVerified($email)
{
    $query = "SELECT * FROM organizations WHERE email='" . $email . "'";
    $result = mysqli_query($GLOBALS['connection'], $query);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $org['status'] = $row['status'];

            return ($org['status'] != "" ? true : false);
        }
    }

    return false;
}

// var_dump($$GLOBALS['connection']);
function registerOrganization($org_name, $phone, $email, $address, $site_url, $password)
{
    $email = mysqli_real_escape_string($GLOBALS['connection'], $email);
    $address = mysqli_real_escape_string($GLOBALS['connection'], $address);

    

    $query = "INSERT INTO organizations (org_name,phone,email,address,site_url,password)
    values ('{$org_name}','{$phone}','{$email}','{$address}','{$site_url}','{$password}')";

    $result = mysqli_query($GLOBALS['connection'], $query) or die(mysqli_error($GLOBALS['connection']));

    var_dump( mysqli_query($GLOBALS['connection'], $query));

//    console_log($view_variable);

    

    $id = mysqli_insert_id($GLOBALS['connection']);

    return $id;
}



// add transaction function
function addTransaction($userId, $stockId, $volume, $stock_price, $reason, $amount)
{
    $email = mysqli_real_escape_string($GLOBALS['connection'], $email);
    $address = mysqli_real_escape_string($GLOBALS['connection'], $address);


    $query = "INSERT INTO transactions (userId,stockId,volume,stock_price,reason,amount)
    values ('{$userId}','{$stockId}','{$volume}','{$stock_price}','{$reason}','{$amount}')";

    $result = mysqli_query($GLOBALS['connection'], $query) or die(mysqli_error($GLOBALS['connection']));
    
    return $result;
}

function getTransactionByUserId($userId)
{
    $query = "SELECT * FROM transactions WHERE userId='" . $userId . "'" ;
    $result = mysqli_query($GLOBALS['connection'], $query);
    $transactions = [];

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $transaction['id'] = $row['id'];
            $transaction['date'] = $row['date'];
            $transaction['userId'] = $row['userId'];
            $transaction['stockId'] = $row['stockId'];
            $transaction['volume'] = $row['volume'];
            $transaction['stock_price'] = $row['stock_price'];
            $transaction['reason'] = $row['reason'];
            $transaction['amount'] = $row['amount'];
            

            $transactions[] = $transaction;
        }
    }

    return $transactions;
}



function loginUser($email, $password)
{
    $users = getUsers();

    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            return TRUE;
        }
    }

    return FALSE;
}


function getUsers()
{
    $query = "SELECT * FROM users";
    $result = mysqli_query($GLOBALS['connection'], $query);
    $users = [];

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $user['id'] = $row['id'];
            $user['username'] = $row['username'];
            $user['type'] = $row['type'];
            $user['phone'] = $row['phone'];
            $user['email'] = $row['email'];
            $user['address'] = $row['address'];
            $user['password'] = $row['password'];

            $users[] = $user;
        }
    }

    return $users;
}
