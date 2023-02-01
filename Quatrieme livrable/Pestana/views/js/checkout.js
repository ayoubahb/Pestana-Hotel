const form = document.querySelector('.needs-validation');

form.addEventListener('submit',(event) => {
		if (!form.checkValidity()) {
			event.preventDefault();
			event.stopPropagation();
		}

		form.classList.add('was-validated');
	}
);


let container = document.querySelector('.cont');
let select = document.querySelector('#select');

select.addEventListener('change', () => {
	if (select.value == 'Suite') {
		let element = document.createElement('div');
		element.classList.add('col-md-6');
		element.id = 'suite';
		element.innerHTML = `<label class="form-label">Suite Type</label>
									<select class="form-select" name="room_suite_type" required>
										<option value="">Choose...</option>
                    <option value="Standard">Standard suite rooms</option>
                    <option value="Junior">Junior suite</option>
                    <option value="Presidential">Presidential suite</option>
                    <option value="Penthouse">Penthouse suites</option>
                    <option value="Honeymoon">Honeymoon suites</option>
                    <option value="Bridal">Bridal suites</option>
									</select>
									<div class="invalid-feedback">
										Please select a valid country.
									</div>`;
		container.append(element);
	} else {
		let exist = document.querySelector('#suite');
		if (typeof exist != 'undefined' && exist != null) {
			exist.remove();
		}
	}
});
