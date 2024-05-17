
<div class="menu-wrapper-names-header" id="menu">
    <p class="menu-title">Menu</p>
    <li>
        <label class="option-decor">&#9825;&nbsp;
            <a href="<?php echo $homePath ?>">Domov</a>
        &nbsp;&#9825;</label>
    </li>
    <li>
        <label class="option-decor">&#9825;&nbsp;
            <a href="<?php echo $uploadsPath ?>">Vaše nahrané fotky</a>
        &nbsp;&#9825;</label>
    </li>
    <li>
        <label class="option-decor">&#9825;&nbsp;
            <a href="<?php echo $ourStoryPath ?>">Náš príbeh</a>
        &nbsp;&#9825;</label>
    </li>
    <li>
        <label class="option-decor">&#9825;&nbsp;
            <a href="<?php echo $logisticsPath ?>">Ako sa tam dostanem?</a>
        &nbsp;&#9825;</label>
    </li>
    <li>
        <label class="option-decor">&#9825;&nbsp;
            <?php if($showGamesOption) : ?>
                <a href="<?php echo $gamesPath ?>">Zahraj sa</a>
            <?php else : ?>
                <a style="color: gray;">Zahraj sa (len pre PC)</a>
            <?php endif; ?>
        &nbsp;&#9825;</label>
    </li>
</div>
<p>Jessie & Woody</p>