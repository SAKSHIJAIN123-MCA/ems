<?php 
session_start();
?>

<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event management System</title>
<style>

/* Form Style */
form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background: #f9f9f9;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"],
input[type="email"],
select,
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

/* Optional: Placeholder Styles */
input[type="text"]::placeholder,
input[type="email"]::placeholder,
textarea::placeholder {
  color: #999;
}

/* Optional: Error Message Style */
.error-message {
  color: red;
  margin-top: 5px;
}

</style>
  <script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="jquery/jquery-ui.js" language="javascript"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="scripts/contact.js" language="javascript"></script>
  <script type="text/javascript" src="jquery/jquery.validate.min.js" language="javascript"></script>
  <script type="text/javascript" src="scripts/contact.js" language="javascript"></script>
  <script type="text/javascript">

  $(function() {
    $( "#edit-submitted-event-date" ).datepicker();
  });

  </script>

  
</head >
<body onload="filltext();">
<div id="contact_event">
              <div id="abc">Book an Event </div>
            </div>
          </div><!--end of head-->
          
          <div id="textbox">
          
         <div id="black"></div>
         <div id="maincc">
    
		 <form action="contact_book.php" name="formid" id="register-form" method="post" novalidate="novalidate" onSubmit="return formValidation();" >
		 <div id="name">
  <input type="name" id="edit-submitted-name" name="name" class="form-textarea" value="" placeholder="Name" size="50" maxlength="128" style="color: rgb(000, 000, 000);" onclick="clrtext()" onblur="textval()">
</div><br>

<div id="department">
<select id="edit-submitted-dapartment" name="dname" class="form-select" required>
<option selected="selected" disabled="disabled">Decoration TYPE</option>
    <option>Lighting Effects</option>
    <option>Ballons</option>
    <option>simple flower decoration</option>
    <option> VIP lighting effects</option>
   </select>
</div>

<div id="phones">
  <input type="text" id="edit-submitted-phone" name="pnumber" class="form-textarea" value="" placeholder="Phone Number" size="50" maxlength=" " style="color: rgb(000, 000, 000);" onclick="clrphone()" onblur="phone()" />
</div>

<div id="emails">
  <input type="email" id="edit-submitted-email" name="emailid" class="form-textarea" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="" placeholder="E-mail" size="50" maxlength=" " style="color: rgb(000, 000, 000);" onclick="clremail()" onblur="email()">
</div>

<div id="event_type">
  <select id="edit-submitted-event-type" name="etype" class="form-select" required>
    <option selected="selected" disabled="disabled">EVENT TYPE</option>
    <option>Summer conferences Events</option>
   </select>
</div>

<div id="number_of_attendees">
  <select id="edit-submitted-number-of-attendees" name="eattendees" class="form-select" required onchange="cost();">
    <option selected="selected" disabled="disabled">NUMBER OF ATTENDEES</option>
    <option>1 to 10</option>
    <option>11 to 50</option>
    <option>51 to 100</option>
    <option>101 to 200</option>
    <option>201 to 500</option>
    <option>500+</option>
  </select>
</div>

<div id="event_date">
    <label for="date"> Event Date: </label><br>
  <input name='date_allow_empty' type="date" id="edit-submitted-event-date" value="" class="form" style="color: rgb(102, 102, 102);" required/>
</div><br>


<?php
require("connection.php");

$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}

while ($row = mysqli_fetch_array($result)) {
    // Process each row here
}

mysqli_close($conn);
?>



<div id="desired_venue">
<select name="dvenue" class="form-select" id="edit-submitted-desired-venue" >
<option value="" selected="selected" disabled="disabled"> VENUE</option>
<option value="1">Pink city club</option>
<option value="2">Loeb house</option>
<option value="2">Hall</option>



</select>
</div>
<div id="cost">
  <input type="text" id="price" name="price" class="form-textarea" readonly="readonly" placeholder="Total Price" onclick="clrprice()" onblur="price()"/>
</div>

<div id="status">
  <select name="status" class="form-textarea" id="edit_status">
  <option selected="selected" disabled="disabled">STATUS</option>
  <option value="0">confirm</option>
  <option value="1">not confirm</option>
  </select>
</div>


<div id="text_area">
<label>Description: </label><br>
<textarea id="edit-submitted-describe-your-event" name="submitted" cols="60" rows="5" class="form-textarea" style="color: rgb(102, 102, 102);" onclick="clrtextarea()" onblur="textarea()"></textarea>
</div>
<div id="submit">
<input type="submit" name="submit" value="Submit"/>
</div>

</form>
         </div><!--end of maincc-->
         
          </div><!-- end of textbox-->
        </div><!-- end of main_cont-->
</div>


<script>
function formValidation() {
    var name = document.getElementById("edit-submitted-name").value;
    var phone = document.getElementById("edit-submitted-phone").value;
    var email = document.getElementById("edit-submitted-email").value;

    // Name Validation
    if (name.trim() == "" || !/^[a-zA-Z ]+$/.test(name)) {
        alert("Please enter a valid name (only alphabets and spaces allowed).");
        return false;
    }

    // Phone Number Validation
    if (phone.trim() == "" || !/^[6789]\d{9}$/.test(phone)) {
        alert("Please enter a valid 10-digit phone number starting with 6, 7, 8, or 9.");
        return false;
    }

    // Email Validation
    if (email.trim() == "" || !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // All validations passed, form can be submitted
    return true;
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var datePicker = document.getElementById('edit-submitted-event-date');

    // Initialize datepicker
    $(datePicker).datepicker();

    // Validate date on form submission
    document.getElementById('register-form').addEventListener('submit', function(event) {
        var selectedDate = new Date(datePicker.value);
        var currentDate = new Date();
        var minDate = new Date(currentDate);
        minDate.setDate(currentDate.getDate() + 2);
        var maxDate = new Date(currentDate);
        maxDate.setFullYear(currentDate.getFullYear() + 1);

        if (selectedDate < minDate || selectedDate > maxDate) {
            alert('Please select a date between ' + minDate.toLocaleDateString() + ' and ' + maxDate.toLocaleDateString() + '.');
            event.preventDefault(); // Prevent form submission if date is invalid
        }
    });
});
</script>


<script type="text/javascript">

function start() {
  filltext();
}
window.onload = start;



function filltext()
{
	
	document.getElementById("edit-submitted-name").value="*NAME";
	document.getElementById("edit-submitted-department").value="*DEPARTMENT NAME";
	document.getElementById("edit-submitted-phone").value="*PHONE NO.";
	document.getElementById("edit-submitted-email").value="*E-MAIL ID";
	document.getElementById("edit-submitted-describe-your-event").value="DESCRIBE YOUR EVENT";
	document.getElementById("edit-submitted-event-date").value="*EVENT DATE";
	document.getElementById("price").value="*TOTAL PRICE";
	document.getElementById("edit_status").value="*STATUS";
		
}

function clrtext()
{
	document.getElementById("edit-submitted-name").value="";
}
function clrdept()
{
	document.getElementById("edit-submitted-department").value="";
}
function clrphone()
{
	document.getElementById("edit-submitted-phone").value="";
}
function clremail()
{
	document.getElementById("edit-submitted-email").value="";	
}
function clrtextarea()
{
	document.getElementById("edit-submitted-describe-your-event").value="";	
}

function clrdate()
{
	document.getElementById("edit-submitted-event-date").value="";	
}
function clrprice()
{
	document.getElementById("price").value="";
}
function clrstatus()
{
	document.getElementById("edit_status").value="";
}

<!---------------------------------------------------------------------->
function textval()
{	
	if(document.getElementById("edit-submitted-name").value=="")
	{
		document.getElementById("edit-submitted-name").value="*NAME";		
	}
}   
 
function dept()
{   
	
	if(document.getElementById("edit-submitted-department").value=="")
	{
		document.getElementById("edit-submitted-department").value="*DEPARTMENT NAME";		
	}	
	
}

function phone()
{   
	
	if(document.getElementById("edit-submitted-phone").value=="")
	{
		document.getElementById("edit-submitted-phone").value="*PHONE NO.";		
	}	
	
}

function email()
{   
	
	if(document.getElementById("edit-submitted-email").value=="")
	{
		document.getElementById("edit-submitted-email").value="*EMAIL ID";		
	}	
	
}
function date()
{   
	
	if(document.getElementById("edit-submitted-event-date").value=="")
	{
		document.getElementById("edit-submitted-event-date").value="*EVENT DATE";		
	}	
	
}
/*
function price()
{   
	
	if(document.getElementById("price").value=="")
	{
		document.getElementById("price").value="*TOTAL PRICE";		
	}	
	
}
*/
function status()
{   
	
	if(document.getElementById("edit_status").value=="")
	{
		document.getElementById("edit_status").value="*STATUS";		
	}	
	
}
	function cost()
	{
	var attnd=document.getElementById("edit-submitted-number-of-attendees").selectedIndex;
	var etyp=document.getElementById("edit-submitted-event-type").selectedIndex;	
	
	switch(attnd && etyp)
	{
		
	case 1: var attendee=5000;
			var etype=1000;
			break;	
	case 2: var attendee=10000;
			var etype=5000;
			break;
	case 3: var attendee=15000;
			var etype=10000;
			break;
	case 4: var attendee=20000;
			var etype=20000;
			break;
	case 5: var attendee=25000;
			var etype=50000;
			break;
	case 6: var attendee=30000;
			var etype=100000;
			break;
	default: alert("please select event type and number of attendies!");
				break;
	}
	
	var cst=Number(attendee)+Number(etype);
	document.getElementById("price").value=cst+"/- INR";
	}
	</script>

</body>
</html>
