<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
* Check component
*/
class CheckComponent extends Component
{

    /**
     * Default configuration.
    *
    * @var array
    */
    protected $_defaultConfig = [];
    public $components = ['Auth'];

    public function initialize(array $config)
    {
        $this->controller = $this->_registry->getController();
    }

    public function checkLogin($name){
    //    $name = $this->Controller->user('name');
        if(empty($name)){
        return $this->controller->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    function multiexplode ($delimiters,$string) {
        
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
}
