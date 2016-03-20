<?php 
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider {

   /**
    * Bootstrap the application services.
    *
    * @return void
    */
   public function boot()
   {
      //
   }

   /**
    * Register the application services.
    *
    * @return void
    */
   public function register()
   {
    $this->listFolderFiles(app_path().'/Helpers');
   }

  function listFolderFiles($dir){
      $ffs = scandir($dir);
      foreach($ffs as $ff){
          if($ff != '.' && $ff != '..'){
              if(strpos($ff,'.php')){
                $file = $dir.'/'.$ff;
                require_once($file);
              }else if(is_dir($dir.'/'.$ff)){
                 $this->listFolderFiles($dir.'/'.$ff);
              }
          }
      }
  }


}