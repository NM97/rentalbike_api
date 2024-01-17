<?php namespace NatanielMarmucki\Rentalbike\Models;

use Model;

/**
 * Model
 */
class Bike extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /* Relations */

    public $belongsToMany= [
        'locations' => [
            'NatanielMarmucki\Rentalbike\Models\Location',
            'table' => 'natanielmarmucki_rentalbike_bikes_locations',
            'order' => 'name'
        ],
        'reservations' => [
            'NatanielMarmucki\Rentalbike\Models\reservation',
            'table' => 'natanielmarmucki_rentalbike_bike_reservations',
            'order' => 'pickup'
        ],
        'types' => [
            'NatanielMarmucki\Rentalbike\Models\Type',
            'table' => 'natanielmarmucki_rentalbike_bike_types',
            'order' => 'name'
        ]
    ];

    public $attachOne = [
        'image' => 'System\Models\File'
    ];
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'natanielmarmucki_rentalbike_bikes';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
