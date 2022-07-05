<script>
var fecha = new Date("11-17-2016");
var hoy = new Date("08-13-2017");
var  ed = parseInt((hoy -fecha)/7/24/60/60/1000);
    

console.log(fecha.getDate() + "/" + (fecha.getMonth() +1) + "/" + fecha.getFullYear());
console.log(hoy.getDate() + "/" + (hoy.getMonth() +1) + "/" + hoy.getFullYear());
console.log(ed);
</script>