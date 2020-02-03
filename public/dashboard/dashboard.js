$(document).ready(function(){

	$(".user-btn").click(function(){
		$(".user-links").fadeToggle('fast');
	});

});
function toggleDocPopup(id){
	"use strict";
	const docPopup = document.getElementById('popup'+id);
	const style = getComputedStyle(docPopup);
	const transform = new WebKitCSSMatrix(style.webkitTransform);

	if(transform == 'matrix(0, 0, 0, 0, 0, 0)')
		docPopup.style.transform = "scale(1,1)";
	else
		docPopup.style.transform = "scale(0,0)";
	
	//Close other open doc popups
	// docPopup.addEventListener("webkitTransitionEnd", function(){
	// 	docPopup.className = "doc-popup popup-active";
	// });
	// docPopup.addEventListener("transitionend", function(){
	// 	docPopup.className = "doc-popup popup-active";
	// });
	// const activePopup = document.getElementsByClassName('popup-active');
	// activePopup.style.transform = "scale(0,0)";
}

function toggleMemberDetails(id){
	"use strict";
	const memDetails = document.getElementById('member-details'+id);
	const style = getComputedStyle(memDetails);
	const transform = new WebKitCSSMatrix(style.webkitTransform);

	if(transform == 'matrix(0, 0, 0, 0, 0, 0)')
		memDetails.style.transform = "scale(1,1)";
	else
		memDetails.style.transform = "scale(0,0)";
}

function saveMember(id) 
{
  // "use strict";
  var xhttp = new XMLHttpRequest();
  const msgLine = document.getElementById('msg-line'+id);
  const memberForm = document.getElementById('member-form'+id);
  msgLine.innerHTML = 'saving...';
  msgLine.style.transition = 'opacity 0s';
  msgLine.style.opacity = '1';

  let dataString = memberForm.elements[0].getAttribute('name') + "=" + memberForm.elements[0].value;

  for (i = 1; i < memberForm.length;i++)
  {
   	let input = memberForm.elements[i].getAttribute('name');
   	let = inputValue = memberForm.elements[i].value;
    dataString += "&" + input + "=" + inputValue;
  }											
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      	msgLine.innerHTML = this.responseText;
    	msgLine.style.transition = 'opacity 5s';
    	msgLine.style.transitionDelay = "5s"
    	msgLine.style.opacity = '0';
    }
  };
  xhttp.open("POST", "updateMember", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(dataString);
}