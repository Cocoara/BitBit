    // SETTING ALL VARIABLES

    var actualImage = document.getElementById("actualImage<?php echo $incidencies_item['id_incidencia'] ?>").src;

    var isMouseDown = false;
    var canvas = document.createElement('canvas');
    var form = document.getElementById("form<?php echo $incidencies_item['id_incidencia'] ?>");
    var body = document.getElementsByTagName("body")[0];
    var where = document.getElementById("canvas<?php echo $incidencies_item['id_incidencia'] ?>");
    var ctx = canvas.getContext('2d');

    var image = new Image();
    image.onload = function() {
        ctx.drawImage(image, 0, 0);
    };
    image.src = actualImage;

    var linesArray = [];
    currentSize = 5;
    var currentColor = "rgb(0,0,0)";
    var currentBg = "white";




    // INITIAL LAUNCH

    createCanvas();

    // BUTTON EVENT HANDLERS



    document.getElementById('clear<?php echo $incidencies_item['id_incidencia'] ?>').addEventListener('click', function() {
        clearCanvas();
    });

    document.getElementById('colorpicker<?php echo $incidencies_item['id_incidencia'] ?>').addEventListener('change', function() {
        currentColor = this.value;
    });

    document.getElementById('controlSize<?php echo $incidencies_item['id_incidencia'] ?>').addEventListener('change', function() {
        currentSize = this.value;
        document.getElementById("showSize<?php echo $incidencies_item['id_incidencia'] ?>").innerHTML = this.value;
    });


    document.getElementById('guardar<?php echo $incidencies_item['id_incidencia'] ?>').addEventListener('click', save);


    // REDRAW 

    function clearCanvas() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

    function redraw() {
        for (var i = 1; i < linesArray.length; i++) {
            ctx.beginPath();
            ctx.moveTo(linesArray[i - 1].x, linesArray[i - 1].y);
            ctx.lineWidth = linesArray[i].size;
            ctx.lineCap = "round";
            ctx.strokeStyle = linesArray[i].color;
            ctx.lineTo(linesArray[i].x, linesArray[i].y);
            ctx.stroke();
        }
    }

    // DRAWING EVENT HANDLERS

    canvas.addEventListener('mousedown', function() {
        mousedown(canvas, event);
    });
    canvas.addEventListener('mousemove', function() {
        mousemove(canvas, event);
    });
    canvas.addEventListener('mouseup', mouseup);

    // CREATE CANVAS

    function createCanvas() {
        canvas.id = "canvas";
        canvas.width = '500';
        canvas.height = "400";
        canvas.style.zIndex = 8;
        canvas.style.position = "absolute";
        canvas.style.border = "1px solid";
        canvas.style.margin = "30px";
        ctx.fillStyle = currentBg;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        where.appendChild(canvas);
    }



    // SAVE FUNCTION

    function save() {

        var canvasImage = canvas.toDataURL("image/png");
        console.log(canvasImage);
        var blobImage = document.createElement('input');
        blobImage.type = 'text';
        blobImage.id = 'image<?php echo $incidencies_item['id_incidencia'] ?>';
        blobImage.name = 'canvasImage';
        blobImage.style.visibility = "hidden";
        blobImage.value = canvasImage;
        form.appendChild(blobImage);

    }



    // GET MOUSE POSITION

    function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top
        };
    }

    // ON MOUSE DOWN

    function mousedown(canvas, evt) {
        var mousePos = getMousePos(canvas, evt);
        isMouseDown = true
        var currentPosition = getMousePos(canvas, evt);
        ctx.moveTo(currentPosition.x, currentPosition.y)
        ctx.beginPath();
        ctx.lineWidth = currentSize;
        ctx.lineCap = "round";
        ctx.strokeStyle = currentColor;

    }

    // ON MOUSE MOVE

    function mousemove(canvas, evt) {

        if (isMouseDown) {
            var currentPosition = getMousePos(canvas, evt);
            ctx.lineTo(currentPosition.x, currentPosition.y)
            ctx.stroke();
            // store(currentPosition.x, currentPosition.y, currentSize, currentColor);
        }
    }

    // ON MOUSE UP

    function mouseup() {
        isMouseDown = false
        // store()
    }
