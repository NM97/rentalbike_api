<?php namespace NatanielMarmucki\Rentalbike\Models;

use Model;

/**
 * Model
 */
class ToDo extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $belongsTo = [
        //'bike' => 'natanielmarmucki\rentalbike\models\bike',
        //'user_id' => 'RainLab\User\Models\User'
   ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'natanielmarmucki_rentalbike_todo';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
