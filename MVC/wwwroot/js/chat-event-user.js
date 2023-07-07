const form123 = document.querySelector('.typing-area123');
const inputField123 = form.querySelector('.input-field123');
const sendBtn123 = form.querySelector('.button123');
const chatBox123 = document.querySelector('.chat-box123');

const incoming_id123 = form.querySelector('.incoming_id123').value;


form123.onsubmit = (e) => {
	e.preventDefault();
}

inputField123.focus();
inputField123.onkeyup = () => {
	if(inputField123.value != ""){
		sendBtn123.classList.add("active")
	} else {
		sendBtn123.classList.remove("active")
	}
}

sendBtn123.onclick = () => {
	let xhr = new XMLHttpRequest();
	xhr.open("POST", '/Project---CTStore---WD1110/Messages/insertChat', true);
	xhr.onload = () => {
		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
			inputField123.value = "";
			scrollToBottom();
		}
	}
	let formData = new FormData(form123);
	xhr.send(formData);
}

setInterval(() => {
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "/Project---CTStore---WD1110/Messages/getChat", true);
	xhr.onload = () => {
		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
			chatBox123.innerHTML = xhr.response;
			if(!chatBox123.classList.contains('active')){
				scrollToBottom();
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send();
}, 500)

chatBox123.onmouseenter = () => {
	chatBox123.classList.add('active')
}

chatBox123.onmouseleave = () => {
	chatBox123.classList.remove('active')
}

function scrollToBottom(){
	chatBox123.scrollTop = chatBox123.scrollHeight;
}