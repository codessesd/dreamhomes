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
	// switch(type){
	// 	case "application":
	// 		document.getElementById('uploadType').innerHTML = "Application Form";
	// 		break;
	// 	case "idpassport":
	// 		document.getElementById('uploadType').innerHTML = "ID OR Passport";
	// 		break;
	// 	case "pop":
	// 		document.getElementById('uploadType').innerHTML = "Proof Of Payment";
	// 		break;
	// 	case "other":
	// 		document.getElementById('uploadType').innerHTML = "More Supporting Document";
	// 		break;
	// 	default:
	// }

	document.getElementById('disabler').style.display = "block";
	document.getElementById('upload-dialog').style.display = "block";
}
