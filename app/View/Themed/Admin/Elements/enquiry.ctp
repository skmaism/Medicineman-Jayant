<style>
.send_enquiry {
    position: relative;
}
#loadingloder {
    background:#000000 url(img/loading.gif) no-repeat center;
    display: none;
    height: 100%;
    left: 0;
    margin: 0;
    opacity: 0.5;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 999999;
}
</style>
<div class="send_enquiry"> 
<h1 class="fmenuTec"> Send Enquiry </h1> 
<?php echo $this->form->create("Enquiry",array("id"=>"formEnquiryData"));?>
	
	<?php echo $this->form->input("name",array("type"=>"text","placeholder"=>"Name","class"=>"inputfeed","label"=>false,"div"=>false));
		  echo $this->form->input("email",array("type"=>"text","placeholder"=>"Email","class"=>"inputfeed","label"=>false,"div"=>false));
		  echo $this->form->input("contact",array("type"=>"text","placeholder"=>"Contact No","class"=>"inputfeed","label"=>false,"div"=>false));
		  
		   echo $this->form->input("message",array("type"=>"textarea","placeholder"=>"Text","rows"=>"2","class"=>"inputfeedtext","label"=>false,"div"=>false));
	 ?>
   
    <input type="button" name="submit" id="sendQueryData" class="subtn" value="SUBMIT" />
   <?php echo $this->form->end(); ?>
   
<div id="loadingloder" style="display: none;">
<?php //echo $this->html->image("loading.gif");?>

</div>
</div>

<script type="text/javascript">

$("#sendQueryData").live("click",function(){
	//alert("hi");
	var name = $("#EnquiryName").val();
	var email = $("#EnquiryEmail").val();
	var contact = $("#EnquiryContact").val();
	var message = $("#EnquiryMessage").val();
	
	if(name==""){
	alert("Name is require");
	$("#EnquiryName").focus();
	return false;
	}
	if(email==""){
	alert("Email is require");
	$("#EnquiryEmail").focus();
	return false;
	}
	
	else if(email.indexOf('@')<1 || email.indexOf('.')<1){

		 alert("You must enter a valid email address");
		 $("#EnquiryEmail").focus();
		  return false;
		}
		if(message==""){
	alert("message is require");
	$("#EnquiryMessage").focus();
	return false;
	}
	
		$.ajax({
			url: siteurl+'contact/enquiry',
			type: 'post',
			data: $('#formEnquiryData input[type=\'text\'], #formEnquiryData input[type=\'email\'], #formEnquiryData textarea'),
			dataType: 'html',
			beforeSend: function() {
				$('#loadingloder').show();								
			},		
			complete: function() {
				$('#loadingloder').hide();	
				document.getElementById("formEnquiryData").reset();
			},		
			success: function(html) {
			alert(html);
				
					
		},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});	
		
		return false;
	
});

</script>
