<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Gate Verification</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
margin:0;
padding:0;
color:white;
font-family:Arial;
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

/* Card */

.card-box{
width:90%;
max-width:420px;
background:rgba(0,0,0,0.65);
padding:25px;
border-radius:15px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,0.6);
}

/* Clock */

#time{
margin-top:15px;
font-size:18px;
}

/* Mobile */

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

<h3 class="mb-3">Gate Verification</h3>

@if(session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif

<form method="POST" action="/verify-gate">

@csrf

<input 
type="text"
name="gate_id"
placeholder="Enter Gate ID"
class="form-control mb-3"
required
>

<button type="submit" class="btn btn-warning w-100">
Verify Gate
</button>

</form>

<h5 id="time"></h5>

</div>


<script>

/* Live Clock */

setInterval(function(){

let now = new Date();

document.getElementById("time").innerHTML = now.toLocaleTimeString();

},1000);

</script>

</body>

</html>