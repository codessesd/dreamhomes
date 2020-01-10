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
