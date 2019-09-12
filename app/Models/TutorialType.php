<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Le type du tutoriel correspond à un type "Gratuit" ou "Premium".
 * Class TutorialType
 * @package App\Models
 */
class TutorialType extends Model
{

    protected $table = 'tutorial_types';
    public $timestamps = false;
    protected $guarded = [];
}
