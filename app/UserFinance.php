<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class UserFinance extends Model{

    /**
     * The name of table in DB
     *
     * @var string
     */
    protected $table = 'user_finance';

    /**
     * Get user info from UserFinance class
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function User() {
        return $this->belongsTo('App\User', 'id');
    }

} 