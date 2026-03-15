<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Party Entry</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
color:white;
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
margin:0;
font-family:Arial;
}

/* Background Video */

#bg-video{
position:fixed;
right:0;
bottom:0;
min-width:100%;
min-height:100%;
object-fit:cover;
z-index:-1;
}

/* Card Layout */

.card-box{
width:90%;
max-width:420px;
background:rgba(0,0,0,0.65);
padding:25px;
border-radius:15px;
box-shadow:0 10px 30px rgba(0,0,0,0.6);
}

/* Camera */

#camera{
width:100%;
border-radius:10px;
margin-bottom:10px;
}

/* Mobile Adjustments */

@media (max-width:480px){

.card-box{
padding:20px;
}

h3{
font-size:22px;
}

button{
font-size:18px;
}

}

</style>

</head>

<body>

<!-- Background Video -->

<video autoplay muted loop playsinline id="bg-video">
<source src="{{ asset('video/party.mp4') }}" type="video/mp4">
</video>

<div class="card-box">

<h3 class="text-center mb-3">Party Entry</h3>

@if(session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif

<form method="POST" action="/check-employee">

@csrf

<input type="text" name="employee_id" placeholder="Employee ID" class="form-control mb-3" required>

<!-- Camera -->

<video id="camera" autoplay playsinline></video>

<canvas id="canvas" style="display:none;"></canvas>

<button type="button" onclick="capture()" class="btn btn-warning w-100 mb-2">
Capture Photo
</button>

<input type="hidden" name="face_image" id="face_image">

<button type="submit" id="submitBtn" class="btn btn-success w-100" disabled>
Submit
</button>

</form>

</div>


<script>

/* Start Camera */

navigator.mediaDevices.getUserMedia({ video: true })

.then(function(stream){

document.getElementById('camera').srcObject = stream;

})

.catch(function(error){

alert("Camera access denied");

});


/* Capture Photo */

function capture(){

let video = document.getElementById('camera');
let canvas = document.getElementById('canvas');

canvas.width = video.videoWidth;
canvas.height = video.videoHeight;

let ctx = canvas.getContext('2d');

ctx.drawImage(video,0,0);

let imageData = canvas.toDataURL('image/png');

document.getElementById('face_image').value = imageData;

/* Enable submit button */

document.getElementById('submitBtn').disabled = false;

alert("Photo Captured Successfully");

}

</script>

</body>
</html>