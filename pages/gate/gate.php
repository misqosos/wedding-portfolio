
<style>
    <?php
        include("gate".$GLOBALS["mobile"].".css");
    ?>
</style>

<div class="gate-view">
    <img src="assets/images/frame.png" alt="ram" class="ram">
    <form action="/index.php" method="post" style="text-align: center; position: relative;">
        <p>Heslo sa nachádza v životopise</p>
        <input type="password" name="pass"><br>
        <input type="hidden" name="uri" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
        <button type="submit" class="submit-button">Potvrdiť</button>
    </form>
</div>
