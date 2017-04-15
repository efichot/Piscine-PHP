var button = document.querySelector('#new');
var list = document.querySelector('#ft_list');

function addTodo(todo) {
	var div = document.createElement('div');
	div.innerHTML = todo;
	list.insertBefore(div, list.firstChild);
	div.addEventListener('click', function() {
		if (confirm('Veux-tu vraiment supprimer cette tâche?')) {
			this.parentElement.removeChild(this);
		}
	});
}

if (document.cookie) {
	var cookie = JSON.parse(document.cookie);
	cookie.forEach(function(e) {
		addTodo(e);
	});
} else {
	document.cookie = "";
	console.log('cookie not found');
}

button.addEventListener('click', function() {
	var todo = prompt('Que dois-tu faire?', '');
	if (todo != '') {
		addTodo(todo);
	}
});

window.onunload = function() {
	var newCookie = [];
	var todo = list.children;
	//set expires time
	var d = new Date();
	d.setTime(d.getTime() + (10*24*60*60*1000));
	var expires = ";expires=" + d.toUTCString();
	//console.log(todo);
	for (var i=0; i < todo.length; i++) {
		newCookie.unshift(todo[i].innerHTML);
	}
	//console.log(newCookie);
	document.cookie = JSON.stringify(newCookie) + expires;
	//console.log(document.cookie);
};
