const menu = document.querySelector('.menu');
const navLinks = document.querySelector('.nav-links');
const body = document.querySelector('body');

menu.addEventListener('click', () => {
	navLinks.classList.toggle('mobile-menu');
	body.classList.toggle('noscroll');
});

const nav = document.querySelector('nav');

window.addEventListener('scroll', function () {
	nav.classList.toggle('sticky', window.scrollY > 0);
});

const activePage = window.location.pathname;
const links = document.querySelectorAll('.nav-links a').forEach((link) => {
	if (link.href.includes(`${activePage}`)) {
		link.classList.add('active');
	}
});

const signupBtn = document.getElementById('signupbtn');
const signinBtn = document.getElementById('signinbtn');
const nameField = document.getElementById('namefield');
const title = document.getElementById('title');

signinBtn.addEventListener('click', () => {
	nameField.style.maxHeight = '0';
	title.innerHTML = 'Sign In';
	signupBtn.classList.add('disable');
	signinBtn.classList.remove('disable');
});
signupBtn.addEventListener('click', () => {
	nameField.style.maxHeight = '65px';
	title.innerHTML = 'Sign Up';
	signupBtn.classList.remove('disable');
	signinBtn.classList.add('disable');
});

const loginToggelOn = document.querySelector('.login-btn');
const loginToggelOff = document.querySelector('.close');
const loginForm = document.querySelector('.login_register');
// console.log(loginToggelOff);
loginToggelOn.addEventListener('click', () => {
	loginForm.classList.toggle('hide');
});
loginToggelOff.addEventListener('click', () => {
	loginForm.classList.add('hide');
});

const roomType = document.querySelector('.room-type');
const container = document.querySelector('#container');

roomType.addEventListener('change', () => {
	if (roomType.value == 'suite') {
		const selectForm = `
      <label for="">Suite type</label>
      <select class="form-select">
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
