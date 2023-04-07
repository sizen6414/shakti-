function myFunction() {
	var x = document.getElementById("email").value;
	document.getElementById("message").style.display = 'none';
	// window.location.reload();
}



const validnumber = function (num) {

	if (parseInt(num) < 0 || isNaN(num)) {
		document.querySelector("message").innerHTML = "Not Valid";
	}
}
function allLetter(inputtxt) {
	var letters = /^[A-Za-z]+$/;
	if (inputtxt.value.match(letters)) {
		return true;
	}
	else {
		alert("message");
		return false;
	}
}