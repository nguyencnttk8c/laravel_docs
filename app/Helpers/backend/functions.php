<?php
namespace App\Helpes\Backend;
class Functions{



    /**
     *
     * Append array param $_GET link to Paginate
     *
     * @param unsets field in data $_GET
     * @return array param append
     *
     */

    public static function appendToPaginate($unsets = array()){
        $params = $_GET;

        $appends = array();
        if($unsets){
            foreach($unsets as $item){
                unset($params[$item]);
            }
        }

        if($params){
            foreach($params as $key=>$val){
                if($val!=''){
                    $appends[$key] = $val;
                }

            }
        }

        return $appends;
    }

    public static function showDataSetup($params){

        extract($params);

        $appends = array();
        if(isset($_GET['date'])){
            $orderBy = array('ID'=>$_GET['date']);
        }else{
            if(isset($orderBy)){
                $orderBy = $orderBy;
            }else{
                $orderBy = array('ID'=>'desc');
            }
        }
        (isset($relationships) && ($relationships))?$relationships = $relationships:$relationships = '';
        (isset($multi) && ($multi))?$multi = $multi:$multi = '';
        (isset($filters) && ($filters))?$filters = $filters:$filters = '';
        $results = self::search($table,$filters,array('search','item_per_page','page','date'),$orderBy,$relationships,$multi,(isset($per_page)?$per_page:''));
      
        $appends = self::appendToPaginate(array('page'));
        $results->appends($appends);
        //check button remove filters
        if($_GET){
            $data['search'] = true;
        }
        //set url pagination
        $results->setPath($url);
        $data['results'] = $results;
        if(isset($_GET['item_per_page']) && ($_GET['item_per_page'])){
            $item_per_page = $_GET['item_per_page'];
        }else{
            if(isset($per_page)){
                $item_per_page = $per_page;
            }else{
                $item_per_page = 10;
            }
        }
        $current_page = $data['results']->currentPage();
        //Displaying start - end of Results 
        $data['display'] = self::displaySearchCounter($current_page,$item_per_page,$data['results']->total());
        return $data;
    }


    /**
     *
     * Process search form
     *
     * @param table name,filters add more, unsets field in filters, order by
     * @return object results
     *
     */
    public static function search($table ='',$filters = array(),$unsets = array(),$oderby = array(),$relationships = array(),$multi_Relations = '',$per_page=''){
        if(isset($_GET['item_per_page']) && ($_GET['item_per_page'])){
            $item_per_page = $_GET['item_per_page'];
        }else{
            if($per_page){
                $item_per_page = $per_page;
            }else{
                $item_per_page = 10;
            }
        }
        $add = array();
        if(isset($_GET['search'])){

            $params = array();
            if($filters){
                foreach($filters as $key=>$val){
                    if(isset($val)){
                        $add[$key]=$val;
                    }
                }
            }
            $params = array_merge($add,$_GET);
            if($params){
                $params = array_filter($params,array(new \App\Helpes\Backend\Functions,"RemoveFalseButNotZero"));
                if($unsets){
                    $unsets = array_merge($oderby,$unsets);
                    foreach($unsets as $item){
                        unset($params[$item]);
                    }
                }
                $count = 0;
                if($table && $params){
                    if($relationships){
                        $keyRelationships = array_keys($relationships);
                        $isRelationships = false;
                        $idRelationships = [];
                        foreach($keyRelationships as $item){
                            if(array_key_exists($item, $params)){
                                $isRelationships = true;
                                $idRelationships[$item] = $params[$item];
                            }
                        }
                        $paramOld = $params;
                        if($relationships && $isRelationships){

                            $params = array_diff_key($params,$relationships);

                            if(count($idRelationships) > 1){
                                $tablename = array_shift($relationships)['table'];
                                $table = $tablename::$multi_Relations(array_values($idRelationships));
                            }else if(count($idRelationships) == 1){
                                $key = '';
                                foreach($keyRelationships as $item){
                                    if(array_key_exists($item, $paramOld)){
                                        $key = $item;
                                    }
                                }
                                $tablename = $relationships[$key]['table'];
                                $table = $tablename::$relationships[$key]['functions']($paramOld[$key]);
                            }else{
                                $table = $table;
                            }
                        }
                    }

                    if($params){
                        if(isset($params['trading_date|from']) && !isset($params['trading_date|to'])){
                            $val = $params['trading_date|from'];
                            $data = $table->whereBetween('trading_date',[$val,date('Y-m-d')]);
                            unset($params['trading_date|from']);
                        }
                        if(isset($params['trading_date|from']) && isset($params['trading_date|to'])){
                            $data = $table->whereBetween('trading_date',[$params['trading_date|from'],$params['trading_date|to']]);
                            unset($params['trading_date|from']);
                            unset($params['trading_date|to']);

                        }
                        foreach($params as $key=>$val){
                            $val = str_replace('&', '&amp;', $val);
                            $count++;
                            if($count==1){
                                if($key == 'term_name' || $key == 'term_name_ar' || $key == 'title' || $key == 'en' || $key == 'title_ar'){
                                    $data = $table->where($key,'like','%'.$val.'%');//->orWhere(($key!='en')?$key.'_ar':'ar','like','%'.$val.'%');
                                }else if($val == '!='){
                                    $data = $table->where($key,'!=',0);
                                }else{
                                    $data = $table->where($key,$val);
                                }
                            }else{
                                if($key == 'term_name' || $key == 'term_name_ar' || $key == 'title' || $key == 'en' || $key == 'title_ar'){
                                    $data->where($key,'like','%'.$val.'%');
                                }else if($val == '!='){
                                    $data->where($key,'!=',0);
                                }else{
                                    $data->where($key,$val);
                                }
                            }
                        }
                    }else{
                        $data = $table;
                    }

                }else{
                    $data = $table;
                }
                if($oderby){
                    $count = 0;
                    foreach($oderby as $key=>$val){
                        $count++;
                        if($count==1){
                            $soft = $data->orderBy($key,$val);
                        }else{
                            $soft->orderBy($key,$val);
                        }
                    }
                }else{
                    $soft = $data->orderBy('ID','desc');
                }
                return $soft->paginate($item_per_page);
            }
        }else{
            if($filters){
                $count = 0;
                foreach($filters as $key=>$val){
                    $count++;
                    if($count==1){
                        if($val == '!='){
                            $data = $table->Where("$key",'!=',"0");
                        }else{
                            $data = $table->where("$key","$val");
                        }
                    }else{
                        if($val == '!='){
                            $data->Where("$key",'!=',"0");
                        }else{
                            $data->where("$key","$val");
                        }
                    }

                }
            }else{
                $data = $table;
            }
         
            if($oderby){
                $count = 0;
                foreach($oderby as $key=>$val){
                    $count++;
                    if($count==1){
                        $soft = $data->orderBy($key,$val);
                    }else{
                        $soft->orderBy($key,$val);
                    }
                }
            }else{
                $soft = $data->orderBy('ID','desc');
            }
            return $soft->paginate($item_per_page);
        }
    }
    
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

    public function RemoveFalseButNotZero($value) {
        return ($value || is_numeric($value));
    }
}