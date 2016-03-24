<?php
namespace App\Models\ConfigBackend;
use Illuminate\Database\Eloquent\Model;
class NavBackend extends Model
{
	protected $table = 'nav_backend';
    protected $primaryKey = 'ID';
    
    public function scopeListItem(){
    	 return $this->Publish()->orderBy('position','ASC')->get();
    }
    public function scopePublish() {
        return $this->where('status','1');
    }
    
}	