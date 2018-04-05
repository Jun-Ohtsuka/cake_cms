<?php
namespace App\Controller;

use App\Controller\AppController;

class HomeController extends AppController
{
  public function index(){
    $this->loadComponent('Check');
    // $this->Check->checkLogin($this->Auth->user('name'));
    // $name = $this->Auth->user('name');
    // if(!empty($name)){
    //   return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
    // }
    //
    // return $this->redirect(['controller' => 'Users', 'action' => 'login']);
  }
}
