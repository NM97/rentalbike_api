<?php namespace NatanielMarmucki\Rentalbike\Models;

use Model;

/**
 * Model
 */
class Reservation extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $belongsTo = [
         //'bike' => 'natanielmarmucki\rentalbike\models\bike',
         'user' => 'RainLab\User\Models\User'
    ];

    public $belongsToMany= [
        'bikes' => [
            'NatanielMarmucki\Rentalbike\Models\bike',
            'table' => 'natanielmarmucki_rentalbike_bike_reservations',
            'order' => 'name'
        ]
    ];
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'natanielmarmucki_rentalbike_reservations';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
