
<div class="collection-wrapper bottom-right">
    <div class="oblacik right-side">
        <img src="<?php echo $imagesPath ?>oblacik.png" alt="Oblacik" class="oblacik-image">
        <p class="oblacik-text">
            Ahoj,<br>Čo o mne vieš?
        </p>
    </div>
    <div class="person" style="display: flex;">
        <form action="<?php echo $actionPathMan ?>" method="post" style="display: flex;">
            <input type="hidden" name="personName" value="<?php echo $GLOBALS["man"] ?>">
            <button type="submit" class="hidden-button"></button>
        </form>
        <img src="<?php echo $imagesPath . $GLOBALS["man"] ?>.png" alt="<?php echo $GLOBALS["man"] ?>" style="width: inherit;">
    </div>
</div>

<div class="collection-wrapper bottom-left">
    <div class="oblacik left-side">
        <img src="<?php echo $imagesPath ?>oblacik.png" alt="Oblacik" class="oblacik-image">
        <p class="oblacik-text" style="transform: scaleX(-1);">
            Ahoj,<br>Čo o mne vieš?
        </p>
    </div>
    <div class="person" style="display: flex;">
        <form action="<?php echo $actionPathWoman ?>" method="post" style="display: flex;">
            <input type="hidden" name="personName" value="<?php echo $GLOBALS["woman"] ?>">
            <button type="submit" class="hidden-button"></button>
        </form>
        <img src="<?php echo $imagesPath . $GLOBALS["woman"] ?>.png" alt="<?php echo $GLOBALS["woman"] ?>" style="width: inherit;">
    </div>
</div>