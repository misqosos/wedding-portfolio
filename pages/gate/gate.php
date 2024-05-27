
<style>
    <?php
        include("gate".$GLOBALS["mobile"].".css");
    ?>
</style>

<div class="gate-view">
    <img src="assets/images/frame.png" alt="ram" class="ram">
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" style="text-align: center; position: relative;">
        <p>Heslo sa nachádza v životopise</p>
        <input type="password" name="pass"><br>
        <?php if(!$access && isset($_POST["pass"])) : ?>
            <label style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;Nesprávne heslo, skúste znova</label><br>
        <?php endif; ?> 
        <button type="submit" class="submit-button">Potvrdiť</button>
    </form>
</div>
