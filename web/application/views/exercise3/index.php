<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>

    $(function() { 
    
      var $form = $("#myForm");
      var field = 'my_input';
      var $answer = $("#result");
      
      $form.submit(function( event ) {
        $.ajax({
          type: "POST",
          url: '<?php echo site_url('exercise3_rest/index.json')?>',
          data: $form.serialize(), // serializes the form's elements.
          success: function(data) {
             $answer.html('<strong>' + data[field] + '</strong> on ' + new Date());
          }
        });
       
        event.preventDefault();
      });
     
    });  
  </script>
</head>
<body>
<?php
echo form_open('exercise3_rest/index', array('id'=> 'myForm'));

$data = array(
              'name'        => 'my_input',
            );

echo form_input($data);
echo form_submit('mysubmit', 'Send post request');

echo form_close();
?>
<br>
<div>Answer from server: <span style="border: 1px solid black" id="result">Not launched yet</span></div>

</body>
</html>
