$(document).ready(function(){

	$(".user-btn").click(function(){
		$(".user-links").fadeToggle('fast');
	});

});
function showDocPopup(id){
	// "use strict";
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