<?php
namespace Helpers\Common;

use App\Models\Taxonomy;
use App\Document, App\DocMeta;

class Functions {

    public static function fileUploadInput() {
        ob_start();
        ?>
        <link rel="stylesheet"  type="text/css" href="<?php echo asset('common/css/dropzone.css'); ?>" >
        <script type="text/javascript" src="<?php echo asset('common/js/dropzone.js'); ?>"></script>
        <div class="dropzone" id="dropzoneFileUpload"></div>
        <script type="text/javascript">
            var baseUrl = "<?php echo url('/'); ?>";
            var token = "<?php echo \Session::getToken(); ?>";
            Dropzone.autoDiscover = false;
            Dropzone.options.dropzoneFileUpload = {
                paramName           :       "file", // The name that will be used to transfer the file
                maxFilesize         :       100, // MB
                dictDefaultMessage  :       "Tải lên từ máy tính",
                thumbnailWidth      :       "300",
                thumbnailHeight     :       "300",
                accept              :       function(file, done) { done() },
                init:function(){
                    var self = this;
                    // config
                    self.options.addRemoveLinks = true;
                    self.options.dictRemoveFile = "Xóa";
                    //New file added
                    self.on("addedfile", function (file) {
                        //console.log('new file added ', file);
                    });
                    // Send file starts
                    self.on("sending", function (file) {
                        //$('.meter').show();
                    });

                    // File upload Progress
                    self.on("totaluploadprogress", function (progress) {
                        //$('.roller').width(progress + '%');
                    });

                    self.on("queuecomplete", function (progress) {
                        //$('.meter').delay(999).slideUp(999);
                    });

                    // File upload success
                    self.on('success', function(file, json) {
                        if (json == 'exist') {

                        } else {
                            $("#document_id").val(json.id);
                            $("#document_title").val(json.title);
                        }
                    });

                    // On removing file
                    self.on("removedfile", function (file) {
                        $.ajax({
                            url: baseUrl+"/dropzone/deleteFiles",
                            method : 'POST',
                            data : {
                                _token: token,
                                file : file.name
                            },
                            success: function(result){
                                $("#document_id").val('');
                                $("#document_title").val('');
                            }
                        });
                    });

                }
            };
            var myDropzone = new Dropzone("div#dropzoneFileUpload", {
                url: baseUrl+"/dropzone/uploadFiles",
                params: {
                    _token: token
                }
            });
        </script>
        <style>
            .dropzone .dz-preview .dz-progress .dz-upload {background:linear-gradient(to bottom, #28C760, #28C760)}
        </style>
    <?php
        return ob_get_clean();
    }

    public static function getAllTaxonomy() {
        $cats = Taxonomy::all();

        if (count($cats) == 0) {
            return false;
        } else {
            return $cats;
        }
    }

    public static function makeMenu($data, $id) {
        $check = false;
        foreach ($data as $cat) {
            if ($cat->parent == $id) {
                $check = true;
                break;
            }
        }

        if ($check) {
            echo '<ul class="dropdown-menu theme_nav_dropdown">';

            foreach ($data as $cat) {
                if ($cat->parent == $id) {
                    echo '<li><a href="'.URL('/').'/danh-muc/'.$cat->slug.'">'.$cat->tax_name.'</a>';
                    self::makeMenu($data, $cat->id); 
                    echo '</li>';
                }
            }

            echo '</ul>';
        }
    }

    public static function getMenu () {
        $cats = self::getAllTaxonomy();
        
        if ($cats) {
    ?>
            <div class="col-md-3 col-sx-4">
                <div class="well">
                    <h3 class="titel">Danh mục tài liệu</h3>
                    <div class="listcategory" >
                        <ul class="listParentCate">
                        <?php
                            foreach ($cats as $cat) {
                                if ($cat->parent == 0) {
                        ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" title="<?php echo $cat->tax_name; ?>" data-toggle="dropdown"><?php echo $cat->tax_name; ?></a>
                                        <?php echo self::makeMenu($cats, $cat->id) ?>
                                    </li>
                        <?php
                                }
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
    <?php
        }
    }

    public static function getGeneralDoc() {
        $allTaxonomy = Taxonomy::all();

        // Lấy tài liệu thuộc danh mục giáo dục - đào tạo

        $gddt = Taxonomy::where('slug', 'giao-duc-dao-tao')->first();

        if ($gddt) {
            $listID = array($gddt->id);

            foreach ($allTaxonomy as $item) {
                if (in_array($item->parent, $listID)) {
                    $listID[] = $item->id;
                }
            }
            
            $data['gddt'] = Document::whereIn('tax_id', $listID)->take(6)->get();
        }

        // Lấy tài liệu thuộc danh mục luận văn - báo cáo

        $lvbc = Taxonomy::where('slug', 'luan-van-bao-cao')->first();

        if ($lvbc) {
            $listID = array($lvbc->id);

            foreach ($allTaxonomy as $item) {
                if (in_array($item->parent, $listID)) {
                    $listID[] = $item->id;
                }
            }
            
            $data['lvbc'] = Document::whereIn('tax_id', $listID)->take(6)->get();
        }

        // Lấy tài liệu thuộc danh mục kỹ thuật - công nghệ

        $ktcn = Taxonomy::where('slug', 'ky-thuat-cong-nghe')->first();

        if ($ktcn) {
            $listID = array($ktcn->id);

            foreach ($allTaxonomy as $item) {
                if (in_array($item->parent, $listID)) {
                    $listID[] = $item->id;
                }
            }
            
            $data['ktcn'] = Document::whereIn('tax_id', $listID)->take(6)->get();
        }

        // Lấy tài liệu thuộc danh mục công nghệ thông tin

        $cntt = Taxonomy::where('slug', 'cong-nghe-thong-tin')->first();

        if ($cntt) {
            $listID = array($cntt->id);

            foreach ($allTaxonomy as $item) {
                if (in_array($item->parent, $listID)) {
                    $listID[] = $item->id;
                }
            }
            
            $data['cntt'] = Document::whereIn('tax_id', $listID)->take(6)->get();
        }

        return $data;
    }

    public static function appendToPaginate($unsets = array()){
        $params = $_GET;

        $appends = array();
        if ($unsets) {
            foreach($unsets as $item){
                unset($params[$item]);
            }
        }

        if ($params) {
            foreach($params as $key=>$val){
                if($val!=''){
                    $appends[$key] = $val;
                }

            }
        }

        return $appends;
    }
} 