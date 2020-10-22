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
	document.getElementById('delete'+id).style.display = "none";
	document.getElementById('confirmDelete'+id).style.display = "inline-block";
}
function showInputBox(){
	document.getElementById('disabler2').style.display = 'block';
	document.getElementById('inputCover').style.display = 'block';
}
function closeInputBox(){
	document.getElementById('disabler2').style.display = 'none';
	document.getElementById('inputCover').style.display = 'none';	
}
function populatePostAddress()
{
	const postCheckbox = document.getElementById('postCheckbox');
	const postLine1 = document.getElementById('post-line1');
	const postCode = document.getElementById('post-code');
	const addrLine1  = document.getElementById('addr_line1').value;
	const addrLine2 = document.getElementById('addr_line2').value;
	const suburb = document.getElementById('suburb').value;
	const city = document.getElementById('city').value;
	const areaCode = document.getElementById('area_code').value;

	const fullAddress = addrLine1 + '\n' +
						addrLine2 + '\n' +
						suburb + '\n' +
						city;

	if(postCheckbox.checked == true)
	{
		postLine1.value = fullAddress;
		postCode.value = areaCode;
	}else{
		postLine1.value = '';
		postCode.value = '';

	}
}

function submitBeneficiary()
{
	const name = document.getElementById('name').value.length;
	const surname = document.getElementById('surname').value.length;
	const idNumber = document.getElementById('id_number').value.length;

	if ((name>0)&&(surname>0)&&(idNumber>0))
	{
		document.getElementById('benef-form').submit();
	}else{
		window.open('/apply/step4_2','_self');
	}
}
function submitBeneficiary2()
{
	const name = document.getElementById('name').value.length;
	const surname = document.getElementById('surname').value.length;
	const idNumber = document.getElementById('id_number').value.length;

	if ((name>0)&&(surname>0)&&(idNumber>0))
	{
		document.getElementById('edit-profile-form').submit();
	}else{
		alert('Beneficiary details are not complete. Please complete.');
	}
}
function deleteBenef(id){
	var xhttp = new XMLHttpRequest;

	let token = document.getElementsByName('_token')[0].value;
	let dataString = '_token='+token+'&'+'benefId='+id;

	xhttp.open('POST','/userDeleteBenef',true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataString);

	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			document.getElementById('benefDiv'+id).style.display = 'none';
		}
	};
}

function submitArea()
{
	const municipality = document.getElementById('municipality').value.length;
	const area = document.getElementById('area').value.length;

	const mainForm = document.getElementById('main-form');
	if ((municipality>0)&&(area>0))
	{
		mainForm.submit();
	}else{
		window.open('/apply/step5','_self');
	}
}

function enableAddBen()
{
	const name = document.getElementById('name').value.length;
	const surname = document.getElementById('surname').value.length;
	const idNumber = document.getElementById('id_number').value.length;
	const btnNxt = document.getElementById('btnNxt');

	if((name>0)&&(surname>0)&&(idNumber>0))
	{
		btnNxt.innerHTML = 'Add';
	}else{
		btnNxt.innerHTML = 'Next';
	}

}

function enableAddArea()
{
	const area = document.getElementById('area').value.length;
	const btnNxt = document.getElementById('btnNxt');

	if (area>0)
	{
		btnNxt.innerHTML = 'Add';
	}else{
		btnNxt.innerHTML = 'Next';
	}
}