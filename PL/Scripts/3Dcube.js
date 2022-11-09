
var xAngle = 0, yAngle = 0, w, h, isMouseDown = false, size =100, frame =0;
var xMov = [0,0], yMov = [0,0];

function start()
{
    var canvas= document.getElementById('full');
    canvas.width = 300;
    canvas.height = 150;
    ctx = canvas.getContext('2d');
  
    rotate();
}

function rotate()
{
    //-------------------------Cube rotation (with CSS)
    document.getElementById('cube').style.webkitTransform = "rotateX(" + xAngle + "deg) rotateY(" + yAngle + "deg)";
  
    ctx.save();
    requestAnimationFrame(rotate);
}

//--------------------Functions for input-------------------------------
//Mouse movement
function mousePos(event)
{
    if(isMouseDown)
    {
        xMov[0] = event.clientX;
        yMov[0] = event.clientY;
        yAngle -= (xMov[1]-xMov[0]) / 25 ;
        xAngle += (yMov[1]-yMov[0]) / 25;
    }
}

//Set coordinates on mouse click
function mouseDown(event)
{
    isMouseDown = true;
    xMov[1] = event.clientX;
    yMov[1] = event.clientY;
}

//isMouseDown = false on mouse key lift
function mouseUp(event)
{
    isMouseDown = false;
}

//Mobile touch position
function fingerPos (event)
{
    var touch = event.changedTouches[0];

    xMov[0] = touch.clientX;
    yMov[0] = touch.clientY;
    yAngle -= (xMov[1]-xMov[0]) / 25;
    xAngle += (yMov[1]-yMov[0]) / 25;
}

//Mobile coordinate setting
function fingerDown (event)
{
    var touch = event.touches[0];
    xMov[1] = touch.clientX;
    yMov[1] = touch.clientY ;
}
