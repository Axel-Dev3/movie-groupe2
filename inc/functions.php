<?php

function debug (array $tab){
  echo '<pre>';
  echo print_r($tab);
  echo '<pre>';
}
function imageMovie($movie)
{
    return '<img src="posters/' .$movie['id']. '.jpg" alt="' .$movie['title'].'">';
}
function cleanXss(string $key)
{
    return trim(strip_tags($_POST[$key]));
}
function getValue($key,$data = null){
    if(!empty($_POST[$key])) {
        return $_POST[$key];
    } else {
        if(!empty($data)) {
            return $data;
        }
    }
    return '';
}
function getError($errors,$key){
    return (!empty($errors[$key])) ? $errors[$key] : '';
}
// Validation formulaire
function validText($errors,$data,$key,$min =2,$max = 50)
{
    if(!empty($data)) {
        if(mb_strlen($data) < $min) {
            $errors[$key] = 'min '.$min.' caractères';
        } elseif(mb_strlen($data) > $max) {
            $errors[$key] = 'max '.$max.' caractères';
        }
    } else {
        $errors[$key] = 'Veuillez renseigner ce champ';
    }
    return $errors;
}
function validEmail($errors,$data,$key)
{
    if(!empty($data)) {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            $errors[$key] = 'Veuillez renseigner un email valide';
        }
    } else{
        $errors[$key] = 'Veuillez renseigner un email';
    }
    return $errors;
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function isLogged()
{
    if(!empty($_SESSION['user'])) {
        if(!empty($_SESSION['user']['id'])) {
            if(!empty($_SESSION['user']['pseudo'])) {
                if(!empty($_SESSION['user']['email'])) {
                    if(!empty($_SESSION['user']['role'])) {
                        if(!empty($_SESSION['user']['ip'])) {
                            if($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
}
function isAdmin()
{
    if(isLogged())  {
        if($_SESSION['user']['role'] == "admin") {
            return true;
        }
    }
    return false;
}
