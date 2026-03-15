<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Party Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
margin:0;
padding:0;
font-family:Arial;
color:white;
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
text-align:center;

/* Party Gradient Background */

background: radial-gradient(circle,#ff3c3c,#8B0000,#000000);
}

/* Dashboard Box */

.dashboard-box{
width:95%;
max-width:900px;
background:rgba(0,0,0,0.6);
padding:40px;
border-radius:15px;
box-shadow:0 10px 30px rgba(0,0,0,0.7);
}

/* Gate Cards */

.gate-card{
background:rgba(255,255,255,0.1);
padding:25px;
border-radius:12px;
transition:0.3s;
}

.gate-card:hover{
transform:scale(1.05);
background:rgba(255,255,255,0.2);
}

h1{
margin-bottom:30px;
text-shadow:0 0 15px red;
}

</style>

</head>

<body>

<div class="dashboard-box">

<h1>🎉 XDBS Party Dashboard 🎉</h1>

<div class="row g-4">

<div class="col-6 col-md-3">
<div class="gate-card">
<h4>Gate 1</h4>
<a href="/gate-admin/1" class="btn btn-warning w-100 mt-2">
Open Gate
</a>
</div>
</div>

<div class="col-6 col-md-3">
<div class="gate-card">
<h4>Gate 2</h4>
<a href="/gate-admin/2" class="btn btn-warning w-100 mt-2">
Open Gate
</a>
</div>
</div>

<div class="col-6 col-md-3">
<div class="gate-card">
<h4>Gate 3</h4>
<a href="/gate-admin/3" class="btn btn-warning w-100 mt-2">
Open Gate
</a>
</div>
</div>

<div class="col-6 col-md-3">
<div class="gate-card">
<h4>Gate 4</h4>
<a href="/gate-admin/4" class="btn btn-warning w-100 mt-2">
Open Gate
</a>
</div>
</div>

</div>

<hr class="my-4">

<h3>Total Entries : {{$total}}</h3>

<div class="row mt-3">

<div class="col-6 col-md-3">
Gate 1 : {{$gate1}}
</div>

<div class="col-6 col-md-3">
Gate 2 : {{$gate2}}
</div>

<div class="col-6 col-md-3">
Gate 3 : {{$gate3}}
</div>

<div class="col-6 col-md-3">
Gate 4 : {{$gate4}}
</div>

</div>

</div>

</body>

</html>