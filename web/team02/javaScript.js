function click() {
	const message = alert("Clicked!");
	
}

function changeColor() {
	var textbox_id = "txtColor";
	var textbox = document.getElementById(textbox_id);

	var div_id = "div1";
	var div = document.getElementById(div_id);

    
    
    // what that code is doing ?? 
	var color = textbox.value;
	div.style.backgroundColor = color;

}