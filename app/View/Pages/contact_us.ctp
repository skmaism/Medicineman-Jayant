<div class="left_zone">
    <h1>Contact Us</h1>
    <div class="contct_box">
     <div id="form_error"><?php echo $this->Session->flash(); ?></div>
        
        <?php 
       echo $this->form->create("Contact",array("url"=>array("controller"=>"cmspages","action"=>"contact")));
        echo $this->form->input("name",array("label"=>"Name:","placeholder"=>"Name"));
        echo $this->form->input("email",array("type"=>"email","label"=>"Email Addresss:","placeholder"=>"Email Addresss","div"=>array("style"=>"margin-top:0px;")));
        echo $this->form->input("phone",array("type"=>"text","label"=>"Phone:","placeholder"=>"Phone"));
        
        echo $this->form->input("message",array("type"=>"textarea","label"=>"Message:","placeholder"=>"Write something to us"));
        echo "<div><label class='last'>&nbsp;</label>";
        
        echo $this->form->input("hcid",array("type"=>"hidden","label"=>"Phone:","placeholder"=>"Phone"));
        
      echo $this->form->button("submit",array("class"=>"button4","type"=>"button"));
      echo "</div>";
      echo  $this->form->end();
        ?>
        
     
        
       
    </div>
</div>
<div class="right_zone">
    <?php echo $this->html->image("login.png"); ?>
</div>

<script>
     
     $("#ContactDisplayForm button").on("click", function() {
          var _this = $(this);
   
        $('#form_error').hide();
          var error = [];
          var name = $("form #ContactName").val();
          var email = $("form #ContactEmail").val();
          var mobile = $("form #ContactPhone").val();
          var message = $("form #ContactMessage").val();
          if (name == "") {
               error[error.length] = "First name is required";
          }
          
          if (email == "") {
               error[error.length] = "Email is required";
          } else if (!emailChack(email)) {
               error[error.length] = "Invalid email";
          }
          if (mobile == "") {
               error[error.length] = "Phone Number is required";
          }
          if (message == "") {
               error[error.length] = "Message is required";
          }
     
    
     if (error.length > 0) {
          var html = '<ul>';
          $.each(error, function(index, value) {
               html += "<li>" + (index + 1) + ": " + value + "</li>";
          });
          html += "</ul>";
          contant_front(html);
           return false;
     }

           $.ajax({
               url: '<?php echo $this->webroot; ?>cmspages/contact',
               type: 'post',
               data: $('form#ContactDisplayForm input[type=\'text\'], form#ContactDisplayForm input[type=\'email\'], form#ContactDisplayForm input[type=\'hidden\'], form#ContactDisplayForm textarea'),
               dataType: 'json',
               beforeSend: function() {
                    _this.attr('disabled','disabled');
               },
               complete: function() {
                    _this.removeAttr('disabled');
               },
               success: function(record) {
                    if (record.sucess == true) {
                         alert(record.err_msg);
                         $('#ContactDisplayForm')[0].reset();
                         //$('button#cboxClose').trigger('click');
                         } else{
                        alert(record.err_msg);
                         }
               },
               error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
               },
               async: false
          });

          return false;

     

    


});

     function contant_front(html) {
     var contant = '<div class="alert">';
     contant += html;
     contant += '</div>';
     $('#form_error').html(contant);
     $('#form_error').fadeIn('slow');

}

function emailChack(email) {
     var email_regex = /^[\w%_\-.\d]+@[\w.\-]+.[A-Za-z]{2,6}$/; // reg ex email check - See more at: http://istockphp.com/jquery/jquery-simple-validation-in-registration-form/#sthash.rMLqlhU0.dpuf
     if (!email_regex.test(email)) { // if invalid email
          return false;
     }
     else
          return true;

}
     </script>