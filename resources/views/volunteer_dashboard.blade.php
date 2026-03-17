<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Volunteer Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
margin:0;
font-family:Arial;
color:white;
background: linear-gradient(to right,#000000,#8B0000);
}
.box{
width:95%;
margin:auto;
margin-top:20px;
background:rgba(0,0,0,0.7);
padding:25px;
border-radius:15px;
}
.table{ color:white; }
</style>
</head>

<body>

<div class="box">

<h2 class="text-center">👷 Volunteer Dashboard - Gate {{ $gate_id }}</h2>

<h4>Total Verified : {{ $total }}</h4>

<!-- GENERATE CODE -->
<div class="text-center my-3">
<button onclick="generateCode()" class="btn btn-warning">
Generate Gate Code
</button>

<h3 id="code" class="mt-3"></h3>
</div>

<hr>

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

fetch('/generate-gate/{{ $gate_id }}')
.then(res => res.json())
.then(data => {
document.getElementById('code').innerHTML = "Code : "+data.code;
});

}

// // 🔴 AUTO REFRESH
// setInterval(()=>{
// location.reload();
// },5000);
// </script>

</body>
</html>