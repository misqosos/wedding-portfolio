
<div id="main-gallery-view" class="main-view">

    <div class="gallery-title">
        Svatební
    </div>

    <?php
        $dir_name = "pages/home-page/photo-upload/photos/";
        $images = glob($dir_name."*");
    ?>
    
    <?php if (empty($images)) : ?>
        <div style="text-align: center;">
            Žiadne fotky
        </div>
    <?php endif; ?>

    <div id="gallery-row" class="gallery-row">
        <?php foreach( $images as $image ): ?>
        <div class="gallery-column">
            <img src="<?php echo $image ?>" alt="zobrazenie nefunguje len na mobile, usilovne sa na tom pracuje" onclick="openImage(this);">
        </div>
        <?php endforeach; ?>
    </div>

    <div id="highlighted-image" class="highlighted-image">
        <span onclick="closeImage()" class="closebtn">
            &times;
        </span>
        <img id="expandedImg">
        <div id="imgtext"></div>
    </div>

    <script>
        function openImage(imgs) {
            document.getElementById("slide-names-header").style.display = 'none';
            if (document.getElementById("home-button")) {
                document.getElementById("home-button").style.display = 'none'; 
            }
            document.getElementById("border-app").style.opacity = 0.5;
            document.getElementById("gallery-row").style.opacity = 0.5;
            var expandImg = document.getElementById("expandedImg");
            var imgText = document.getElementById("imgtext");
            expandImg.src = imgs.src;
            imgText.innerHTML = imgs.alt;
            expandImg.parentElement.style.display = "flex";
        }

        function closeImage() {
            document.getElementById("highlighted-image").style.display='none';
            document.getElementById("slide-names-header").style.display = 'block';
            if (document.getElementById("home-button")) {
                document.getElementById("home-button").style.display = 'flex';   
            }
            document.getElementById("border-app").style.opacity = 1;
            document.getElementById("gallery-row").style.opacity = 1;
        }
    </script>

</div>