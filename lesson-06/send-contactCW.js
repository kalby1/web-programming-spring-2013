//Wait till page loads to run
$(document).ready(function(){
	 //wait for send button to be clicked
	$("#send-contact").click(function() {
		//get the data from the form
		var choices = [];
		$('.choices:checked').each(function(index){
			choices[index] = $(this).val();
			});
		var contact = {customername: $("#customername").val(), customeremail: $("#email").val() , phone: $("#phone").val() , comment: $("#comment").val() , services: choices };											
		$.ajax({
			   type:"POST",
			   url:'send-contact.php',
			   data:contact
			   }).done(function(){
			   	alert("Thanks for your reply. You will hear from us within a day.");
			   });
			   });
 });
