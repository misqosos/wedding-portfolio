
<style>
    .arkanoid-wrapper {
        justify-content: center;
        align-items: center;
        display: flex;
		margin-bottom: 5vw;
    }
    .start-button {
        font-family: var(--fontFamily);
        font-size: 6vw;
        color: var(--invitationHeaderColor);
        position: absolute;
        background: var(--backgroundColor);
        cursor: pointer;
    }
    .start-button:hover {
        background: var(--startButtonHoverColor);
    }
    .winner-info {
        font-size: 4vw;
        color: skyblue;
        font-family: var(--fontFamily);
        top: 13vw;
        position: absolute;
        display: none;
    }
    .pause {
        font-size: 10vw;
        position: absolute;
        text-align: center;
        display: none;
    }
</style>

<div class="arkanoid-wrapper">
    <canvas id="cvs" width="500" height="400"></canvas>
    <button id="startButton" class="start-button" onclick="releaseBallWithButton()">Začať!</button>
    <div id="winner" class="winner-info">
        VÍŤAZ !!!
    </div>
    <div id="pause" class="pause">
		<i class="fa fa-pause" aria-hidden="true"></i>
    </div>
    <br>
    <p id="vypis"></p>
</div>

<script type="text/javascript">
			
const cvs = document.getElementById("cvs");
const ctx = cvs.getContext("2d");
const vypis = document.getElementById("vypis");

function drawRect(x, y, w, h, color, lineWidth = 2.2){
	ctx.fillStyle = color;
	ctx.beginPath();
	ctx.rect(x, y, w, h);
	ctx.fill();
	ctx.lineWidth = lineWidth;
	ctx.stroke();
}

function drawText(text,x,y,font,color){
	ctx.fillStyle = color;
	ctx.font = font;
	ctx.fillText(text,x,y);
}

function drawCircle(x, y, r, color){
	ctx.fillStyle = color;
	ctx.beginPath();
	ctx.arc(x, y, r, 0, Math.PI*2);
	ctx.fill();
	ctx.lineWidth = 1;
	ctx.stroke();
}

const paddle = {
	x: cvs.width/2 - 50,
	y: cvs.height - 20,
	w: 100,
	h: 20
}

var angle = 0;

const ball = {
	x: cvs.width/2,
	y: cvs.height - 30,
	r: 10,
	dx: 4*Math.cos(angle*Math.PI/180),
	dy: 4*Math.sin(angle*Math.PI/180)
}

const block = {
	w: 50,
	h: 5,
	r: 4,
	c: 5
}

function graphics(){
	drawRect(0, 0, cvs.width, cvs.height, 'rgb(255, 253, 147)', 4);
	drawRect(paddle.x, paddle.y, paddle.w, paddle.h, 'rgb(218, 98, 12)', 1);
	drawCircle(ball.x, ball.y, ball.r, "slateblue");
}

var leftArrow = false;
var rightArrow = false;

function paddleMove(){
	switch(event.keyCode){
		case 37:
			leftArrow = true;
			break;
		case 39:
			rightArrow = true;
			break;
	}
}

document.addEventListener('keydown', paddleMove);

function paddleStop(){
	switch(event.keyCode){
		case 37:
			leftArrow = false;
			break;
		case 39:
			rightArrow = false;
			break;
	}
}

document.addEventListener('keyup', paddleStop);

var ballReleased = false;
var pause = false;
var end = false;

function releaseBallWithButton() {
    if (ballReleased) {
		location.reload();
    }
    ballReleased = true;
}

function pauseGame(){

		if(pause){
			pause = false;
			displayPause(pause);

			clearInterval(gameInterval);
			gameInterval = setInterval(loop, 20);

			return;
		}

		if (!end) {
			pause = true;
			displayPause(pause);
	
			clearInterval(gameInterval);
		}
}

function ballReleasing(){
	if(event.keyCode == 32 || event.keyCode == 13){

        if (ballReleased) {
			pauseGame();
			return;
        }
        
		ballReleased = true;
        return;
	}
}

document.addEventListener("keyup", ballReleasing);

var zrychlenie = 2;

function update(){
//paddleMovement
	if(leftArrow == true && paddle.x > 0){
		paddle.x-=5;
	}else if(rightArrow == true && paddle.x + paddle.w < cvs.width){
		paddle.x+=5;
	}

//ballMovement
	
	//zaciatok hry (pohyb lopty po padle)
	if(ballReleased == false && ball.x + ball.r > paddle.x + paddle.w){
		ball.x = paddle.x + paddle.w - ball.r;
		ball.dx=-ball.dx;
	}else if(ballReleased == false && ball.x - ball.r < paddle.x){
		ball.x = paddle.x + ball.r;
		ball.dx=-ball.dx;
	}
	
	//uhol odrazu lopty od padla
	if(ballReleased == true && //pre 30 stupnov
		ball.x > paddle.x &&
			ball.x - ball.r < paddle.x + paddle.w &&
				ball.y + ball.r == paddle.y){
		angle = ball.x - paddle.x + 90 - paddle.w/2;
		zrychlenie+=0.5;
		ball.dx = zrychlenie*Math.cos(angle*Math.PI/180);
		ball.dy = zrychlenie*Math.sin(angle*Math.PI/180);
	}
	
	//odraz od stien 
	if(ball.x - ball.r < 0 ||
		ball.x + ball.r > cvs.width){
		ball.dx = -ball.dx;
	}else if(ball.y - ball.r < 0){
		ball.dy = -ball.dy;
	}
	
	ball.x-=ball.dx;
	ball.y-=ball.dy;
}

var blocks = [];

function createBlocks(){
	for(i = 0; i < block.r ; i++){
		blocks[i] = [];
		for(j = 0; j < block.c; j++){
			blocks[i][j] = {
				x: (j+0.5)*block.w + block.w*j,
				y: (i+1)*block.h*5 + block.h*i,
				collision: false
			};
		}
	}
}

var blocksHit = 0;

function drawBlocks(){
	for(i = 0; i < block.r ; i++){
		for(j = 0; j < block.c; j++){
			if(blocks[i][j].collision == true){
				true;
			}else if(ball.x + ball.r > blocks[i][j].x &&
			ball.x - ball.r < blocks[i][j].x + block.w &&
			ball.y + ball.r > blocks[i][j].y &&
			ball.y - ball.r < blocks[i][j].y + block.h){
				blocks[i][j].collision = true;
				ball.dy = -ball.dy;
				blocksHit++;
			}else if(blocks[i][j].collision == false && j == 0 || j == 4 || j == 2){
				drawRect(blocks[i][j].x, blocks[i][j].y, block.w, block.h, "midnightblue");
			}else if(blocks[i][j].collision == false && j == 1 || j == 3){
				drawRect(blocks[i][j].x, blocks[i][j].y, block.w, block.h, "royalblue");
			}
		}
	}
}

function text(){
	if(ballReleased == true){
        document.getElementById("startButton").style.display  = 'none';
	}
	if(ball.y - ball.r > cvs.height){
		end = true;
        document.getElementById("startButton").style.display  = 'block';
        document.getElementById("startButton").innerHTML  = 'Reštart';
		Object.freeze(ball);
	}
	if(blocksHit == block.r*block.c){
		end = true;
        document.getElementById("winner").style.display  = 'block';
        document.getElementById("startButton").style.display  = 'block';
        document.getElementById("startButton").innerHTML  = 'Reštart';
		Object.freeze(ball);
	}
}

function displayPause(pause) {
	if(pause){
        document.getElementById("pause").style.display  = 'block';
	} else { document.getElementById("pause").style.display  = 'none'; }
}

createBlocks();

function loop(){
	graphics();
	update();
	drawBlocks();
	text();
	// requestAnimationFrame(loop);
}

// loop();
var gameInterval = setInterval(loop, 20)

</script>