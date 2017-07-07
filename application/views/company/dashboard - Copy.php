<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<link rel="stylesheet" href="<?=base_url('assets/css/fullcalendar.css')?>">
<div class="content-wrapper">
<section class="content">
      <div class="row">
        <div class="col-xs-80 ">
        <div class="box" >
<div id='calendar'></div>
<br />
</div>
  </div>
 </div>
 </section>
</div>

<div id="createEventModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Task</h4>
      </div>
      <div class="modal-body">
        <form id="createAppointmentForm" class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="inputPatient">Patient:</label>
            <div class="controls">
                <input type="text" name="patientName" id="patientName" tyle="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="when">When:</label>
            <div class="controls controls-row" id="when" style="margin-top:5px;">
            </div>
        </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<style type="text/css" media="screen">
   .fc-widget-header:first-of-type, .fc-widget-content:first-of-type {
    border-left:1px solid #ddd;
    border-right: 1px solid #ddd;
}
	
#calendar {
    margin: 0 auto;
    max-width: 850px;
}
</style>
<script src="<?=base_url('assets')?>/js/lib/moment.min.js"></script>
<script src="<?=base_url('assets')?>/js/fullcalendar.js"></script>
<script>

	$(document).ready(function(e) {
       $('#calendar').fullCalendar({
   		 header: {
        left: 'prev,next today ',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,list'
			},
		selectable:true,
		select: function(start, end, allDay) {
			$('#myModal').modal('show');
		  endtime = $.fullCalendar.formatDate(end,'h:mm tt');
		  starttime = $.fullCalendar.formatDate(start,'ddd, MMM d, h:mm tt');
		  var mywhen = starttime + ' - ' + endtime;
		  $('#createEventModal #apptStartTime').val(start);
		  $('#createEventModal #apptEndTime').val(end);
		  $('#createEventModal #apptAllDay').val(allDay);
		  $('#createEventModal #when').text(mywhen);
		  $('#createEventModal').modal('show');
	   }
	   
		
	
		});
    });
  

</script>
<?php
include_once 'footer.php';
?>