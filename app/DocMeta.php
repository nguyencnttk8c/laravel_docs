<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class DocMeta extends Model{

    /**
     * The name of table in DB
     *
     * @var string
     */
    protected $table = 'doc_meta';

    /**
     * Get doc info
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Document() {
        return $this->belongsTo('App\Document', 'doc_id');
    }


} 