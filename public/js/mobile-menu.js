$(document).ready(function(){
	// $(".mbl-menu-btn").click(function(){
	// 	$("#menu-nav").fadeToggle("slow");
	// });

	$(".btn-close").click(function(){
		$(".btn-open").fadeIn();
		$(".btn-open").animate({right: '0px'});//show
		$(".btn-close").animate({right: '-40px'});//hide
		$(".btn-close").fadeOut();
		$("#menu-nav").fadeOut("slow");
	});
	$(".btn-open").click(function(){
		$(".btn-close").fadeIn();
		$(".btn-close").animate({right: '0px'});//show
		$(".btn-open").animate({right: '-40px'});//hide
		$(".btn-open").fadeOut();
		$("#menu-nav").fadeIn("slow");
	});

	$(".profile-btns-menu").click(function(){
		$(".profile-btns-mobile").fadeToggle();
	});
});