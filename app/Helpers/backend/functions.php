<?php
namespace App\Helpes\Backend;
class Functions{
    
    public static function displaySearchCounter($current_page = '', $item_per_page = '' , $total_page = ''){
        if($current_page>1){
            $start = ($current_page -1 ) * $item_per_page + 1;
            if($item_per_page * $current_page > $total_page){
                $end = $total_page;
            }else{
                $end = $item_per_page * $current_page;
            }
        }else{
            if($item_per_page * $current_page > $total_page){
                $end = $total_page;
            }else{
                $end = $item_per_page * $current_page;
            }
            if($total_page){
                $start = 1;
            }else{
                $start = 0;
            }

        }
        return $start.' - '. $end;
    }

	public static function IUD($params){
        extract($params);
        if($status){
            if($status == 'insert' && $datas && $table){
                (isset($datas['password']))?$datas['password'] = bcrypt($datas['password']):NULL;
                foreach($datas as $name=>$value){
                    $table->$name = $value;
                }
                $table->save();
                $the_id = $table->id;
                if(!$the_id){
                    $the_id = $table->ID;
                }
            }else if($status == 'update' && $datas && $table){
                if (isset($datas['password']) && $datas['password']) {
                    $datas['password'] = bcrypt($datas['password']);
                } else {
                    unset( $datas['password']);
                }
                if(isset($where)){
                    $where = $where;
                }else{
                    $where  = 'id';
                }
                $row = $table::where($where,$id)->update($datas);
                $the_id = $id;
            }else{
                $the_id = '';
            }
           
        }
      
        return $the_id;
    }
}