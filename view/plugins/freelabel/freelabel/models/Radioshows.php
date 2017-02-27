<?php namespace Freelabel\Freelabel\Models;

use Model;

/**
 * Model
 */
class Radioshows extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'freelabel_freelabel_radioshows';


    /* RELATIONS */

    public $attachMany = [
        'radioshows' => 'System\Models\File'
    ];

}