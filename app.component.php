
<style type="text/css">
    <?php
        include("globals.css");
        include("app.component.css");
    ?>
</style>
<div id="border-app" class="border-app">
    <img src="assets/images/pavucina-left.png" alt="Flower" class="flower-app top-left-app" onclick="spidey();">
    <img src="assets/images/pavucina-right.png" alt="Flower" class="flower-app top-right-app" onclick="spidey()">
</div>
<!-- <router-outlet> -->
<?php
    include("router/router.php")
?>
<!-- </router-outlet> -->
<?php
    include("names-header/names-header.component.php");
?>

<div class="spidey" id="spidey">
    <img src="assets/images/pavucik.png" alt="Flower" style="height: 100%; width: auto;">
</div>
<script>
    var clicks = 0;
    function spidey(){
        clicks++;
        setTimeout(() => {
            clicks = 0;
        }, 2000);
        if (clicks == 3) {
            document.getElementById("spidey").style.display = 'block';
            setTimeout(() => {
                document.getElementById("spidey").style.display = 'none';
            }, 3000);
        }
    }
</script>