
<div class="frame-upload">
    <form action="<?php echo $actionPath ?>" method="post" enctype="multipart/form-data" class="button-wrapper">

        <?php if(isset($_FILES["filesToUpload"])) : ?>
            <div id="uploadInfo" class="upload-image-info">
                <?php uploadImages($targetDirPath); ?>
            </div>
        <?php endif; ?>
        
        <div class="add-button">
            <i class="fa fa-camera-retro" aria-hidden="true"><div class="add-photo-label">Pridať fotky</div></i>
            <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" class="hidden-add-button" onchange="checkFiles()">
        </div>

        <div id="uploadButtonWrapper" style="display: none;">
            <div class="upload-button" id="spinner" style="display: none;">
                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            </div>
            <input id="uploadButton" class="upload-button" type="submit" name="uploadPhotos" onclick="showLoading()">
        </div>
    </form>
</div>

<script>
    hideUploadInfo();
    function hideUploadInfo(){
        if (document.getElementById("uploadInfo")) {
            setTimeout(() => {
                document.getElementById("uploadInfo").style.display = 'none';
            }, 5000);
        }
    }

    function showLoading(){
        document.getElementById("uploadButton").style.display = 'none';
        document.getElementById("spinner").style.display = 'block';
    }

    function checkFiles(){
        var filesAmount = document.getElementById("filesToUpload").files.length;
        if (filesAmount > 0) {
            fileWord = filesAmount == 1 ? "súbor" : (filesAmount > 1 && filesAmount < 5 ? "súbory" : "súborov");
            document.getElementById("uploadButton").value = "Nahrať " + filesAmount + " " + fileWord;
            document.getElementById("uploadButtonWrapper").style.display = 'block';
        }
    }
</script>

<?php
    function uploadImages($targetPath){
        $target_dir = $targetPath;
        $successes = array();

        if (isset($_POST["uploadPhotos"]) && isset($_FILES["filesToUpload"])) {
            for ($i=0; $i < count($_FILES["filesToUpload"]["name"]); $i++) { 

                $target_file = $target_dir . uniqid() . basename($_FILES["filesToUpload"]["name"][$i]);

                // Check if file already exists
                if (file_exists($target_file)) {
                    $target_file = $target_dir . uniqid() . basename($_FILES["filesToUpload"]["name"][$i]);
                }

                if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file)) {
                    array_push($successes, $target_file);
                } else {
                    echo "Súbor $target_file sa neuložil"."<br>";
                }
            }
            if (count($successes) == count($_FILES["filesToUpload"]["name"])) {
                echo "Uložené";
            } else { echo "Niektoré zo súborov sa neuložili"; }
        }
    }
?>
