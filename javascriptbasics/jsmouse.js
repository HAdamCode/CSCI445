const canvas = document.getElementById("Canvas");
const ctx = canvas.getContext("2d");
const button = document.getElementById("button");

let buttonInit = true
button.addEventListener("click", function() {
    buttonInit = !buttonInit
    drawFace()
    button.textContent = buttonInit ? "Make Me Sad" : "Make Me Happy"
})

drawFace()

function drawFace() {
    if (buttonInit) {
        ctx.clearRect(0, 0, canvas.width, canvas.height)
        ctx.beginPath()
        ctx.arc(150, 150, 100, 0, Math.PI * 2)
        ctx.fillStyle = "#FFFF00"
        ctx.fill()
        ctx.lineWidth = 5
        ctx.strokeStyle = "#000"
        ctx.stroke()

        ctx.beginPath()
        ctx.arc(115, 125, 15, 0, Math.PI * 2)
        ctx.fillStyle = "#0000FF"
        ctx.fill()
        ctx.lineWidth = 2
        ctx.strokeStyle = "#000"
        ctx.stroke()
        ctx.beginPath()
        ctx.arc(185, 125, 15, 0, Math.PI * 2)
        ctx.fillStyle = "#0000FF"
        ctx.fill()
        ctx.lineWidth = 2
        ctx.strokeStyle = "#000"
        ctx.stroke()

        ctx.beginPath()
        ctx.arc(150, 170, 40, 0, Math.PI)
        ctx.lineWidth = 5
        ctx.strokeStyle = "#008000"
        ctx.stroke()
    }
    else {
        ctx.clearRect(0, 0, canvas.width, canvas.height)
        ctx.beginPath()
        ctx.arc(150, 150, 100, 0, Math.PI * 2)
        ctx.fillStyle = "#FFFF00"
        ctx.fill()
        ctx.lineWidth = 5
        ctx.strokeStyle = "#000"
        ctx.stroke()

        ctx.beginPath()
        ctx.arc(115, 125, 15, 0, Math.PI * 2)
        ctx.fillStyle = "#0000FF"
        ctx.fill()
        ctx.lineWidth = 10
        ctx.strokeStyle = "#000"
        ctx.stroke()
        ctx.beginPath()
        ctx.arc(185, 125, 15, 0, Math.PI * 2)
        ctx.fillStyle = "#0000FF"
        ctx.fill()
        ctx.lineWidth = 2
        ctx.strokeStyle = "#000"
        ctx.stroke()

        ctx.beginPath()
        ctx.arc(150, 210, 40, Math.PI, Math.PI * 2)
        ctx.lineWidth = 5
        ctx.strokeStyle = "#FF0000"
        ctx.stroke()
    }
}

canvas.addEventListener("click", function(event) {
    let rect = canvas.getBoundingClientRect()
    let x = event.clientX - rect.left
    let y = event.clientY - rect.top
    let distance = Math.sqrt((x-150) ** 2 + (y-150) ** 2)
 
    if (distance <= 100) {
        buttonInit = !buttonInit
        drawFace()
        button.textContent = buttonInit ? "Make Me Sad" : "Make Me Happy"
    }
})