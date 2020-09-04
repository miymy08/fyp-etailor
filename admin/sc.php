 <script>  
               Webcam.set({
               width: 110,
               height: 60,
               image_format: 'png',
               jpeg_quality: 90
                });
  
              Webcam.attach( '#my_camera<?php echo $i?>' );
  
               function take_snapshot<?php echo $i ?>() {
                  Webcam.snap( function(data_uri) {
                  $(".image-tag<?php echo $i?>").val(data_uri);
                  document.getElementById('results<?php echo $i ?>').innerHTML = '<img src="'+data_uri+'"/>';
                  } );
                } 
             
             
             
             
             
             $(document).ready(function(){  
                  $('#submit<?php echo $i?>').click(function(){  
                       event.preventDefault();
                       var order_code = $('#order_code<?php echo $i?>').val();
                       var receive_date = $('#receive_date<?php echo $i?>').val();  
                       var pickup_date = $('#pickup_date<?php echo $i?>').val();
                       var status = $('#status<?php echo $i?>').val();
                       var catatan = $('#catatan<?php echo $i?>').val();

                       var image = $('#image<?php echo $i?>').files;
                       if(order_code == '' || receive_date == '' || pickup_date == ''
                       || status == '' || catatan == '')  
                       {  
                            $('#error_message<?php echo $i?>').html("All Fields are required");  
                       }  
                       else  
                       {  
                            $('#error_message<?php echo $i?>').html('');  
                            $.ajax({  
                                 url:"order_process.php",  
                                 method:"POST",  
                                 data:{order_code:order_code, receive_date:receive_date, pickup_date:pickup_date, status:status,
                                 catatan:catatan, image:image},  
                                 success:function(data){  
                                      /*$("form").trigger("reset");  */
                                      $('#success_message<?php echo $i?>').fadeIn().html(data);  
                                    /* setTimeout(function(){  
                                           $('#success_message').fadeOut("Slow");  
                                      }, 2000);  */
                                 }  
                            });  
                       }  
                  });  
             });  
             </script> 