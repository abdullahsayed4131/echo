<script type="text/javascript" src="<?php echo base_url('assets/front_end/js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front_end/js/popper.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front_end/js/bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front_end/js/particles.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front_end/js/app.js'); ?>"></script>
<script>
$(document).ready(function(){

    /* Scrol Function */
    $(".addEvent").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#elementtoScrollToID").offset().top
        }, 2000);
    });

    /* Allow only numbers */
    $('#mobile').keypress(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
    });

    /* Errors Function */
    function removeErrors(){
        $('.name_error').html('');
        $('.email_error').html('');
        $('.mobile_error').html('');
    }

    /* Event Details Popup Function */
    $(document).on('click', '.eventDetailsLink', function(){

         var eventId = $(this).attr('rel');
         
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url('event_details'); ?>',
             data:{ 'eventId': eventId },
             success:function(res){
                 if(res.status == 200){
                    $('#eventInfo').html(res.data);
                    $('#eventDetailsPopup').modal('show');
                 }
             }
         })
    });

    /*User Details Popup*/
    $(document).on('click', '.userDetailsLink', function(){

         var eventId = $(this).attr('rel');
         /* Empty The MOdel Popup Form */
         $('#userDetailsPopup form')[0].reset();
         /* Remove Model Popup Errors */
         removeErrors();
         
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url('single_event_details'); ?>',
             data:{ 'eventId': eventId },
             success:function(res){
                 if(res.status == 200){
                    $('.evt_id').val(res.id);
                    $('#dateinput').val(res.date);
                    $('#userDetailsPopup').modal('show');
                 }
             }
         })
    });

    /* Book Event btn */
    $(document).on('click','.bookEventbtn', function(){
        
        $.ajax({
             type: 'POST',
             url:  '<?php echo base_url('book_event'); ?>',
             data: $('#bookEventForm').serialize(),
             success:function(data){
                 if(data.status == 201){
                     
                    if(data.name_error != ''){
                        $('.name_error').html(data.name_error);
                    }else{
                        $('.name_error').html('');
                    }
                    if(data.email_error != ''){
                        $('.email_error').html(data.email_error);
                    }else{
                        $('.email_error').html('');
                    }
                    if(data.mobile_error != ''){
                        $('.mobile_error').html(data.mobile_error);
                    }else{
                        $('.mobile_error').html('');
                    }
                    if(data.date_error != ''){
                        $('.date_error').html(data.date_error);
                    }else{
                        $('.date_error').html('');
                    }
                 }
                 if(data.status == 200){
                    $('#userDetailsPopup').modal('hide');
                    location.href = '<?php echo base_url('event/confirmation') ?>/'+data.booking_id;
                 }
             }
        })
    });

})
</script>