const toField = document.getElementById("toField")
const to_field = document.getElementById("to_field")

to_field.addEventListener("change", function() {
    toField.textContent = to_field.value
})

const thePicture = document.getElementById("thePicture")
const picture = document.getElementById("picture")

picture.addEventListener("change", function() {
    thePicture.src = "images/" + picture.value + ".jpg"
    document.getElementById("picture").blur();
})

const myCanvas = document.getElementById("myCanvas")
const ctx = myCanvas.getContext("2d")

const image = new Image()
let x = 0
let y = 0
image.src = "images/crazycat.gif"
image.onload = function() {
    ctx.drawImage(image, x, y)
    drawMessage()
}

const you = document.getElementsByClassName("you")

document.addEventListener("keydown", function(event) {
    if (event.key == "ArrowLeft") {
        if (x - 5 >= 0) {
            x -= 5
            ctx.clearRect(0, 0, myCanvas.width, myCanvas.height)
            ctx.drawImage(image, x, y)
            drawMessage()
        }
    }
    else if (event.key == "ArrowRight") {
        if (x + 5 + image.width <= myCanvas.width) {
            x += 5
            ctx.clearRect(0, 0, myCanvas.width, myCanvas.height)
            ctx.drawImage(image, x, y)
            drawMessage()
        }
    }
    else if (event.key == "ArrowUp") {
        if (y - 5 >= 0) {
            y -= 5
            ctx.clearRect(0, 0, myCanvas.width, myCanvas.height)
            ctx.drawImage(image, x, y)
            drawMessage()
        }
    }
    else if (event.key == "ArrowDown") {
        if (y + 5 + image.height <= myCanvas.height) {
            y += 5
            ctx.clearRect(0, 0, myCanvas.width, myCanvas.height)
            ctx.drawImage(image, x, y)
            drawMessage()
        }
    }
    if (x + image.width > myCanvas.width - 5 && y + image.height > myCanvas.height - 5) {
        Array.from(you).forEach(element => {
            element.style.color = "blue"
            element.style.backgroundColor = "red"
        });
        alert("You hit rock bottom")
    }
})

function drawMessage() {
    ctx.font = "12px 'Comic Sans MS'"
    ctx.fillStyle = "black"
    const message = "Here Kitty"
    const textWidth = ctx.measureText(message).width;
    const textX = myCanvas.width - textWidth - 5
    const textY = myCanvas.height - 5
    ctx.fillText(message, textX, textY)
}