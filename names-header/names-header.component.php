
<style type="text/css">
    <?php
        include("names-header.component.css")
    ?>
</style>

<div class="title-names-header" id="slide-names-header">
    <?php
        $homePath = "/";
        $ourStoryPath = "/nas-pribeh";
        $logisticsPath = "/doprava";
        $gamesPath = "/hry";
        $uploadsPath = "/fotky";
        
        $showGamesOption = true;

        include("names-header-menu.component.php")
    ?>
</div>

<script>
    makeAnimation();
    function makeAnimation(){
        if (sessionStorage.getItem("animationMade")) { 
            document.getElementById('menu').style.animationName = 'none';
            document.getElementById('menu').style.animationDuration = 'none';
            return; 
        }
        document.getElementById('menu').style.animationName = 'header-slide';
        document.getElementById('menu').style.animationDuration = '2s';
        
        setTimeout(() => {
            sessionStorage.setItem("animationMade", true);
        }, 2000);
    }
</script>