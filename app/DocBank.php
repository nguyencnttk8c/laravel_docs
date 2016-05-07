<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class DocBank extends Model{
    /**
     * The name of table in DB
     *
     * @var string
     */
    protected $table = 'bank';

    public function User() {
        return $this->hasOne('App\User', 'id');
    }
} 