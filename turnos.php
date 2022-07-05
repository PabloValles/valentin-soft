<?php include("header.php");
if (isset($_POST['s'])){
    $busca = mysqli_real_escape_string($conexion,$_POST['s']);
} 
?>
<link href='assets/calendar/css/fullcalendar.css' rel='stylesheet' />
<link href='assets/calendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/calendar/js/moment.min.js'></script>
<script src='assets/js/jquery.min.js'></script>
<script src='assets/calendar/js/jquery-ui.min.js'></script>
<script src='assets/calendar/js/fullcalendar.js'></script>
<script src='assets/calendar/js/fullcalendar.min.js'></script>
<script src="assets/calendar/js/lang/es.js"></script>
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
<script>

	$(document).ready(function() {

		var zone = "05:30";  //Change this to your timezone

	$.ajax({
		url: 'process.php',
        type: 'POST', // Send post data
        data: 'type=fetch',
        async: false,
        success: function(s){
        	json_events = s;
        }
	});


	var currentMousePos = {
	    x: -1,
	    y: -1
	};
		jQuery(document).on("mousemove", function (event) {
        currentMousePos.x = event.pageX;
        currentMousePos.y = event.pageY;
    });

		/* initialize the external events
		-----------------------------------------------------------------*/
		$('#external-events .fc-event').each(function() {

			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true // maintain when user navigates (see docs on the renderEvent method)
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});
        
		/* initialize the calendar
		-----------------------------------------------------------------*/
		$('#calendar').fullCalendar({
            defaultView:'agendaWeek',
            contentHeight:'auto', 
            locale: 'es',
			events: JSON.parse(json_events),
			//events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
            lang: 'es',
			utc: true,
			header: {
                language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			droppable: true, 
			slotDuration: '00:15:00',
			eventReceive: function(event){
				var title = event.title;
				var start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
				$.ajax({
		    		url: 'process.php',
		    		data: 'type=new&title='+title+'&startdate='+start+'&zone='+zone,
		    		type: 'POST',
		    		dataType: 'json',
		    		success: function(response){
		    			event.id = response.eventid;
		    			$('#calendar').fullCalendar('updateEvent',event);
		    		},
		    		error: function(e){
		    			console.log(e.responseText);

		    		}
		    	});
				$('#calendar').fullCalendar('updateEvent',event);
				console.log(event);
			},
			eventDrop: function(event, delta, revertFunc) {
		        var title = event.title;
		        var start = event.start.format();
		        var end = (event.end == null) ? start : event.end.format();
		        $.ajax({
					url: 'process.php',
					data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
					type: 'POST',
					dataType: 'json',
					success: function(response){
						if(response.status != 'success')		    				
						revertFunc();
					},
					error: function(e){		    			
						revertFunc();
						alert('Error processing your request: '+e.responseText);
					}
				});
		    },
		    eventClick: function(event, jsEvent, view) {
		    	  console.log(event.id);
		          var title = prompt('Turno:', event.title, { buttons: { Ok: true, Cancel: false} });
		          if (title){
		              event.title = title;
		              console.log('type=changetitle&title='+title+'&eventid='+event.id);
		              $.ajax({
				    		url: 'process.php',
				    		data: 'type=changetitle&title='+title+'&eventid='+event.id,
				    		type: 'POST',
				    		dataType: 'json',
				    		success: function(response){	
				    			if(response.status == 'success')			    			
		              				$('#calendar').fullCalendar('updateEvent',event);
				    		},
				    		error: function(e){
				    			alert('Error processing your request: '+e.responseText);
				    		}
				    	});
		          }
			},
			eventResize: function(event, delta, revertFunc) {
				console.log(event);
				var title = event.title;
				var end = event.end.format();
				var start = event.start.format();
		        $.ajax({
					url: 'process.php',
					data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
					type: 'POST',
					dataType: 'json',
					success: function(response){
						if(response.status != 'success')		    				
						revertFunc();
					},
					error: function(e){		    			
						revertFunc();
						alert('Error processing your request: '+e.responseText);
					}
				});
		    },
			eventDragStop: function (event, jsEvent, ui, view) {
			    if (isElemOverDiv()) {
			    	//var con = confirm('Are you sure to delete this event permanently?');
                    swal({
                        title: "Seguro desea eliminar el turno asignado?",
                        text: "Una vez eliminado, no podrá recuperarse !",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-danger',
                        confirmButtonText: "Si, borrar",
                        closeOnConfirm: false
                    },function () {
                        $.ajax({
				    		url: 'process.php',
				    		data: 'type=remove&eventid='+event.id,
				    		type: 'POST',
				    		dataType: 'json',
				    		success: function(response){
				    			console.log(response);
                                swal("Eliminado!", "El turno ha sido eliminado.", "success");
				    			if(response.status == 'success'){
				    				$('#calendar').fullCalendar('removeEvents');
            						getFreshEvents();
            					}
				    		},
				    		error: function(e){	
				    			alert('Error processing your request: '+e.responseText);
				    		}
			    		});
                    });
			    	/*if(con == true) {
						$.ajax({
				    		url: 'process.php',
				    		data: 'type=remove&eventid='+event.id,
				    		type: 'POST',
				    		dataType: 'json',
				    		success: function(response){
				    			console.log(response);
				    			if(response.status == 'success'){
				    				$('#calendar').fullCalendar('removeEvents');
            						getFreshEvents();
            					}
				    		},
				    		error: function(e){	
				    			alert('Error processing your request: '+e.responseText);
				    		}
			    		});
					}   */
				}
			}
		});

	function getFreshEvents(){
		$.ajax({
			url: 'process.php',
	        type: 'POST', // Send post data
	        data: 'type=fetch',
	        async: false,
	        success: function(s){
	        	freshevents = s;
	        }
		});
		$('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
	}


	function isElemOverDiv() {
        var trashEl = jQuery('#trash');

        var ofs = trashEl.offset();

        var x1 = ofs.left;
        var x2 = ofs.left + trashEl.outerWidth(true);
        var y1 = ofs.top;
        var y2 = ofs.top + trashEl.outerHeight(true);

        if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
            currentMousePos.y >= y1 && currentMousePos.y <= y2) {
            return true;
        }
        return false;
    }

	});

</script>
<style>

    body {

    }

    #trash{
        width:32px;
        height:32px;
        float:left;
        padding-bottom: 15px;
        position: relative;
    }

    #wrap {
        width: 1100px;
        margin: 0 auto;
    }

    #external-events {
        float: left;
        width: 150px;
        padding: 0 10px;
        border: 1px solid #ccc;
        background: #eee;
        text-align: left;
    }

    #external-events h4 {
        font-size: 16px;
        margin-top: 0;
        padding-top: 1em;
    }

    #external-events .fc-event {
        margin: 10px 0;
        cursor: pointer;
        border-color: darkblue;
        border-radius: 0px;
    }

    #external-events p {
        margin: 1.5em 0;
        font-size: 11px;
        color: #666;
    }

    #external-events p input {
        margin: 0;
        vertical-align: middle;
    }

    #calendar {
        float: right;
        width: 900px;
    }
</style>
<body>

<?php include("navs.php");?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <a href="listado_turnos.php" class="btn btn-secondary"><i class="fa fa-info"></i> Listado de turnos</a>
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i
                                    class="fa fa-cog"></i></span></button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="pacientes.php">Ir a pacientes</a>
                                <a class="dropdown-item" href="consultas.php">Consultas</a>
                                <a class="dropdown-item" href="index.php">Panel de control</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="config.php">Configuraciones</a>
                            </div>
                        </div>
                        <h4 class="page-title">Módulo turnos</h4>                        
                    </div>
                    <div class="col-md-4 col-xs-12 col-sn-12">
                        <form action="" method="post">
                        <div class="input-group">
                            <input type="text" name="s" class="form-control" placeholder="Filtrar">
                            <span class="input-group-btn">
                                <button type="submit" name="filtrar" class="btn btn-primary">Filtrar Paciente</button>
                            </span>
                        </div>
                        </form>
                    </div>
                </div>
                <hr><br>
                <div class="row">
                    <div class="col-md-12 col-lg-12">                        
                        <div id='wrap'>
                            <div id='external-events'>
                                <h4>Arrastre para agregar los turnos <i class="fa fa-calendar"></i></h4>
                                <?php
                                if(empty($busca)){
                                     $pac = "select * from pacientes order by apellido_pac limit 10";
                                     $query = mysqli_query($conexion,$pac) or die(mysqli_error($conexion));
                                }else{
                                    $pac = "select * from pacientes where apellido_pac like '%".$busca."%' or nombre_pac like '%".$busca."%' or fecha_nacimiento like '%".$busca."%' or edad_pac like '%".$busca."%' or dni_pac like '%".$busca."%'";
                                    $query = mysqli_query($conexion,$pac) or die(mysqli_error($conexion));
                                }
                                    while($llena_paciente=mysqli_fetch_array($query)){
                                        ?>
                                        <div class='fc-event'>
                                            <?php echo $llena_paciente['apellido_pac']." ".$llena_paciente['nombre_pac']." dni: ".$llena_paciente['dni_pac'];?>
                                        </div>
                                        <?php
                                    }
                                ?>
                                <hr>
                                <p>
                                    <i class="fa fa-trash fa-3x" id="trash"></i> 
                                </p><small>Arrastrar aquí para eliminar turno </small>
                            </div>
                            
                            <div id='calendar'></div>

                            <div style='clear:both'></div>

                            <xspan class="tt">x</xspan>

                        </div>
                    </div>
                </div>
                
                
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                2016 © Dra. Fabiana Valles.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

<script>
    var resizefunc = [];
</script>
<!-- jQuery  -->
<!--<script src="assets/js/jquery.min.js"></script>-->
<script src="assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/plugins/switchery/switchery.min.js"></script>

<script src="assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script>
$(document).ready(function(){

    $("#pac").select2();
    
    
});      
</script>
</body>
</html>