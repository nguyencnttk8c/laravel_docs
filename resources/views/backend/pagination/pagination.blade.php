<?php
if ($paginator->lastPage() > 1){
$current_page = $paginator->currentPage();
if(isset($_GET['item_per_page']) || isset($_GET['per_page'])){
    if(isset($_GET['per_page'])) {
        $item_per_page = $_GET['per_page'];
    }else {
        $item_per_page = $_GET['item_per_page'];
    }
}else{
    if(Route::getCurrentRoute()->geturi() == 'en/backend/vehicle') {
        $item_per_page = 50;
    } else {
        $item_per_page = 10;
    }
}

$total =  ceil($paginator->total()/$item_per_page);

$lang = App::getLocale();

if ($lang == 'ar') {
  $direction = '1';
} else {
  $direction = '';  
}

  // input $current_page, $total
  $url = $_SERVER["REQUEST_URI"];

  $width = 2;
  echo '<ul class="site-pager">';
  if($current_page > 1){
    if ($direction) {
      echo '<li class="hidden-xs"><a href="'.urldecode($paginator->url($current_page-1)).'"><i class="fa fa-chevron-right"></i>'.'</a></li>';
      echo '<li class="show-in-mobile visible-xs"><a href="'.urldecode($paginator->url($current_page-1)).'"><span class="red submit padding-25 show-in-mobile">'.trans('frontend.prev').'</span>'.'</a></li>';
    } else {
      echo '<li class="hidden-xs"><a href="'.urldecode($paginator->url($current_page-1)).'"><i class="fa fa-chevron-left"></i>'.'</a></li>';
      echo '<li class="show-in-mobile visible-xs"><a href="'.urldecode($paginator->url($current_page-1)).'"><span class="red submit padding-25 show-in-mobile">'.trans('frontend.prev').'</span>'.'</a></li>';
    }
  }
  if($current_page - $width > 3) {

    for ($i = 1; $i < 3 ; $i++) {  
      if($i == $current_page){
        echo '<li class="active"><span class="page-numbers current show-in-mobile">'. trans('frontend.page') .' </span><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
      } else {
        echo '<li class="hidden-xs"><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
      }
    }
    echo '<li class="hidden-xs">...</li>';
  } else {
    $tt0 = ($current_page - $width <= 1) ? 1: $current_page - $width -1;
    for ($i = 1; $i <= $tt0; $i++){
      if($i == $current_page){
        echo '<li class="active"><span class="page-numbers current show-in-mobile visible-xs">'. trans('frontend.page') .' </span><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
      } else {
        echo '<li class="hidden-xs"><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
      }
    }
  }
  $tt1 = ($current_page - $width > 2) ? $current_page - $width: 2;
  $tt2 = ($current_page + $width > $total) ? $total: $current_page + $width;
  for($i = $tt1; $i<=$tt2; $i++){
    if($i == $current_page){
      echo '<li class="active"><span class="page-numbers current show-in-mobile visible-xs">'. trans('frontend.page') .' </span><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
    } else {
      echo '<li class="hidden-xs"><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
    }
  }
  if($current_page + $width < $total -2){
    echo '<li class="hidden-xs">...</li>';
    for($i = $total-1; $i<=$total; $i++){
      if($i == $current_page){
        echo '<li class="active"><span class="page-numbers current show-in-mobile visible-xs">'. trans('frontend.page') .' </span><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
      } else {
        echo '<li class="hidden-xs"><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
      }
    }
  } else {
    for($i=$current_page + $width + 1; $i<=$total; $i++){
      if($i == $current_page){
        echo '<li class="active"><span class="page-numbers current show-in-mobile visible-xs">'. trans('frontend.page') .' </span><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
      } else {
        echo '<li class="hidden-xs"><a href="'.urldecode($paginator->url($i)).'">'.$i.'</a></li>';
      }
    }
  }
  if($current_page < $total){
    if ($direction) {
      echo '<li class="hidden-xs"><a href="'.urldecode($paginator->url($current_page+1)).'">'.'<i class="fa fa-chevron-left"></i>'.'</a></li>';
      echo '<li class="show-in-mobile visible-xs"><a href="'.urldecode($paginator->url($current_page+1)).'"><span class="red submit padding-25 show-in-mobile visible-xs">'.trans('frontend.next').'</span></a></li>';
    } else {
      echo '<li class="hidden-xs"><a href="'.urldecode($paginator->url($current_page+1)).'">'.'<i class="fa fa-chevron-right"></i>'.'</a></li>';
      echo '<li class="show-in-mobile visible-xs"><a href="'.urldecode($paginator->url($current_page+1)).'"><span class="red submit padding-25 show-in-mobile visible-xs">'.trans('frontend.next').'</span></a></li>';
    }
  }
  echo '</ul>';
  }
  ?>

