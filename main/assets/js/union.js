function resetValues() {
    $('#we').empty();
    $('#we').append(new Option('Please select', '', true, true));	
    $('#we').attr("disabled", "disabled");		
}


function populateClasses(xmlindata) {

var mySelect = $('#class_id');
 $('#we').disabled = false;
$(xmlindata).find("Studentclass").each(function()
  {
  optionValue=$(this).find("id").text();
  optionText =$(this).find("name").text();
   mySelect.append($('<option></option>').val(optionValue).html(optionText));	
  });
}

function populateType(xmlindata) {

var mySelect = $('#we');
$('#we').removeAttr('disabled');    
$(xmlindata).find("Users").each(function()
  {
  optionValue=$(this).find("id").text();
  optionText =$(this).find("name").text();
   mySelect.append($('<option></option>').val(optionValue).html(optionText));	
  });
}

