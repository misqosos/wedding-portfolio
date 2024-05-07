
<style>
	.snake-wrapper {
        justify-content: center;
        align-items: center;
        display: flex;
	}
	.score-wrapper {
		text-align: center;
		margin-bottom: 5vw;
	}
    .start-button {
        font-family: lobster;
        font-size: 6vw;
        color: rgb(218, 98, 12);
        position: absolute;
        background: rgb(255, 253, 147);
        cursor: pointer;
    }
    .start-button:hover {
        background: rgb(255, 253, 100);
    }
    .move-info {
        font-size: 6vw;
        position: absolute;
        text-align: center;
        display: none;
    }
    .pause {
        font-size: 10vw;
        position: absolute;
        text-align: center;
        display: none;
    }
</style>

<div class="snake-wrapper">
    <canvas id="cvs" width="700" height="300">
    </canvas>
    <button id="startButton" class="start-button" onclick="startGame()">Začať!</button>
    <div id="moveInfo" class="move-info">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
        <div>
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            <i class="fa fa-arrow-down" aria-hidden="true"></i>
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </div>
    </div>
    <div id="pause" class="pause">
		<i class="fa fa-pause" aria-hidden="true"></i>
    </div>
</div>
<div class="score-wrapper">
	<p id="vypis" style="font-size: 1.5vw; font-family: lobster;"></p>
	<p id="vypis2"></p>
</div>
	
<script type="text/javascript">
	
const vypis = document.getElementById("vypis");
const vypis2 = document.getElementById("vypis2");
const cvs = document.getElementById("cvs");
const ctx = cvs.getContext("2d");
const btn = document.getElementById("startButton"); 
 
function drawCircle(x, y, r, color){
	ctx.fillStyle = color;
	ctx.beginPath();
	ctx.arc(x, y, r, 0, Math.PI*2);
	ctx.fill();
}

function drawRect(x, y, w, h, color){
	ctx.fillStyle = color;
	ctx.lineWidth = "6";
	ctx.beginPath();
	ctx.rect(x, y, w, h);
	ctx.fill();
	ctx.stroke();
}

function drawText(text,x,y,font,color){
	ctx.fillStyle = color;
	ctx.font = font;
	ctx.fillText(text,x,y);
}

const playArea = {
	w: cvs.width,
	h: cvs.height,
	x: 0,
	y: 0,
	color: "white"
}

const snakeBody = {
	r: 10,
	color: "gold",
	x: cvs.width/2,
	y: cvs.height/2,
	dxRight: 0,
	dxLeft: 0,
	dyUp: 0,
	dyDown: 0
}

//pozicna mnozina jedlo X
foodArrX = [];

for (let index = snakeBody.r; index < cvs.width; index += snakeBody.r*2) {
    foodArrX.push(index);
}

var foodPosX = foodArrX[Math.floor(Math.random()*foodArrX.length)];

//pozicna mnozina jedlo Y
foodArrY = [];

for (let index = snakeBody.r; index < cvs.height; index += snakeBody.r*2) {
    foodArrY.push(index);
}

var foodPosY = foodArrY[Math.floor(Math.random()*foodArrY.length)];

const food = {
	r: 5,
	x: foodPosX,
	y: foodPosY
}
//kontrola pre pohyb o dx || dy
var controlNum = 0;
//kontrola pohybu pri stlaceni sipky
var eventArr = [];
var n = eventArr.length;
//pozicna mnozina hadik
var posX = [];
var posY = [];
var l = posX.length;
var k = posY.length;

var start = false;
var pause = false;

function startGame(){
	start = true;
	if(tailAddDraw > 0){
		location.reload();
	}
}

function pauseGame(){
	if(event.keyCode == 32 || event.keyCode == 13){

		if(pause){
			pause = false;
			displayPause(pause);

			clearInterval(gameInterval);
			gameInterval = setInterval(render, 100);

			return;
		}
		
		if (tailAddDraw > 0) {
			pause = true;
			displayPause(pause);
	
			clearInterval(gameInterval);
		}
	}
}

document.addEventListener("keyup", pauseGame);

function arrowMove(){
	if(start == false){
		return false;
	}else{true}
	switch(event.keyCode){
		case 38://hore 
			//zamedzenie ostatneho pohybu
			event.preventDefault();
			n = eventArr.length;
			eventArr[n] = "38";
			if(event && event.keyCode == eventArr[n-1]){
				return false;
			}
			if(event && snakeBody.dyDown == 20 || eventArr[n-1] == "40"){
				return false;
			}
			controlNum = 1;
			
			if(snakeBody.y-snakeBody.r == 0){
				true;
			}else{l = posX.length;
				  k = posY.length;
			
			      posX[l] = snakeBody.x;
			      posY[k] = snakeBody.y;
				  }
			
			//pohyb po mape
			snakeBody.dxRight = 0;
			snakeBody.dxLeft = 0;
			snakeBody.dyUp = 20;
			snakeBody.dyDown = 0;
			if(snakeBody.y-snakeBody.r == 0){snakeBody.dyUp = 1}
			snakeBody.y-=snakeBody.dyUp;
			break;
		case 40://dole 
			//zamedzenie ostatneho pohybu
			event.preventDefault();
			n = eventArr.length;
			eventArr[n] = "40";
			if(event && event.keyCode == eventArr[n-1]){
				return false;
			}
			if(event && snakeBody.dyUp == 20 || eventArr[n-1] == "38"){
				return false;
			}
			controlNum = 1;
			
			if(snakeBody.y+snakeBody.r == playArea.h){
				true;
			}else{l = posX.length;
				  k = posY.length;
			
			      posX[l] = snakeBody.x;
			      posY[k] = snakeBody.y;
				  }
			
			//pohyb po mape
			snakeBody.dxRight = 0;
			snakeBody.dxLeft = 0;
			snakeBody.dyUp = 0;
			snakeBody.dyDown = 20;
			if(snakeBody.y+snakeBody.r == playArea.h){snakeBody.dyDown = 1}
			snakeBody.y+=snakeBody.dyDown;
			break;
		case 37://dolava
			//zamedzenie ostatneho pohybu
			n = eventArr.length;
			eventArr[n] = "37";
			if(event && event.keyCode == eventArr[n-1]){
				return false;
			}
			if(event && snakeBody.dxRight == 20 || eventArr[n-1] == "39"){
				return false;
			}
			controlNum = 1;
			
			if(snakeBody.x-snakeBody.r == 0){
				true;
			}else{l = posX.length;
				  k = posY.length;
			
			      posX[l] = snakeBody.x;
			      posY[k] = snakeBody.y;
				  }
			
			//pohyb po mape
			snakeBody.dxRight = 0;
			snakeBody.dxLeft = 20;
			snakeBody.dyUp = 0;
			snakeBody.dyDown = 0;
			if(snakeBody.x-snakeBody.r == 0){snakeBody.dxLeft = 1}
			snakeBody.x-=snakeBody.dxLeft;
			break;
		case 39://doprava
			//zamedzenie ostatneho pohybu
			n = eventArr.length;
			eventArr[n] = "39";
			if(event && event.keyCode == eventArr[n-1]){
				return false;
			}
			if(event && snakeBody.dxLeft == 20 || eventArr[n-1] == "37"){
				return false;
			}
			controlNum = 1;
			
			if(snakeBody.x+snakeBody.r == playArea.w){
				true;
			}else{l = posX.length;
				  k = posY.length;
			
			      posX[l] = snakeBody.x;
			      posY[k] = snakeBody.y;
				  }
			
			//pohyb po mape
			snakeBody.dxRight = 20;
			snakeBody.dxLeft = 0;
			snakeBody.dyUp = 0;
			snakeBody.dyDown = 0;
			if(snakeBody.x+snakeBody.r == playArea.w){snakeBody.dxRight = 1}
			snakeBody.x+=snakeBody.dxRight;
			break;
	}
}

document.addEventListener("keydown", arrowMove);

//konstanta na pridanie chvosta
var tailAdd = 2;
var tailAddDraw = 0;
var score = 0;
var wallBang = false;
var tailBang = false;

function graphics(){
	drawRect(playArea.x, playArea.y, playArea.w, playArea.h, 'rgb(255, 253, 147)');
	drawCircle(food.x, food.y, food.r, "firebrick");
	drawCircle(snakeBody.x, snakeBody.y, snakeBody.r, snakeBody.color);
}

function update(){
	//kontrola pre kreslenie hlavy
	if(eventArr[n] > 0){tailAddDraw = 1}
	
	if(start == true){
		btn.innerHTML = "Reštart";
	}
	
	//skore vypis
	vypis.innerHTML = "Zjedené bodky: " + score;
	
	//kolizia stena
	if(snakeBody.x+snakeBody.r > playArea.w ||
	   snakeBody.x-snakeBody.r < 0 ||
	   snakeBody.y+snakeBody.r > playArea.h ||
	   snakeBody.y-snakeBody.r < 0){
		    
			posX[l] = posX[l-tailAdd];
			posY[k] = posY[k-tailAdd];
			Object.freeze(snakeBody);
			Object.freeze(posX);
			Object.freeze(posY);
		    wallBang = true;
			start = false;
	   }
	
	//update jedla
	if(snakeBody.x == food.x && snakeBody.y == food.y){
		tailAdd++;
		score++;
		foodPosX = foodArrX[Math.floor(Math.random()*foodArrX.length)];
		foodPosY = foodArrY[Math.floor(Math.random()*foodArrY.length)];
		food.x = foodPosX;
		food.y = foodPosY;
	}
	
	if(posY[k] == posY[k-1] && posX[l] == posX[l-1]){
		posY.pop();
		posX.pop();
	}
	
	//update chvosta
	l = posX.length;
	k = posY.length;
	
	posX[l] = snakeBody.x;
	posY[k] = snakeBody.y;
	
	for(var i = 1; i <= tailAdd; i++){
		
		if(tailAddDraw == 0){return false}
				
		//rebound jedla 
		if(foodPosX == posX[l-i] && foodPosY == posY[k-i]){
			foodPosX = foodArrX[Math.floor(Math.random()*foodArrX.length)];
			foodPosY = foodArrY[Math.floor(Math.random()*foodArrY.length)];
			food.x = foodPosX;
			food.y = foodPosY;
			drawCircle(food.x, food.y, food.r, "firebrick");
			}
		
		//kreslenie chvosta
		drawCircle(posX[l-i], posY[k-i], snakeBody.r, "goldenrod");
		
		//kolizia hlava -> chvost
		if(snakeBody.x == posX[l-i] &&
		   snakeBody.y == posY[k-i]){
			drawCircle(posX[l-i], posY[k-i], snakeBody.r, snakeBody.color);
			tailBang = true;
			start = false;
			posX[l] = posX[l-tailAdd];
			posY[k] = posY[k-tailAdd];
			Object.freeze(snakeBody);
			Object.freeze(posX);
			Object.freeze(posY);
		}
	}
}

function move(){ 
	if(controlNum == 1){
		return controlNum = 0;
	}
	if(snakeBody.x-snakeBody.r == 0 && posY[k] == posY[k-1]){
		snakeBody.dxLeft = 1;
	}
	if(snakeBody.x+snakeBody.r == playArea.w && posY[k] == posY[k-1]){
		snakeBody.dxRight = 1;
	}
	if(snakeBody.y-snakeBody.r == 0 && posX[l] == posX[l-1]){
		snakeBody.dyUp = 1;
	}
	if(snakeBody.y+snakeBody.r == playArea.h && posX[l] == posX[l-1]){
		snakeBody.dyDown = 1;
	}

	snakeBody.x+=snakeBody.dxRight;
	snakeBody.x-=snakeBody.dxLeft;
	snakeBody.y-=snakeBody.dyUp;
	snakeBody.y+=snakeBody.dyDown;
}

function text(){
	if(tailBang == true || wallBang == true){
        document.getElementById("startButton").style.display  = 'block';
	}
	if(tailAddDraw == 0 && start == true){
        document.getElementById("startButton").style.display  = 'none';
        document.getElementById("moveInfo").style.display  = 'block';
	}
	if(start == true && tailAddDraw > 0){
        document.getElementById("moveInfo").style.display  = 'none';
	}
}

function displayPause(pause) {
	if(pause){
        document.getElementById("pause").style.display  = 'block';
	} else { document.getElementById("pause").style.display  = 'none'; }
}

function render(){
	move();
	graphics();
	update();
	text();
}

var gameInterval = setInterval(render, 100);


</script>




