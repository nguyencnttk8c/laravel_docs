<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Add birth day to date format
     *
     * @var array
     */
    protected $dates = ['birth_day'];
    /**
     * The name of table in DB
     * @var string
     */
    protected $table = 'users';

    /**
     * Get the finance information of user from User class
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function UserFinance() {
        return $this->hasOne('App\UserFinance', 'user_id');
    }

    /**
     * Get the documents of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Document(){
        return $this->hasMany('App\Document', 'author');
    }

    /**
     * Convert to format in DB
     *
     * @param $value
     */

    public function setBirthDayAttribute($value) {
        $this->attributes['birth_day'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
    /**
     * Return birth day in the format
     * @param $value
     * @return string
     */
    public function getBirthDayAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

}
