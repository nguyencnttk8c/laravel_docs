<?php
namespace Helpers\Common;


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
            var myDropzone = new Dropzone("div#dropzoneFileUpload", {
                url: baseUrl+"/dropzone/uploadFiles",
                params: {
                    _token: token
                }
            });
            Dropzone.options.dropzoneFileUpload = {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                addRemoveLinks: true,
                dictDefaultMessage: "Tải lên từ máy tính",
                dictResponseError: 'Server not Configured',
                accept: function(file, done) {
                }
            };
        </script>
    <?php
        return ob_get_clean();
    }

} 