<?php namespace Dondo\SystemManagement\Models;

use Model;

/**
 * Model
 */
class Address extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dondo_systemmanagement_address';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'product' => [\Dondo\SystemManagement\Models\Product::class]
    ];
    public $fillable = [
        'street',
        'house_num',
        'city',
        'psc',
        'note',
        'product_id',
    ];
}
