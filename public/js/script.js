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
function setSelect()
{
	//document.getElementById('marital-status').selectedIndex="2";

}

function submitBeneficiary()
{
	const name = document.getElementById('name').value.length;
	const surname = document.getElementById('surname').value.length;
	const relationship = document.getElementById('relationship').value.length;
	const idNumber = document.getElementById('id_number').value.length;

	const benForm = document.getElementById('benef-form');
	if ((name>0)&&(surname>0)&&(relationship>0)&&(idNumber>0))
	{
		benForm.submit;
		window.open('/apply/step4','_self');
	}else{
		window.open('/apply/step4','_self');
	}
}

function submitArea()
{
	const municipality = document.getElementById('municipality').value.length;
	const area = document.getElementById('area').value.length;

	const mainForm = document.getElementById('main-form');
	if ((municipality>0)&&(area>0))
	{
		mainForm.submit;
		window.open('/apply/step5','_self');
	}else{
		window.open('/apply/step5','_self');
	}
}