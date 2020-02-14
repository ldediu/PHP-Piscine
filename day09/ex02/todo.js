let id = 0;
data = Array();
getCookie();
for (t in data) {
	addTask(data[t]);
}

function addCookie() {
	document.cookie = "list=" + data.toString();
}
function getCookie() {
	let cookie = document.cookie.split(';');
	for (c in cookie) {
		let key = cookie[c].split('=');
		if (key[0].trim() == "list") {
			if (key[1] != "") {
				d = key[1].split(',');
				for (t in d) {
					data.push(d[t]);
				}
			}
		}
	}
}
function addTask(t) {
	let ft_list = document.getElementById("ft_list");
	let div = document.createElement('div');
	div.setAttribute("id", id++);
	div.setAttribute("onclick", "delTask(this.id)");
	let task = document.createTextNode(t);
	div.appendChild(task);
	ft_list.insertBefore(div, ft_list.childNodes[0]);
}
function delTask(id) {
	let r = confirm("Remove it ?");
	if (r == true) {
		let elem = document.getElementById(id);
		data.splice(data.indexOf(elem.textContent), 1);
		elem.parentNode.removeChild(elem);
		addCookie();
	}
}
function add() {
	let item = prompt("Enter a task");
	
	if (item != null) {
		console.log(data);
		data.push(item);
		addTask(item);
		addCookie();
	}
}