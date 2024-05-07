
<style>
    .gate-view {
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%;
        border: 1vh solid olive; 
        box-sizing: border-box;
        background-color: whitesmoke;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    input[type=text] {
        width: 20vh;
        height: auto;
        font-size: 3vh;
        border-radius: 1vh;
        padding: 0.5vh 1vw;
        font-family: 'Lobster';
        -webkit-text-stroke-width: 0.5px;
        -webkit-text-stroke-color: black;
        text-align: center;
    }
    .submit-button {
        background-color: black;
        border-radius: 1.5vw;
        border-style: solid;
        color: white;
        cursor: pointer;
        font-family: 'Lobster';
        font-size: 4vh;
        height: auto;
        padding: 1vh;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: black;
        margin-top: 5vh;
    }

    .submit-button:hover,
    .submit-button:focus {
    background-color: white;
    color: olive;
    }

    .ram {
        width: 30vh; height: 50vh; position: absolute;
    }

    .hint {
        font-size: 3vh; font-family: inherit; position: absolute; top: 0; text-align: center;
    }
</style>

<div class="gate-view">
        <p class="hint">
            Heslo je text <br> hneď nad dátumom svadby <br> na pozvánke (spolu bez medzier)
        </p>
    <img src="../assets/images/frame.png" alt="ram" class="ram">
    <form action="/m/index.php" method="post" style="text-align: center; position: relative;">
        <input type="text" name="pass"><br>
        <button type="submit" class="submit-button">Potvrdiť</button>
    </form>
</div>
