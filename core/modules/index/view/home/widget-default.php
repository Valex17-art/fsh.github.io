<?php

$events = EventData::getEvery();
foreach($events as $event){

	$thejson[] = array("title"=>$event->title,"url"=>"./?view=editreservation&id=".$event->id,"start"=>$event->date_at."T".$event->time_at);

}
// print_r(json_encode($thejson));

?>
<script>
     $(document).ready(function() {
 
    //calendar
         $('#calendar').fullCalendar({
             firstDay: 1,
             monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
             monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
             dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles',
             'Jueves', 'Viernes', 'Sábado'],
             dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
             buttonText:
              {
                  prev:     ' ◄ ',
                  next:     ' ► ',
                  prevYear: ' &lt;&lt; ',
                  nextYear: ' &gt;&gt; ',
                  today:    'Hoy',
                  month:    'Mes',
                  week:     'Semana',
                  day:      'Día'
              },
             header: {
                 left: 'prev,next today',
                 center: 'title',
                 right: 'month,basicWeek,basicDay'
             },
             editable: false,
             events: <?php echo json_encode($thejson); ?>
 
         });
 
     });

</script>


<div class="row">
<div class="col-md-12">
<h1>Calendario</h1>
<div id="calendar"></div>

</div>
</div>
