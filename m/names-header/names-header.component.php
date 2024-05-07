
<style type="text/css">
    <?php
        include("names-header.component.css")
    ?>
</style>
<div class="title-names-header" id="slide-names-header" onclick="showMenu()">
    <?php
        $homePath = "/m";
        $ourStoryPath = "/m/nas-pribeh";
        $logisticsPath = "/m/doprava";
        
        $showGamesOption = false;

        include("../names-header/names-header-menu.component.php")
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
        sessionStorage.setItem("animationMade", true);
    }

    menuShowed = false;
    function hideMenu(){
        if (menuShowed) {
            document.getElementById("menu").style.maxHeight = '0vh';
            menuShowed = false;
        }
    }

    function showMenu(){
        if (!menuShowed) {
            setTimeout(() => {
                document.getElementById("menu").style.maxHeight = '50vh';
                menuShowed = true;
            }, 100);
        }
    }
</script>