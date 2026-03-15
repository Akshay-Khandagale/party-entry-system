<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Gate {{$gate}} Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
margin:0;
padding:0;
color:white;
font-family:Arial, sans-serif;
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
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

/* Main Card */

.card-box{
width:90%;
max-width:450px;
background:rgba(0,0,0,0.65);
padding:30px;
border-radius:15px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,0.7);
}

/* Gate Code */

.code{
font-size:60px;
font-weight:bold;
letter-spacing:5px;
margin:25px 0;
}

/* Timer */

#timer{
font-size:18px;
}

/* Tablet */

@media (max-width:768px){

.code{
font-size:50px;
}

}

/* Mobile */

@media (max-width:480px){

.card-box{
padding:20px;
}

.code{
font-size:42px;
letter-spacing:3px;
}

h2{
font-size:22px;
}

button{
font-size:18px;
}

}

</style>

</head>

<body>

<video autoplay muted loop playsinline id="bg-video">
<source src="{{ asset('video/party.mp4') }}" type="video/mp4">
</video>

<div class="card-box">

<h2 class="mb-3">Gate {{$gate}} Admin</h2>

<div id="code" class="code">-----</div>

<button class="btn btn-warning w-100 mb-3" onclick="generateCode()">
Generate Gate Code
</button>

<div id="timer"></div>

</div>

<script>

function generateCode(){

fetch('/generate-gate/{{$gate}}')

.then(res=>res.json())

.then(data=>{

document.getElementById("code").innerHTML = data.code;

startTimer();

});

}


function startTimer(){

let seconds = 20;

let timer = setInterval(function(){

seconds--;

document.getElementById("timer").innerHTML = "Expires in "+seconds+" sec";

if(seconds <= 0){

clearInterval(timer);

document.getElementById("code").innerHTML = "Expired";

}

},1000);

}

</script>

</body>
</html>