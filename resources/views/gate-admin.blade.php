<h2>Gate 1</h2>
<h1 id="code"></h1>

<script>

function loadCode(){

fetch('/generate-gate/1')
.then(res=>res.json())
.then(data=>{

document.getElementById("code").innerHTML=data.code;

});

}

loadCode();

setInterval(loadCode,20000);

</script>