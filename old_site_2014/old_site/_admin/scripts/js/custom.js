 function getBlocks(mod){
	var template_id = $('template').options[$('template').selectedIndex].value;
	var page_id = $('theid').value;
	var module_id = mod;
	var url = 'includes/getblocks.php?template_id='+template_id+'&page_id='+page_id+'&module_id='+mod;
	new Ajax(url, {
		method: 'get',
		update: $('log'),
		evalScripts: 'true'
	}).request();
}
/*********************************************************************
*********************************************************************/
function createRequestObject(){
	var request_o; //declare the variable to hold the object.
	var browser = navigator.appName; //find the browser name
	if(browser == 'Microsoft Internet Explorer'){
		/* Create the object using MSIE's method */
		request_o = new ActiveXObject('Microsoft.XMLHTTP');
	}else{
		/* Create the object using other browser's method */
		request_o = new XMLHttpRequest();
	}
	return request_o; //return the object
}
/*********************************************************************
*********************************************************************/
function doAddress(val) {
	var title = trim(pageTitleFilter(document.getElementById('page_title').value));
	title =title.toLowerCase();
	document.getElementById('proposedpage').value = val+title+'/';
	document.getElementById('file_title').value = title;
}
/*********************************************************************
*********************************************************************/
function pageTitleFilter (input) {
  var s = input;
  var filteredValues = ".,;!#$/:?'()[]_-\\@%^&*\"+={}|<>";     // Characters stripped out
  var i;
  var returnString = "";
  for (i = 0; i < s.length; i++) {  // Search through string and append to unfiltered values to returnString.
    var c = s.charAt(i);
    if (filteredValues.indexOf(c) == -1) returnString += c;
  }
  return returnString;
  
}
/*********************************************************************
Removes leading and trailing spaces from the passed string. Also removes
consecutive spaces and replaces it with one space. If something besides
a string is passed in (null, custom object, etc.) then return the input.
*********************************************************************/
function trim(inputString) {
   if (typeof inputString != "string") { return inputString; }
   var retValue = inputString;
   var ch = retValue.substring(0, 1);
   while (ch == " ") { // Check for spaces at the beginning of the string
      retValue = retValue.substring(1, retValue.length);
      ch = retValue.substring(0, 1);
   }
   ch = retValue.substring(retValue.length-1, retValue.length);
   while (ch == " ") { // Check for spaces at the end of the string
      retValue = retValue.substring(0, retValue.length-1);
      ch = retValue.substring(retValue.length-1, retValue.length);
   }
   while (retValue.indexOf("  ") != -1) { // Note that there are two spaces in the string - look for multiple spaces within the string
      retValue = retValue.substring(0, retValue.indexOf("  ")) + retValue.substring(retValue.indexOf("  ")+1, retValue.length); // Again, there are two spaces in each of the strings
   }
   return retValue; // Return the trimmed string back to the user
} // Ends the "trim" function
/*********************************************************************
*********************************************************************/
function goLocation( form , where) { 
	var newIndex = form.fieldname.selectedIndex; 
		cururl = form.fieldname.options[ newIndex ].value; 
		window.location.assign( where+"&location="+cururl );
}
/*********************************************************************
*********************************************************************/ 
function selectAll(formObj, isInverse) {
  for (var i=0;i < formObj.length;i++){
    fldObj = formObj.elements[i];
    if (fldObj.type == 'checkbox'){
      if(isInverse){
        fldObj.checked = (fldObj.checked) ? false : true;
      }else{
        fldObj.checked = true;
      }
    }
  }
 } 