
<style>
    .main-view {
        width: 100%; 
        height: 100%;
        top: 0; 
        left: 0; 
        position: fixed; 
        box-sizing: border-box;
        text-align: center;
        overflow-y: auto;
    }

    .game-options-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 12vw;
        margin-bottom: 5vw;
    }

    .game-option {
        width: 13vw;
        position: relative;
        height: 20vw;
        margin: 3vw;
    }

    .game-option:hover {
        border-bottom: solid;
    }

    .game-image {
        width: inherit;
        height: auto;
    }

    .game-title {
        font-family: lobster;
        font-size: 2vw;
        margin: 0;
        position: absolute;
        bottom: 2vw;
        right: 0;
        left: 0;
    }

    .game-hidden-button {
        cursor: pointer; 
        width: 100%; 
        height: 100%; 
        background: none;
        border: none;
    }

    .input-form-game {
        position: absolute; 
        width: 100%; 
        height: 100%; 
        top: 0
    }

</style>

<div class="main-view">
    <div class="game-options-wrapper">
        <!-- hadik -->
        <div class="game-option">
            <img src="assets/images/hadik.png" alt="snake" class="game-image">
            <p class="game-title">Hadík</p>
            <form action="/hry" method="post" class="input-form-game">
                <input type="hidden" name="game" value="hadik">
                <button type="submit" class="game-hidden-button"></button>
            </form>
        </div>
        <!-- arkanoid -->
        <div class="game-option">
            <img src="assets/images/arkanoid.png" alt="arkanoid" class="game-image">
            <p class="game-title">Arkanoid</p>
            <form action="/hry" method="post" class="input-form-game">
                <input type="hidden" name="game" value="arkanoid">
                <button type="submit" class="game-hidden-button"></button>
            </form>
        </div>
    </div>
    <?php 
        if(isset($_POST["game"])) {
            switch ($_POST["game"]) {
                case 'hadik':
                    include("snake.php");
                    break;

                case 'arkanoid':
                    include("arkanoid.php");
                    break;
                
                default:
                    break;
            }
        }
    ?>
    
    <!-- domov tlacitko -->
    <?php include("components/home-button.html") ?>
</div>