$(document).ready(function(){

	$(".user-btn").click(function(){
		$(".user-links").fadeToggle('fast');
	});

});
function mblMenuToggle(){
	const mnBtn = document.getElementById('mnBtn');
	const mnBtnStyle = getComputedStyle(mnBtn);
	const mnIcon = document.getElementById('mnIcn');
	const mnDropdown = document.getElementById('mnDropdown');

	if(mnBtnStyle.width == '260px')
	{
		mnBtn.style.width = '280px';
		mnIcon.style.transform = "rotate(90deg)";
		mnDropdown.style.height = '380px';
		mnDropdown.style.paddingTop = '20px';
	}
	else
	{
		mnBtn.style.width = '260px';
		mnIcon.style.transform = "rotate(-90deg)";
		mnDropdown.style.height = '0px';
		mnDropdown.style.paddingTop = '0px';
	}
}

function setShow(){
	var xhttp = new XMLHttpRequest;
	showValue = document.getElementById('show').value;
	var token = document.getElementsByName('_token')[0].value;
	let dataString = '_token='+token+'&max='+showValue;
	xhttp.open('POST','/setShow',true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataString);

	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			location.reload();
		}
	}
}

function deleteMemberToggle(id){
	var xhttp = new XMLHttpRequest();
	var token = document.getElementsByName('_token')[0].value;
	var deleteBtn = document.getElementById('tdDelButton'+id);
	var deleteBtnState = deleteBtn.dataset.deleted;
	var deleteBtnImage = document.getElementById('memDeleteImg'+id);
	var loadingImage = document.getElementById('memLoadingImg'+id);

	deleteBtnImage.style.display = 'none';
	loadingImage.style.display = 'block';

	deleteBtn.disabled = true;
	let dataString = '_token=' + token + '&' + 'memberId=' + id;
	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200){
			response = JSON.parse(this.responseText);
			if(response.type == 'error')
				alert(response.message);
			if(deleteBtnState == 0){
				markDeleted(id);
				deleteBtn.dataset.deleted = 1;
				deleteBtn.disabled = false;
			}
			else{
				unmarkDeleted(id);
				deleteBtn.dataset.deleted = 0;
				deleteBtn.disabled = false;
			}
			loadingImage.style.display = 'none';
			deleteBtnImage.style.display = 'block';
		}
	};

	if(deleteBtnState == 0){
		xhttp.open('POST','/deleteRow',true);
	}
	else{
		xhttp.open('POST','/restoreRow',true);
	}
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataString);
}
function markDeleted(id){
	document.getElementById('tdNum'+id).style.textDecoration = 'line-through';
	document.getElementById('tdName'+id).style.textDecoration = 'line-through';
	document.getElementById('tdMembershipNo'+id).style.textDecoration = 'line-through';
	document.getElementById('tdId'+id).style.textDecoration = 'line-through';
	document.getElementById('tdReferredBy'+id).style.textDecoration = 'line-through';
	document.getElementById('tdContact'+id).style.textDecoration = 'line-through';
	document.getElementById('tdInvest'+id).style.textDecoration = 'line-through';
	document.getElementById('memDeleteImg'+id).src = '/images/restore.svg';
	document.getElementById('tdDelButton'+id).title = 'Restore';
}
function unmarkDeleted(id){
	document.getElementById('tdNum'+id).style.textDecoration = 'none';
	document.getElementById('tdName'+id).style.textDecoration = 'none';
	document.getElementById('tdMembershipNo'+id).style.textDecoration = 'none';
	document.getElementById('tdId'+id).style.textDecoration = 'none';
	document.getElementById('tdReferredBy'+id).style.textDecoration = 'none';
	document.getElementById('tdContact'+id).style.textDecoration = 'none';
	document.getElementById('tdInvest'+id).style.textDecoration = 'none';
	document.getElementById('memDeleteImg'+id).src = '/images/delete.svg';
	document.getElementById('tdDelButton'+id).title = 'Delete';
}
function deletePayToggle(id){/***********************************************/
	var xhttp = new XMLHttpRequest();
	var token = document.getElementsByName('_token')[0].value;
	var deleteBtn = document.getElementById('tdDelPayBtn'+id);
  var deleteBtnState = deleteBtn.dataset.deleted;
  var memberId = deleteBtn.dataset.memberid;
	var deleteBtnImage = document.getElementById('payDeleteImg'+id);
	var loadingImage = document.getElementById('payLoadingImg'+id);

	deleteBtnImage.style.display = 'none';
	loadingImage.style.display = 'block';

	deleteBtn.disabled = true;
  let dataString = '_token=' + token + '&memberId=' + memberId + '&payId='+id;

  console.log(dataString);
	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200){
			//response = JSON.parse(this.responseText);
			//if(response.type == 'error')
				//alert(response.message);
			if(deleteBtnState == 0){
				markPayDeleted(id);
				deleteBtn.dataset.deleted = 1;
				deleteBtn.disabled = false;
			}
			else{
				unmarkPayDeleted(id);
				deleteBtn.dataset.deleted = 0;
				deleteBtn.disabled = false;
			}
			loadingImage.style.display = 'none';
			deleteBtnImage.style.display = 'block';
		}
	};

	if(deleteBtnState == 0){
		xhttp.open('POST','/deletePay',true);
	}
	else{
		xhttp.open('POST','/restorePay',true);
	}
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(dataString);
}

function markPayDeleted(id){
  document.getElementById('payDate'+id).style.textDecoration = 'line-through';
  document.getElementById('payAmount'+id).style.textDecoration = 'line-through';
  document.getElementById('payNotes'+id).style.textDecoration = 'line-through';
  document.getElementById('payDeleteImg'+id).src = '/images/restore.svg';
}
function unmarkPayDeleted(id){
  document.getElementById('payDate'+id).style.textDecoration = 'none';
  document.getElementById('payAmount'+id).style.textDecoration = 'none';
  document.getElementById('payNotes'+id).style.textDecoration = 'none';
  document.getElementById('payDeleteImg'+id).src = '/images/delete.svg';
}

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

function toggleOfficePopup(id)
{
	//"use strict";
	const officeFilter = document.getElementById('office-filter'+id);
	const memDetails = document.getElementById('member-details'+id);
	const popDisplay = getComputedStyle(officeFilter);
	//const transform = new WebKitCSSMatrix(style.webkitTransform);

	if(popDisplay.zIndex == '-1'){
		memDetails.style.transform = "scale(1,1)";
		officeFilter.style.zIndex = '2';
		officeFilter.style.backgroundColor = '#fff9';
		officeFilter.style.transition = 'background-color 0.4s linear'
	}
	else{
		officeFilter.style.backgroundColor = '#fff0';
		officeFilter.style.zIndex = '-1';
		memDetails.style.transform = "scale(0,0)";
		officeFilter.style.transition = 'background-color 0.4s linear, z-index 0.1s linear 0.4s'
	}
}

function togglePayPopup(id)
{
	//"use strict";
	const payFilter = document.getElementById('pay_popup'+id);
	const memDetails = document.getElementById('pay-details'+id);
	const popDisplay = getComputedStyle(payFilter);
	//const transform = new WebKitCSSMatrix(style.webkitTransform);

	if(popDisplay.zIndex == '-1'){
		memDetails.style.transform = "scale(1,1)";
		payFilter.style.zIndex = '2';
		payFilter.style.backgroundColor = '#fff9';
		payFilter.style.transition = 'background-color 0.4s linear'
	}
	else{
		payFilter.style.backgroundColor = '#fff0';
		payFilter.style.zIndex = '-1';
		memDetails.style.transform = "scale(0,0)";
		payFilter.style.transition = 'background-color 0.4s linear, z-index 0.1s linear 0.4s'
	}
}

function toggleSearchPopup(id)
{
	//"use strict";
	const officeFilter = document.getElementById('search-filter');
	const memDetails = document.getElementById('search-card');
	const popDisplay = getComputedStyle(officeFilter);
	//const transform = new WebKitCSSMatrix(style.webkitTransform);

	if(popDisplay.zIndex == '-1'){
		memDetails.style.transform = "scale(1,1)";
		officeFilter.style.zIndex = '3';
		officeFilter.style.backgroundColor = '#fff9';
		officeFilter.style.transition = 'background-color 0.4s linear'
	}
	else{
		officeFilter.style.backgroundColor = '#fff0';
		officeFilter.style.zIndex = '-1';
		memDetails.style.transform = "scale(0,0)";
		officeFilter.style.transition = 'background-color 0.4s linear, z-index 0.1s linear 0.4s'
	}
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

function acceptPayment(id)
{
  //"use strict"
  var xhttp = new XMLHttpRequest();
  const msgLine = document.getElementById('pay-msg'+id);
  const payForm = document.getElementById('pay-form'+id);
  const payBtn = document.getElementById('pay-btn'+id);
  payBtn.disabled = true;
  msgLine.innerHTML = 'saving...';
  msgLine.style.transition = 'opacity 0s';
  msgLine.style.opacity = '1';

  let dataString = payForm.elements[0].getAttribute('name') + "=" + payForm.elements[0].value;

  for (i = 1; i < payForm.length;i++)
  {
   	let input = payForm.elements[i].getAttribute('name');
   	let = inputValue = payForm.elements[i].value;
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
      payBtn.disabled = false;
    	//location.reload(true);
    }
  };
  xhttp.open("POST", "/save_pay", true);
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
			if(adminForm.elements[i].getAttribute('type') == 'checkbox')
				adminForm.elements[i].checked = true;
	}
	else{
		for(i = 0; i < adminForm.length; i++)
			if(adminForm.elements[i].getAttribute('type') == 'checkbox')
				adminForm.elements[i].checked = false;
	}
}

function selectAll2()
{
	const adminForm = document.getElementById('admin-form');
	const selectBtn = document.getElementById('btnSelectAll');

	if (selectBtn.checked == false){
		for(i = 0; i < adminForm.length; i++)
			if(adminForm.elements[i].getAttribute('type') == 'checkbox')
				adminForm.elements[i].checked = true;
	}
	else{
		for(i = 0; i < adminForm.length; i++)
			if(adminForm.elements[i].getAttribute('type') == 'checkbox')
				adminForm.elements[i].checked = false;
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
