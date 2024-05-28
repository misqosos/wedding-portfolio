
<div class="main-view">
<div style="top: 0; position: relative;">
    <?php if(isset($_POST["companyName"]) && !empty($_POST["companyName"])) : ?>
        <?php noteVisit($_POST["companyName"]); ?>
        <?php 
            $headers = "From: Odomna@premna\r\n";
            $headers .= "Reply-To: myplace2@example.com\r\n";
            $headers .= "Return-Path: myplace@example.com\r\n";
            $headers .= "CC: sombodyelse@example.com\r\n";
            $headers .= "BCC: hidden@example.com\r\n";
            mail("michaldrotar14@gmail.com", strtoupper($_POST["companyName"])." si pozreli motivak", "predmet", $headers); 
        ?>
        <div style="text-align: center;">
            <div class="main-title">MOTIVÁCIA&nbsp;&nbsp; MICHALA&nbsp;&nbsp; NASTÚPIŤ&nbsp;&nbsp; DO&nbsp;&nbsp; <label style="font-weight: bolder;"><?php echo strtoupper($_POST["companyName"]) ?></label>&nbsp;&nbsp; AKO&nbsp;&nbsp; UCHO</div>
            <p class="story-text">
                Prajem (dúfam, že som pri otvorení dokumentu trafil slnečný deň a dobrú náladu) krásny deň,

                V minulosi som bol juniorný programátor pre korporát, ktorý spolupracoval s developermi
                z inej spoločnosti na projekte pre ministerstvo vnútra. Práca bola kreatívna a príjemná ale...
                Neskôr som však vystúpil z IT sveta kvôli túžbe vyskúšať profesiu konštruktéra strojov a zariadení, 
                keďže som študoval strojárinu a 1 rok predtým som na to nemal príležitosť. Toto odvetvie ma však
                tak neoslovilo a odvtedy sa
                chcem vrátiť na obdobnú Junior pozíciu, akú som obsadzoval v spomenutom korporáte. Naposledy som pracoval
                ako programátor, avšak bola to pozícia technologicky nezáživná, keďže sa jedná v podstate o Low-code
                platformu. Týmto sa snažím teda vrátiť k hociktorým technológiám, ktoré produkujú väčšiu škálu kreativity 
                a teda kreatívny výstup programátora. Najmä ma však láka priateľský kolektív a podpora, pri ktorej
                ide učenie o to ľahšie. Mojimi slabosťami je stres pri pohovoroch a prednosti
                úsmev a vďačnosť za každú pomoc. Týmto teda vypúšťam cyberholuba do siete, v ktorej môže lietať a teším
                sa ak sa vráti späť.
                <br>
                <br>
                Písal Michal z Nižnej Myšle na Kopaničnej 27 do <?php echo strtoupper($_POST["companyName"]) ?>.
            </p>
        </div>
    <?php else : ?>
        <form action="/motivak" method="post" class="company-name-form">
            <input type="company-name" name="companyName" placeholder="Názov Vašej spoločnosti"><br>
            <?php if(isset($_POST["companyName"]) && empty($_POST["companyName"])) : ?>
                <label style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;Zabudli ste názov spoločnosti</label><br>
            <?php endif; ?> 
            <button type="submit" class="submit-button-company">Čítať motivačný list</button>
        </form> 
    <?php endif; ?>    
    </div>
</div>

<?php
    function noteVisit($name) {
        $sql = 'INSERT INTO visits (name, timestamp) VALUES (:name, :timestamp)';
            
        $stmt = DbConnection::getDatabaseConnection()->prepare($sql);
    
        $stmt->bindParam(':name', $nameParam, PDO::PARAM_STR);
        $stmt->bindParam(':timestamp', $timestampParam, PDO::PARAM_STR);
        
        date_default_timezone_set("Europe/Bratislava");
        
        $nameParam = $name;
        $timestampParam = date('Y-m-d H:i:s',time());
    
        $stmt->execute();
    }
?>