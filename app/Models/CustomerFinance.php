<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CustomerFinance extends Model{

    /**
     * The name of table in DB
     *
     * @var string
     */
    protected $table = 'customer_finance';

    /**
     * Get user info from UserFinance class
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function Customer() {
        return $this->belongsTo('App\Models\Customer', 'id');
    }

} 