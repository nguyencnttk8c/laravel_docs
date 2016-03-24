<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Document  extends Model{

    /**
     * The name of table in DB
     *
     * @var string
     */
    protected $table = 'document';

    /**
     * Get meta info of doc
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function DocMeta() {
        return $this->hasOne('App\DocMeta', 'doc_id');
    }

    /**
     * Get list keywords of a doc
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function DocKeywords () {
        return $this->hasMany('App\DocKeywords', 'doc_id');
    }

    /**
     * Get author of doc
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function User() {
        return $this->belongsTo('App\User', 'id', 'author');
    }


} 