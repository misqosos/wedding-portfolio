
<style type="text/css">
    <?php
        include("questionnaire-redirection.component.css");
    ?>
</style>

<div class="collection-wrapper bottom-right">
    <div class="oblacik right-side">
        <img src="assets/images/oblacik.png" alt="Oblacik" style="width: 15vw; height: auto;">
        <p class="oblacik-text">
            Ahoj,<br>Čo o mne vieš?
        </p>
    </div>
    <div class="person" style="display: flex;">
        <form action="/woody" method="post" style="display: flex;">
            <input type="hidden" name="personName" value="woody">
            <button type="submit" class="hidden-button"></button>
        </form>
        <img src="assets/images/woody.png" alt="woody" style="width: inherit;">
    </div>
</div>

<div class="collection-wrapper bottom-left">
    <div class="oblacik left-side">
        <img src="assets/images/oblacik.png" alt="Oblacik" style="width: 15vw; height: auto;">
        <p class="oblacik-text" style="transform: scaleX(-1);">
            Ahoj,<br>Čo o mne vieš?
        </p>
    </div>
    <div class="person" style="display: flex;">
        <form action="/jessie" method="post" style="display: flex;">
            <input type="hidden" name="personName" value="jessie">
            <button type="submit" class="hidden-button"></button>
        </form>
        <img src="assets/images/jessie.png" alt="jessie" style="width: inherit;">
    </div>
</div>
