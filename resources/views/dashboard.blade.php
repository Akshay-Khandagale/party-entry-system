<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{
margin:0;
font-family:Arial;
color:white;
background: radial-gradient(circle,#ff3c3c,#8B0000,#000000);
}
.dashboard-box{
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

<div class="dashboard-box">

<h2 class="text-center mb-3">🎉 ADMIN DASHBOARD 🎉</h2>

<!-- FILTER + SEARCH -->
<form method="GET" class="row g-2 mb-3">

<div class="col-md-4">
<select name="gate" class="form-select">
<option value="">All Gates</option>
<option value="1" <?= ($filter==1)?'selected':'' ?>>Gate 1</option>
<option value="2" <?= ($filter==2)?'selected':'' ?>>Gate 2</option>
<option value="3" <?= ($filter==3)?'selected':'' ?>>Gate 3</option>
<option value="4" <?= ($filter==4)?'selected':'' ?>>Gate 4</option>
</select>
</div>

<div class="col-md-4">
<input type="text" name="search" value="<?= $search ?>" 
placeholder="Search Employee ID" class="form-control">
</div>

<div class="col-md-4">
<button class="btn btn-warning w-100">Apply</button>
</div>

</form>

<h5>Total Entries : <?= $total ?></h5>

<!-- GRAPH -->
<canvas id="chart" height="100"></canvas>

<hr>

<!-- TABLE -->
<div class="table-responsive">
<table class="table table-bordered table-striped mt-3">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Emp ID</th>
<th>Gate</th>
<th>Face</th>
<th>Time</th>
</tr>
</thead>

<tbody id="tableBody">

@foreach($entries as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->employee->name ?? '' }}</td>
<td>{{ $row->employee->employee_id ?? '' }}</td>
<td>Gate {{ $row->gate_id }}</td>
<td><img src="/faces/{{ $row->face_image }}" width="50"></td>
<td>{{ $row->created_at }}</td>
</tr>
@endforeach

</tbody>

</table>
</div>

</div>

<!-- GRAPH SCRIPT -->
<script>
const ctx = document.getElementById('chart');

new Chart(ctx, {
type: 'bar',
data: {
labels: ['Gate1','Gate2','Gate3','Gate4'],
datasets: [{
label: 'Entries',
data: [<?= $gate1 ?>,<?= $gate2 ?>,<?= $gate3 ?>,<?= $gate4 ?>]
}]
}
});
</script>

<!-- 🔴 AUTO REFRESH -->
<!-- <script>
setInterval(function(){
    location.reload();
},5000); // refresh every 5 sec
</script> -->

</body>
</html>