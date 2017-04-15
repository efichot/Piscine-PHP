var button = $('#new');
var list = $('#ft_list');
var newCookie = [];

function addTodo(todo) {
	var div = $('<div>' + todo + '</div>');
	list.prepend(div.on('click', function() {
		if (confirm('Veux-tu vraiment supprimer cette tâche?')) {
			newCookie.splice($.inArray(todo, newCookie), 1);
			//console.log(newCookie);
			document.cookie = JSON.stringify(newCookie);
			this.remove();
		}
	}));
	newCookie.push(todo);
	//set expires time
	var d = new Date();
	d.setTime(d.getTime() + (10*24*60*60*1000));
	var expires = ";expires=" + d.toUTCString();
	document.cookie = JSON.stringify(newCookie) + expires;
	//console.log(newCookie);
}

if (document.cookie) {
	var cookie = JSON.parse(document.cookie);
	cookie.forEach(function(v) {
		addTodo(v);
	});
} else {
	document.cookie = "";
	console.log('cookie not found');
}

button.on('click', function() {
	var todo = prompt('Que dois-tu faire?', '');
	if (todo != '') {
		addTodo(todo);
	}
});
