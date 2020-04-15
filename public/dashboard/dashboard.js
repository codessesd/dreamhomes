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
}

function toggleMemberDetails(id)
{
	//"use strict";
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
  //"use strict"
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
   	if (input != null)
    	dataString += "&" + input + "=" + inputValue;
  }									
  xhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200) {
      msgLine.innerHTML = JSON.parse(this.responseText)['message'];
    	msgLine.style.transition = 'opacity 5s';
    	msgLine.style.transitionDelay = "5s"
    	msgLine.style.opacity = '0';
    	//location.reload(true);
    }
  };
  xhttp.open("POST", "updateMember", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(dataString);
}

function addAdmin(){
	//"use strict"
	var xhttp = new XMLHttpRequest();
	const adminForm = document.getElementById('admin-form');
	const progressBox = document.getElementById('progressBox');
	const loadingIcon = document.getElementById('loading');
	const warningIcon = document.getElementById('warning');
	const responseMsg = document.getElementById('responseMsg');

	progressBox.style.display = "grid";
	loadingIcon.style.display = 'inline-block';
	warningIcon.style.display = 'none';
	responseMsg.innerHTML = "SAVING...";

	let dataString = adminForm.elements[0].getAttribute('name') + '=' + adminForm.elements[0].value;

	for (i = 1; i < adminForm.length; i++)
	{
		let formInput = adminForm.elements[i];
		let formInputAttr = formInput.getAttribute('name');
		if((formInputAttr != 'writePermissions[]')&&(formInputAttr != 'readPermissions[]')&&(formInputAttr != null))
			dataString += "&" + formInputAttr + '=' + formInput.value;
		else if(formInput.checked)
			dataString += "&" + formInputAttr + '=' + formInput.value;
	}

	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			const response = JSON.parse(this.responseText);
			//responseMsg.innerHTML = 'setRequestHeader';
			displayResponse1(response);
		}
	}

	xhttp.open('POST','/addAdmin',true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataString);
}

function displayResponse1(response)
{
	const responseMsg = document.getElementById('responseMsg');
	const loadingIcon = document.getElementById('loading');
	const warningIcon = document.getElementById('warning');
	const okBtn = document.getElementById('okBtn');

	let msgToDisplay = '';
	if (response.type == 'error')
	{
		loadingIcon.style.display = 'none'
		warningIcon.style.display = 'inline-block';
		var message;
		for (message in response)
		{
			if(response[message] != 'error')//remove 'error' in the displayed messages
				msgToDisplay += '' + response[message] + '<br>';
		}
		responseMsg.innerHTML = msgToDisplay;
		okBtn.style.display = 'block'
	}
	else if (response.type == 'success')
	{
		for (message in response)
		{
			if(response[message] != 'success')//remove 'success' in the displayed messages
				msgToDisplay += '' + response[message] + '<br>';
		}
		responseMsg.innerHTML = msgToDisplay;
		location.reload(true);
	}else{
		for (message in response)
			msgToDisplay += '' + response[message] + '<br>';

		responseMsg.innerHTML = msgToDisplay;
		okBtn.style.display = 'block'
	}
}

function closePopup()
{
	document.getElementById('admin-form').reset();
	document.getElementById('popup-filter').style.display = "none";
	document.getElementById('progressBox').style.display = "none";
	document.getElementById('okBtn').style.display = 'none';
}
function openPopup()
{
	document.getElementById('popup-filter').style.display = "grid";
}
function openAdminDetail(id)
{
	document.getElementById('popup-filter'+id).style.display = "grid";
}
function selectAll(id)
{
	const adminForm = document.getElementById('admin-form'+id);
	const selectBtn = document.getElementById('btnSelectAll'+id) ;

	if (selectBtn.checked == false){
		for(i = 0; i < adminForm.length; i++)
		{
			if(adminForm.elements[i].getAttribute('type') == 'checkbox')
				adminForm.elements[i].checked = true;
		}
	}
	else{
		for(i = 0; i < adminForm.length; i++)
		{
			if(adminForm.elements[i].getAttribute('type') == 'checkbox')
				adminForm.elements[i].checked = false;
		}
	}
}
function closeAdminDetail(id)
{
	document.getElementById('admin-form').reset();
	document.getElementById('popup-filter'+id).style.display = "none";
	document.getElementById('progressBox'+id).style.display = "none";
	document.getElementById('okBtn'+id).style.display = 'none';
}
function closeProgressBox(id)
{
	document.getElementById('progressBox'+id).style.display = "none";
	document.getElementById('okBtn'+id).style.display = 'none';
}
function closeProgressBox()
{
	document.getElementById('progressBox').style.display = "none";
	document.getElementById('okBtn').style.display = 'none';
}
function updateAdmin(id){
	//"use strict"
	var xhttp = new XMLHttpRequest();
	const adminForm = document.getElementById('admin-form'+id);
	const progressBox = document.getElementById('progressBox'+id);
	const loadingIcon = document.getElementById('loading'+id);
	const warningIcon = document.getElementById('warning'+id);
	const responseMsg = document.getElementById('responseMsg'+id);

	progressBox.style.display = "grid";
	loadingIcon.style.display = 'inline-block';
	warningIcon.style.display = 'none';
	responseMsg.innerHTML = "SAVING...";

	let dataString = adminForm.elements[0].getAttribute('name') + '=' + adminForm.elements[0].value;

	for (i = 1; i < adminForm.length; i++)
	{
		let formInput = adminForm.elements[i];
		let formInputAttr = formInput.getAttribute('name');
		if((formInputAttr != 'writePermissions[]')&&(formInputAttr != 'readPermissions[]')&&(formInputAttr != null))
			dataString += "&" + formInputAttr + '=' + formInput.value;
		else if(formInput.checked)
			dataString += "&" + formInputAttr + '=' + formInput.value;
	}

	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			const response = JSON.parse(this.responseText);
			displayResponse2(response,id);
		}
	}

	xhttp.open('POST','/updateAdmin',true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataString);
}

function displayResponse2(response,id)
{
	const responseMsg = document.getElementById('responseMsg'+id);
	const loadingIcon = document.getElementById('loading'+id);
	const warningIcon = document.getElementById('warning'+id);
	const okBtn = document.getElementById('okBtn'+id);

	let msgToDisplay = '';
	if (response.type == 'error')
	{
		loadingIcon.style.display = 'none'
		warningIcon.style.display = 'inline-block';
		var message;
		for (message in response)
		{
			if(response[message] != 'error')//remove 'error' in the displayed messages
				msgToDisplay += '' + response[message] + '<br>';
		}
		responseMsg.innerHTML = msgToDisplay;
		okBtn.style.display = 'block'
	}
	else if (response.type == 'success')
	{
		for (message in response)
		{
			if(response[message] != 'success')//remove 'success' in the displayed messages
				msgToDisplay += '' + response[message] + '<br>';
		}
		responseMsg.innerHTML = msgToDisplay;
		location.reload(true);
	}else{
		for (message in response)
			msgToDisplay += '' + response[message] + '<br>';

		responseMsg.innerHTML = msgToDisplay;
		okBtn.style.display = 'block'
	}
}

function deleteAdmin(id)
{
	//window.open("")
}

// Member details JS ---------------------------------------------------------------------------------
function submitBeneficiary()
{
	const benefEllipsis = document.getElementById('benefEllipsis');
	const benefAdd = document.getElementById('benefAdd');

	const id = document.getElementById('memId').value;
	const token = document.getElementsByName('_token')[0].value;

	const name = document.getElementById('benef_name').value;
	const surname = document.getElementById('benef_surname').value;
	const relationship = document.getElementById('benef_relation').value;
	const idNumber = document.getElementById('benef_id_number').value;

	if ((name.length>0)&&(surname.length>0)&&(idNumber.length>0))
	{
		document.getElementById('benefBtn').disabled = 'true';
		benefAdd.style.display = 'none';
		benefEllipsis.style.display = 'inline-block';
		let dataString =  '_token=' + token + '&' +
										 'id=' + id + '&' +
										 'beneficiaries[name]=' + name + '&' +
										 'beneficiaries[relationship]=' + relationship + '&' +
										 'beneficiaries[surname]=' + surname + '&' +
										 'beneficiaries[id_number]=' + idNumber;
		let xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function()
		{
			if (this.readyState == 4 && this.status == 200)
				location.reload();
				//const response = JSON.parse(this.responseText);
				// document.getElementById('theInsertedBen').innerHTML = this.responseText;
		}
		xhttp.open('POST','/updateMember',true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(dataString);
		
	}
}

function removeBeneficiary(memId,benefId)
{
	var xhttp = new XMLHttpRequest;

	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
			location.reload();
	}
	xhttp.open('GET','/removeBeneficiary/'+memId+'/'+benefId,true);
	xhttp.send();
}

function removeArea(memId,areaId)
{
	var xhttp = new XMLHttpRequest;

	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
			location.reload();
	}
	xhttp.open('GET','/removeArea/'+memId+'/'+areaId,true);
	xhttp.send();
}

function submitArea()
{
	const areaEllipsis = document.getElementById('areaEllipsis');
	const areaAdd = document.getElementById('areaAdd');

	const id = document.getElementById('memId').value;
	const token = document.getElementsByName('_token')[0].value;

	const municipality = document.getElementById('municipality').value;
	const area = document.getElementById('area').value;

	if (area.length>0)
	{
		areaAdd.style.display = 'none';
		areaEllipsis.style.display = 'inline-block';
		let dataString =  '_token=' + token + '&' +
										 'id=' + id + '&' +
										 'areas[municipality]=' + municipality + '&' +
										 'areas[area]=' + area;
		let xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function()
		{
			if (this.readyState == 4 && this.status == 200)
			{
				location.reload();
				
			}
		}
		xhttp.open('POST','/updateMember',true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(dataString);
		
	}
}