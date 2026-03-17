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

/* Main Box */
.main-box{
width:95%;
margin:auto;
margin-top:20px;
background:rgba(0,0,0,0.7);
padding:20px;
border-radius:15px;
}

/* Code */
.code{
font-size:50px;
font-weight:bold;
letter-spacing:5px;
margin:20px 0;
}

/* Table */
.table{
color:white;
}

</style>

</head>

<body>

<video autoplay muted loop playsinline id="bg-video">
<source src="{{ asset('video/party.mp4') }}" type="video/mp4">
</video>

<div class="main-box">

<h2 class="text-center">🎉 Gate {{$gate}} Dashboard 🎉</h2>

<!-- CODE GENERATOR -->
<div class="text-center">

<div id="code" class="code">-----</div>

<button class="btn btn-warning mb-2" onclick="generateCode()">
Generate Gate Code
</button>

<div id="timer"></div>

</div>

<hr>

<!-- COUNT -->
<h4>Total Verified : {{ $total }}</h4>

<!-- TABLE -->
<div class="table-responsive">
<table class="table table-bordered table-striped">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Employee ID</th>
<th>Face</th>
<th>Time</th>
</tr>
</thead>

<tbody>

@foreach($entries as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->employee->name ?? '' }}</td>
<td>{{ $row->employee->employee_id ?? '' }}</td>
<td><img src="/faces/{{ $row->face_image }}" width="50"></td>
<td>{{ $row->created_at }}</td>
</tr>
@endforeach

</tbody>

</table>
</div>

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

// // 🔴 AUTO REFRESH TABLE
// setInterval(function(){
// location.reload();
// },5000);

</script>

</body>
</html>