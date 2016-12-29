<?php namespace Freelabel\Freelabel\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Script extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend\Behaviors\ReorderController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Freelabel.Freelabel', 'main-menu-item', 'script-menu-item');
    }
}