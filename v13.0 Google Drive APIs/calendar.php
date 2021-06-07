<?PHP

?>

<!DOCTYPE html>
<html>
<head>
  <title>Viva Volt</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
</head>
<body>
  <br />
  <h2 align="center"><a href="#">Viva Volt Calendar</a></h2>
  <br />

  <div class="container" style="margin-left: 250px; margin-right: 200px; width: 80%">
   <div id="calendar"></div>
 </div>

 <!-- footer start-->
 <footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 footer-copyright">
        <p class="mb-0">&copy; 2017-21 VIVA ONLINE LEARNING TECHNOLOGIES | VOLT</p>
      </div>
    </div>
  </div>
</footer>
</div>
</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add event</h4> <i data-feather="calendar"></i>  
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body" >
       <form id="eventform">
        <div class="form-group">
          <?php
          if(session()->get('voltAccountType')!="student")
            {?>
             <label for="validationCustom02" class="col-form-label"><span></span>Class</label>
             <select name="class" id="period_id" class="form-control .mt-n1"   style="border-color:#b3b3b3; background: #ffffff; border-radius: 3px;">


              <option  value="">Select Class</option>
              <?php if(!empty($periodarray))
              {
                foreach ($periodarray as $key) {
                 ?>
                 <option value="<?php echo $key[0];?>"><?php echo stripslashes($key[1]." ".$key[2]." ".$key[3]);?></option> <?php      
               }
             }?> 
           <?php } 
           ?>

         </select>
         <label for="event description" class="form-label">Event description</label><br>
         <input type="text" name="eventdescription" id="eventdescription"  class="form-control .mt-n1"   style="border-color:#b3b3b3; background: #ffffff; border-radius: 3px; " required="">
         <label for="validate-chapter" class="form-label"><span></span>Chapter to be added</label>
         <select type="text" list="chapter" name="chapter" id="chapter1234" class="form-control .mt-n1"   style="border-color:#b3b3b3; background: #ffffff; border-radius: 3px;" />
       
           <option  value="">Select Chapter</option>
           <?php if(!empty($chapterlist)){
            foreach ($chapterlist as $chapter) {
              foreach($chapter as $subchapter){
              ?>

              <option value="<?php echo $subchapter->id;?>"><?php echo $subchapter->chapT_name;?></option> 
              <?php      
            }
            }
          }?>
      </select>
        <?php 
        if(session()->get('voltAccountType')!="student")
          {?>

         <input type="checkbox" id="push_notification" name="push_notification" value="true">
         <label for="push_notification">Send Notification</label><br>
       <?php }?>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-info" >Add</button>
     </div>
   </form>
 </div>
</div>
</div>
</div>

<!--My Modal for events-->
<!-- Modal -->
<div id="eventviewmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Event</h4> <i data-feather="calendar"></i>  
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" >
      </div>
      <div class="modal-footer">
        <button type="button"  id="deleteEvent" class="btn btn-secondary">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
<!--My Modal for events view-->
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script>

  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,

    header:{
     left:'prev,next today addEventButton',
     center:'title',
     right:'month,agendaWeek,agendaDay'
   },

   
   events:  "<?php echo base_url();?>" +'/load_event',
   //eventColor: '#378006',
   displayEventTime: false,
   selectable:true,
   selectHelper:true,
   select: function(start, end, allDay)
   {
     $('#myModal').modal('toggle');
     $(function(){
      $('#eventform').on('submit', function(e){

       start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
       end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
       title =$('#eventdescription').val();
       chapterid =$('#chapter1234').val();

       let push_notification=$('input[name="push_notification"]:checked').val();
      
       period_id=0;
       period_id=$('#period_id').val();
       $('#myModal').modal('hide');

       e.preventDefault();
       $.ajax({
         url: "<?php echo base_url();?>" +'/insert_event',
         type:"POST",
         data:{title:title, start:start, end:end,chapterid:chapterid,period_id:period_id,push_notification:push_notification},
         success:function(result)
         {

          calendar.fullCalendar('refetchEvents');
          if(result==1)
          {
            alert("Added Successfully");
           
          }
          else
          {
            alert("Something went wrong");
          }
            location.reload();

        }
      });  
     });
    });
   },
   editable:true,
   eventResize:function(event)
   {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url :"<?php echo base_url();?>" +'/update_event',
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
     }
   })
   },

   eventDrop:function(event)
   {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url: "<?php echo base_url();?>" +'/update_event',
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
     }
   });
   },

   eventClick:function(event)
   {
    var id = event.id;
    $.ajax({
     url: "<?php echo base_url();?>" +'/fetch_event',
     type:"POST",
     data:{id:id},
     success:function(result)
     {
      calendar.fullCalendar('refetchEvents');
      $('.modal-body').html(result);
      $('#eventviewmodal').modal('show');

      
    }});
    $('#deleteEvent').click(function(){

     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url: "<?php echo base_url();?>" +'/delete_event',
       type:"POST",
       data:{id:id},
       success:function(result)
       {
        $('#eventviewmodal').modal('hide');
        calendar.fullCalendar('refetchEvents');
        if(result==1)
        {
          alert("Event Removed");
        }
        else
        {
          alert("Its a class event, can't be removed");
        }
        location.reload();

      }
    });
    }
  });

  },

});
 });

</script>


<!-- Bootstrap js-->
<script src="<?= base_url('assets') ?>/schoolassets/js/bootstrap.js"></script>
<!-- feather icon js-->
<script src="<?= base_url('assets') ?>/schoolassets/js/icons/feather-icon/feather.min.js"></script>
<script src="<?= base_url('assets') ?>/schoolassets/js/icons/feather-icon/feather-icon.js"></script>
