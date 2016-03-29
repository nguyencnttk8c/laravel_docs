<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Taxonomy extends Model
{
	protected $table = 'taxonomy';

    protected $primaryKey = 'id';

    public function scopeTaxName($query,$id){
    	
    	if($id){
    		return $query->find($id)->tax_name;
    	}else{
    		return 'Root';
    	}
    }
    
}	