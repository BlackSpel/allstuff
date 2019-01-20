<?php

namespace app\models;

use RedBeanPHP\R;

class User extends AppModel
{
  public $attributes =
  [
    'login' => '',
    'password' => '',
    'email' => '',
    'country' => '',
    'firstname' => '',
    'lastname' => '',
    'streetaddress' => '',
    'city' => '',
    'state' => '',
    'zipcode' => '',
    'phone' => '',
  ];

  public $rules =
  [
    'required' =>
    [
      ['login'],
      ['password'],
      ['email'],
      ['country'],
      ['firstname'],
      ['lastname'],
      ['streetaddress'],
      ['city'],
      ['zipcode'],
      ['phone'],
    ],
    'email' =>
    [
      ['email'],
    ],
    'lengthMin' =>
    [
      ['password', 6],
      ['login', 3],
    ]
  ];

  public function checkUnique()
  {
    $user = R::findOne('user', 'login = ? OR email = ?', [$this->attributes['login'], $this->attributes['email']]);
    if($user)
    {
      if($user->login == $this->attributes['login'])
      {
        $this->errors['unique'][] = 'This login is already taken';
      }
      if($user->email == $this->attributes['email'])
      {
        $this->errors['unique'][] = 'This email is already taken';
      }
      return false;
    }
    return true;
  }

  public function login($isAdmin = false)
  {
    $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
    $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
    if($login AND $password)
    {
      if($isAdmin)
      {
        $user = R::findOne('user', "login = ? AND role = 'admin'", [$login]);
      }
      else
      {
        $user = R::findOne('user', "login = ?", [$login]);
      }
      if($user)
      {
        if(password_verify($password, $user->password))
        {
          foreach ($user as $k => $v)
          {
            if($k != 'password') $_SESSION['user'][$k] = $v;
          }
          return true;
        }
      }
    }
    return false;
  }

  public static function checkAuth()
  {
    return isset($_SESSION['user']);
  }

  public static function isAdmin()
  {
    return (isset($_SESSION['user']) AND $_SESSION['user']['role'] == 'admin');
  }
}