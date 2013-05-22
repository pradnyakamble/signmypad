function checkValue(evt,val) {
  var count	=	0;	
  evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : 
        ((evt.which) ? evt.which : 0));
				if (charCode > 31 && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90) && charCode!=32) {
										return false;
						}
				if(val.length==0 && charCode==32){
									return false;
				}
   /*if(charCode==32){     
	       	for(i=0;i<val.length;i++){
	        if(val.charCodeAt(i)==46){
		      count++
			   }
			}
	}
	if(count > 0){
	   return false
	}*/
	return true;
}
function sleepTimeOutDisplay(divId){
	if(eval($("#errorDiv"))){
	   $("#errorDiv").css('display', 'none');
	}   
}
function validateCityFRM(frm){
    var count    =    0;
    var errorMsg = Array();
    
    if(!isValidString($('#yardCityName').val())){
        errorMsg[count]="The yard City Name field is required.";
        count++;
    }
    if($('#yardState').val()==0){
        errorMsg[count]= "The yard State Name field is required.";
        count++;
    }
if(errorMsg.length > 0){
        $("#errorDiv").css('display', 'block');
	$("#errorDiv").html('');
        for(i=0;i<errorMsg.length;i++){
            $("#errorDiv").append("<h5>"+errorMsg[i]+"<h5>");
        }
        setTimeout("sleepTimeOutDisplay('errorDiv')",3000);
        window.scroll(0,0);
        return false;
    }else{
         $('#frmadminstrator').submit();
        
    }    
}
function isValidString(str){
  var result    =    true;
  var iChars = ',`~%^=[]"\\\{}|\<>';
  if(str.length == 0) return false;
  for (var i = 0; i < str.length; i++) {
    if (iChars.indexOf(str.charAt(i)) != -1) {
      result    =    false;
    }
  }
  return result;
}

/**
 *This function is used to hide the msg in 10 seconds
 *
 **/
$(document).ready(
  function(){
    //alert('hi');
    setTimeout(function(){$('.notification').hide()},10000);
    
});