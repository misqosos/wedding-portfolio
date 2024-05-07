
<style>
    .gate-view {
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%;
        border: 1vw solid olive; 
        box-sizing: border-box;
        background-color: whitesmoke;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    input[type=text] {
        width: 15vw;
        height: auto;
        font-size: 2vw;
        border-radius: 1vw;
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
        font-size: 2.5vw;
        height: auto;
        padding: 1vw;
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

    .heart-pass {
        font-size: 40vw; 
        position: absolute;
    }

    .ram {
        width: 30vw; height: auto; position: absolute;
    }
</style>

<div class="gate-view">
    <img src="assets/images/frame.png" alt="ram" class="ram">
    <form action="/index.php" method="post" style="text-align: center; position: relative;">
        <input type="text" name="pass"><br>
        <button type="submit" class="submit-button">Potvrdiť</button>
    </form>
</div>
