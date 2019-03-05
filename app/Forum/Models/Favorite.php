<?php
/**
 * Created by PhpStorm.
 * User: clablancherie
 * Date: 04/03/2019
 * Time: 14:28
 */

namespace App\Forum\Models;

use App\Forum\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

    use RecordsActivity;

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Fetch the model that was favorited.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function favorited() {
        return $this->morphTo();
    }
}
