<?php

namespace app\controllers;

use app\models\User;
use RedBeanPHP\R;

class UserController extends AppController
{
  public function signupAction()
  {
    if(!empty($_POST))
    {
      $user = new User();
      $data = $_POST;
      $user->load($data);
      if(!$user->validate($data) OR !$user->checkUnique())
      {
        $user->getErrors();
        $_SESSION['form_data'] = $data;
      }
      else
      {
        $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
        if($user->save('user'))
        {
          $_SESSION['success'] = 'Successful sign up';
          redirect('/user/login');
        }
        else
        {
          $_SESSION['error'] = 'Sign up failed';
        }
      }
      redirect();
    }
    $this->setMeta('Create account');
  }

  public function loginAction()
  {
    if(!empty($_SESSION['user'])) redirect('/');
    if(!empty($_POST))
    {
      $user = new User();
      if($user->login())
      {
        $_SESSION['success'] = 'Successful authorization';
      }
      else
      {
        $_SESSION['error'] = 'Incorrect username or password';
      }
      redirect();
    }
    $this->setMeta('Login');
  }

  public function logoutAction()
  {
    if(isset($_SESSION['user'])) unset($_SESSION['user']);
    redirect();
  }

  public function ordersAction()
  {
    if(isset($_SESSION['user']))
    {
      $orders = R::getAll("SELECT * FROM `order` WHERE user_id = ?", [$_SESSION['user']['id']]);
      foreach ($orders as $k => $order)
      {
        $order_product[$order['id']] = R::getAll("SELECT * FROM order_product WHERE order_id = {$order['id']}");
      }
      $this->setMeta('My orders');
      $this->set(compact('orders', 'order_product'));
    }
    else
    {
      redirect('/');
    }
  }
}