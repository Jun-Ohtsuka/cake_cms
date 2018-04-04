<?php
namespace App\Controller;

use App\Controller\AppController;

class HomeController extends AppController
{
  public function index(){
    $userName = $this->Auth->user('name');
    if(!empty($userName)){
      return $this->redirect(['action' => '../articles/index']);
    }

    return $this->redirect(['action' => '../users/login']);
  }
}
