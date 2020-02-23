let textArea = document.querySelector('.form__textarea');                               
let formInputFirst = document.querySelector('.form__input__first');                     
let sel = document.querySelector('.sel');   


document.querySelector('.btn').onclick = (e) => {
	e.preventDefault(); 
	for (let i = 0; i < textArea.value.length; i++) {
		if (textArea.value.length < 5) {
			chipsCreateLength ();
			return false;
		}
	}
	if (textArea.value == '') {
		chipsCreate ();
		return false;		
	}
	else {			
		fetch("./user-role.php", {
			method: "post",
			body: textArea.value
		}).then(response => response.text()).then(response => {
			console.log(response);
			if (response==1) {
				succsess ();			
			}
		});
		
	}
};

document.querySelector('.btn__second').onclick = (e) => {
	e.preventDefault();
	if (formInputFirst.value == '' || sel.value == 'rolename') {
		chipsCreate ();
		return false;	
	}
	else {
		fetch("./user.php", {
			method: "post",
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
			},
			body: JSON.stringify({
				'sel': sel.value,
				'firstInp': formInputFirst.value
			})
		}).then(response => response.text()).then(response => {
			console.log(response);
			if (response==1) {
				succsess ();			
			}
		});
	}
};


//--------------------------------- chips -----------------------------------


function succsess () {
	let chips = document.createElement('div');
	chips.classList.add('chips');
	let message = document.createTextNode("data was sent successfully!");
	chips.appendChild(message);
	let chiepsField = document.querySelector('.chieps-field');
	chiepsField.appendChild(chips);
	
	setTimeout(()=> {
		chipsRemove (chips);
	}, 3000)
}

function chipsCreate () {
	let chips = document.createElement('div');
	chips.classList.add('chips');
	let message = document.createTextNode("Fill the fields!");
	chips.appendChild(message);
	let chiepsField = document.querySelector('.chieps-field');
	chiepsField.appendChild(chips);
	
	setTimeout(()=> {
		chipsRemove (chips);
	}, 3000)
}

function chipsCreateLength () {
	let chips = document.createElement('div');
	chips.classList.add('chips');
	let message = document.createTextNode("String can't be less than 5 characters!");
	chips.appendChild(message);
	let chiepsField = document.querySelector('.chieps-field');
	chiepsField.appendChild(chips);
	
	setTimeout(()=> {
		chipsRemove (chips);
	}, 3000)
}

function chipsRemove (chips) {
	chips.remove ();
}

function check () {
	if (sel == true) {
		console.log("selected");
		
	}
}