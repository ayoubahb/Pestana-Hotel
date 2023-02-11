//nav bar mobile
const menu = document.querySelector('.menu');
const navLinks = document.querySelector('.nav-links');
const body = document.querySelector('body');

menu.addEventListener('click', () => {
	navLinks.classList.toggle('mobile-menu');
	body.classList.toggle('noscroll');
});

//nav bar background
const nav = document.querySelector('nav');

window.addEventListener('scroll', function () {
	nav.classList.toggle('sticky', window.scrollY > 0);
});

//active page navbar
const activePage = window.location.pathname;
const links = document.querySelectorAll('.nav-links a').forEach((link) => {
	if (activePage == '/pestana/') {
		document.querySelector('a[href="home"]').classList.add('active');
		document.title = 'Home';
		return;
	}
	if (link.href.includes(`${activePage}`)) {
		link.classList.add('active');
	}
});
document.title = activePage.split('/')[2].toUpperCase();

//signin/signup forms
const signupBtn = document.getElementById('signupbtn');
const signinBtn = document.getElementById('signinbtn');
const nameField = document.getElementById('namefield');
const type = document.getElementById('type');
const title = document.getElementById('title');

signinBtn.addEventListener('click', () => {
	nameField.style.maxHeight = '0';
	nameField.querySelector('input').value = '';
	title.innerHTML = 'Sign In';
	signupBtn.classList.add('disable');
	signinBtn.classList.remove('disable');
	type.name = 'in';
	nameField.querySelector('input').removeAttribute('required');
});
signupBtn.addEventListener('click', () => {
	nameField.style.maxHeight = '65px';
	title.innerHTML = 'Sign Up';
	signupBtn.classList.remove('disable');
	signinBtn.classList.add('disable');
	type.name = 'up';
	nameField.querySelector('input').setAttribute('required', '');
});

const loginToggelOn = document.querySelector('.login-btn');
const loginToggelOff = document.querySelector('.close');
const loginForm = document.querySelector('.login_register');
if (loginToggelOn != null) {
	loginToggelOn.addEventListener('click', () => {
		loginForm.classList.toggle('hide');
		body.classList.toggle('noscroll');
	});
}
if (loginToggelOff != null) {
	loginToggelOff.addEventListener('click', () => {
		loginForm.classList.add('hide');
		body.classList.toggle('noscroll');
	});
}
//number of persons to add to reservation
const numberInput = document.querySelector('#num-person');
const personForms = document.getElementById('persons');
if (numberInput != null && personForms != null) {
	numberInput.addEventListener('change', () => {
		personForms.innerHTML = '';
		let element = '';
		for (let i = 0; i < numberInput.value; i++) {
			element += `<h5 class="mt-3">Person ${i + 1}</h5>
						<div class="row g-3 p-3 border rounded mt-3">
							<div class="col-6">
								<label class="form-label">First name</label>
								<div class="input-group has-validation">
									<input type="text" class="form-control" name="fperson${i + 1}"/>
								</div>
							</div>

							<div class="col-6">
								<label class="form-label">Last name</label>
								<div class="input-group has-validation">
									<input type="text" class="form-control" name="lperson${i + 1}"/>
								</div>
							</div>

							<div class="col-6">
								<label class="form-label">Date of birth</label>
								<div class="input-group has-validation">
									<input type="date" class="form-control" name="dperson${i + 1}"/>
								</div>
							</div>

						</div>`;
		}
		personForms.innerHTML = element;
	});
}
// handll dates entred to check
let dateInput = document.querySelectorAll(
	'form[action=search] input[type=date]'
);

let date = new Date();
if (dateInput[0] !== undefined) {
	dateInput[0].setAttribute('min', getDate(date));//set min to chekin date to today's date
	//cheange value of checkout data to tomorrow's date
	dateInput[0].addEventListener('change', () => {
		let split = dateInput[0].value.split('-');
		let tomorrow = new Date(
			parseInt(split[0]),
			parseInt(split[1] - 1),
			parseInt(split[2]) + 1,
			0,
			0,
			0,
			0
		);
		dateInput[1].setAttribute('min', getDate(tomorrow));
		dateInput[1].value = getDate(tomorrow);
	});
}

// reservation suite type select

const roomType = document.querySelector('.room-type');
const container = document.querySelector('#container');
if (roomType != null) {
	roomType.addEventListener('change', () => {
		if (roomType.value == 'suite') {
			const selectForm = `
      <label>Suite type</label>
      <select class="form-select" name="suite-type">
      <option selected>Open this select menu</option>
      <option value="Standard">Standard suite rooms</option>
      <option value="Junior">Junior suite</option>
      <option value="Presidential">Presidential suite</option>
      <option value="Penthouse">Penthouse suites</option>
      <option value="Honeymoon">Honeymoon suites</option>
      <option value="Bridal">Bridal suites</option>
      </select>`;
			container.style.display = 'block';
			container.classList.add('col');
			container.classList.add('mb-2');
			container.innerHTML = selectForm;
		} else {
			container.style.display = 'none';
			container.innerHTML = '';
		}
	});
}

//check if room dispo in checkin and checkout

let check = document.querySelector('#search');//button send data to server
let dispo = false;//value to be chnanged when room is disponible
let roomId = document.querySelector('#roomId').value;//room id that will check
let reservId = document.querySelector('#reservId').value;//reservation id to exlut in search
let checkin;//to check if dates changed after cheking room dispo
let checkout;//to check if dates changed after cheking room dispo

check.addEventListener('click', () => {
	let result = document.querySelector('#result'); //element where will show result of cheking
	var inputs = document.querySelectorAll('input[type="date"]');//inputs of dates
	//check if inputs have values
	var empty = false;
	for (var i = 0; i < inputs.length; i++) {
		if (inputs[i].value === '') {
			empty = true;
			break;
		}
	}
	if (empty) {
		alert('Dates must be entred');
	} else {
		let data = {
			roomId: roomId,
			reservationId: reservId,
			checkin: inputs[0].value,
			checkout: inputs[1].value,
		};
		let xhr = new XMLHttpRequest();
		xhr.open('POST', 'http://localhost/pestana/check', true);
		xhr.setRequestHeader('Content-Type', 'application/json');
		// send data to server
		xhr.send(JSON.stringify(data));
		//Create the callback function that will be executed when the response is ready
		xhr.onload = function () {
			if (xhr.status === 200) {
				let check = xhr.responseText.trim();
				if (check != 0) {
					result.textContent = 'Room is not dispo in date entred';
					result.classList.add('alert-danger');
					result.classList.remove('alert-success');
					result.style.display = 'block';
				} else {
					result.textContent = 'Room is dispo in date entred';
					result.classList.add('alert-success');
					result.classList.remove('alert-danger');
					result.style.display = 'block';
					dispo = true;
					checkin = inputs[0].value;
					checkout = inputs[1].value;
				}
			}
		};
	}
});

//delete person 

let deleteBtn = document.querySelectorAll('.removeBtn');

for (let element of deleteBtn) {
	element.addEventListener('click',(event)=>{
		//get id of user deleted
		let id =event.target.parentNode.parentNode.id;
		//create object
		let xhr = new XMLHttpRequest();
		// initialize request
		xhr.open('POST', 'http://localhost/pestana/deleteperson', true);
		//type of data sended to server
		xhr.setRequestHeader('Content-Type', 'application/json');
		// send data to server
		xhr.send(JSON.stringify({id:id}));
		//Create the callback function that will be executed when the response is ready
		xhr.onload = function () {
			if (xhr.status === 200) {
				if(xhr.responseText.trim()==1){
					alert('Person deleted');
					window.location.reload();
				};
			}
		};
	})
}
//handl dates update
let updateDate = document.querySelectorAll('#checkDates input[type="date"]');
let newDate = new Date();//Date() without arguments returns today's date
if (updateDate[0] !== undefined) {
	updateDate[0].setAttribute('min', getDate(newDate));//get data function that returns date of object entred
	updateDate[0].addEventListener('change', () => {
		let split = updateDate[0].value.split('-');
		//create
		let tomorrow = new Date(
			parseInt(split[0]),
			parseInt(split[1] - 1),
			parseInt(split[2]) + 1,
			0,
			0,
			0,
			0
		); //Date() with arguments returns date manchned in arguments
		updateDate[1].setAttribute('min', getDate(tomorrow));
		updateDate[1].value = getDate(tomorrow);
	});
}

//update

//get button of submit changes
let done = document.querySelector('#done');

done.addEventListener('click',()=>{
	//get value of inputs dates
	var inputs = document.querySelectorAll('input[type="date"]');
	//check if room is disponible and if user change dates after check if room disponibl
	if (dispo && checkin === inputs[0].value && checkout === inputs[1].value) {
		let data = {
			checkin: checkin,
			checkout: checkout,
			reservation: reservId,
		};
		//create the obj
		let xhr = new XMLHttpRequest();
		//initialize request 
		xhr.open('POST', 'http://localhost/pestana/updateReservation', true);
		//data type sended in request
		xhr.setRequestHeader('Content-Type', 'application/json');
		// send data to server
		xhr.send(JSON.stringify(data));
		//Create the callback function that will be executed when the response is ready
		xhr.onload = function () {
			if (xhr.status === 200) {
				if (xhr.responseText.trim() == 1) {
					window.location.href = 'http://localhost/pestana/guest-reservation';
				}
			}
			
		};
	} else {
		alert('Verifie if room disponible in new dates entred first');
	}
})

//function to get dates
function getDate(object) {
	let today = object.getDate();
	let month = object.getMonth() + 1;
	if (today < 10) {
		today = '0' + today;
	}
	if (month < 10) {
		month = '0' + month;
	}
	let year = object.getUTCFullYear();
	return `${year}-${month}-${today}`;
}