// $(document).ready(function(){
// 	$(".delete").click(function(){
// 		$(".confirmDelete").fadeIn();
// 		$(".delete{{document['id']}}").hide();
// 	});
// });
function closeDialog(){
	document.getElementById('disabler').style.display = "none";
	document.getElementById('upload-dialog').style.display = "none";
}
function closeMsgDialog() {
	document.getElementById('msg-disabler').style.display = "none";
	document.getElementById('msg-dialog').style.display = "none";
}

function openDialog(type, typeName){

	document.getElementById('uploadType').innerHTML = type;
	document.getElementById('document-type').value = typeName;

	document.getElementById('disabler').style.display = "block";
	document.getElementById('upload-dialog').style.display = "block";
}
function showConfirmDelete(id){
	// document.getElementByClassName('confirmDelete').style.display = 'none';
	document.getElementById('delete'+id).style.display = "none";
	document.getElementById('confirmDelete'+id).style.display = "inline-block";
}