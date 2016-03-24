<?php
$ListItems = \App\Models\ConfigBackend\NavBackend::ListItem();
$menuData = [];
foreach($ListItems as $value){
    $menuData['items'][$value->ID] = $value;
    $menuData['parent'][$value->parent][] = $value->ID;

 }
 function multiLevel($value,$menuData){
 	$html = '';
 	$currentRoute = \Request::route()->getName();
 	$routes = [];
	foreach($menuData['parent'][$value] as $child){
        $routes[] = $menuData['items'][$child]->route;
    } 
	$html.= "<li class=\"".((in_array($currentRoute,$routes))?'open':NULL)."\">
        <a href=\"#\" class=\"dropdown-toggle\">
            <i class=\"menu-icon fa ".$menuData['items'][$value]->icon."\"></i>
            <span class=\"menu-text\"> ".$menuData['items'][$value]->title."</span>
            <b class=\"arrow fa fa-angle-down\"></b>
        </a>
        <b class=\"arrow\"></b>
        <ul class=\"submenu\">";
        foreach($menuData['parent'][$value] as $child){
            if(isset($menuData['parent'][$child])){    
            	$html .= multiLevel($child,$menuData);
            }else{
            	$html.= "<li class=\"".(($currentRoute == $menuData['items'][$child]->route)?'active':NULL)."\">
                <a href=\"".asset($menuData['items'][$child]->link)."\">
                    <i class=\"menu-icon fa ".$menuData['items'][$child]->icon."\"></i>
                    <span class=\"menu-text\"> ".$menuData['items'][$child]->title." </span>
                </a>
                <b class=\"arrow\"></b>"; 
            }	
            $html .= "</li>";
    	}     
	$html.= "</ul>
	</li>";
	return $html;
 }
function rederHtml($parent,$menuData){
        $html="";
        if(isset($menuData['parent'][$parent])){
            foreach($menuData['parent'][$parent] as $value){
                $currentRoute = \Request::route()->getName();
                if(isset($menuData['parent'][$value])){
                	$html.= multiLevel($value,$menuData);
                }else{
                    $html.= "<li class=\"".(($currentRoute == $menuData['items'][$value]->route)?'active':NULL)."\">
                        <a href=\"".asset($menuData['items'][$value]->link)."\">
                            <i class=\"menu-icon fa ".$menuData['items'][$value]->icon."\"></i>
                            <span class=\"menu-text\"> ".$menuData['items'][$value]->title." </span>
                        </a>
                        <b class=\"arrow\"></b>
                    </li>";
                }
            }
        }
        return $html;
}
?>
<ul class="nav nav-list">
    {!!rederHtml(0,$menuData)!!};
</ul><!-- /.nav-list -->