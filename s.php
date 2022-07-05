<script type="text/javascript">
		myDate = new Date("12-01-2017");
		var day = myDate.getDate();
		myDate.setDate(day + 2);
		
		//si
		var x = myDate;
		dia = x.getDate();
		mes = x.getMonth()+1;
		anio = x.getFullYear();
	    //$("#result").val(dia+'-'+mes+'-'+anio);

	    console.log(dia+'-'+mes+'-'+anio);
	    console.log(dia);
	    console.log(mes);
	    console.log(anio);
</script>