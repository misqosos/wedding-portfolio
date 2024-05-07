<div class="frame-person">
    <!-- formular -->
    <div class="form-person">
        <form id="person-form">

            <?php
                include($pathToForm);
            ?>

        </form>

        <button class="next-button" id="next-button" onclick="nextQuestion()">
            <a>Ďalšia otázka</a>&nbsp;&nbsp;&nbsp;
            <i class="fa fa-arrow-right" aria-none="true"></i>
        </button>
        
        <div style="display: none;" id="submit-button"><br>
            <button onclick="onSubmit()" class="submit-button">Vyhodnotiť</button>
        </div>
    </div>

    <!-- vyhodnocovacie veci -->

    <div class="form-person evaluation" style="display: none;" id="not-all-correct">
        <p>
            Gratulujem! <br><br>
            <label id="corrects-amount"></label> <br>
            <a class="answers-revelation" onclick="revealCorrectAnswers()">
                Chcem vidieť správne odpovede
            </a>
        </p>
    </div>
        
    <div class="form-person evaluation" style="display: none;" id="correct-answers">
        <!-- foreach($correctAnswers as $key=>$value) -->
        <div class="correct-answers-loop" id="correct-answers-looper"></div>
        <!--  endforeach; -->
    </div>

    <div class="form-person evaluation" style="display: none;" id="all-correct">
        Gratulujem! <br><br>
        Uhádol si všetko správne, vyhrávaš veľkú pochvalu.
    </div>

    <!-- if($isSadperson)-->
    <div style="display: none;" id="sad-person">
        <img src="assets/images/sad_<?php echo $personName ?>.png" alt="sad" class="picture">
        <i class="fa fa-times icon" style="color: red;" aria-none="true"></i>
    </div>

    <!-- if($isHappyperson) -->
    <div style="display: none;" id="happy-person">
        <img src="assets/images/happy_<?php echo $personName ?>.png" alt="happy" class="picture">
        <i class="fa fa-check icon" style="color: green;" aria-none="true"></i>
    </div>
</div>