<?php namespace NatanielMarmucki\Rentalbike\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Reservations extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('NatanielMarmucki.Rentalbike', 'main-menu-item', 'side-menu-item3');
    }
}
