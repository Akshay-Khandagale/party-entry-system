<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>XDBS Annual Party</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* Page Layout */

body{
margin:0;
padding:0;
font-family:Arial, sans-serif;
color:white;
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
text-align:center;

/* Red Party Gradient Background */

background: radial-gradient(circle,#ff3c3c,#8B0000,#000000);
}

/* Card Box */

.card-box{
width:90%;
max-width:500px;
background:rgba(0,0,0,0.6);
padding:40px;
border-radius:15px;
box-shadow:0 10px 30px rgba(0,0,0,0.6);
}

/* Welcome Heading */

h1{
font-size:38px;
font-weight:bold;
margin-bottom:10px;
text-shadow:0 0 20px #ff0000;
}

/* Party Title */

.party-title{
font-size:24px;
color:#ffc107;
margin-bottom:15px;
}

/* Message */

.message{
font-size:18px;
margin-bottom:10px;
}

/* Time */

#time{
font-size:20px;
margin-top:15px;
}

/* Mobile Responsive */

@media (max-width:480px){

.card-box{
padding:25px;
}

h1{
font-size:28px;
}

.party-title{
font-size:20px;
}

.message{
font-size:16px;
}

}

</style>

</head>

<body>

<div class="card-box">

<h1>🎉 Welcome 🎉</h1>

<div class="party-title">
XDBS Annual Party
</div>

<div class="message">
Your entry has been successfully verified.
</div>

<div class="message">
Enjoy the celebration! 🎊
</div>

<h4 id="time"></h4>

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