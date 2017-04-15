var list = $('#ft_list');
var button = $('#new');

function deleteTodo() {
	//console.log($(this).attr('id'));
	if (confirm('Veux-tu vraiment supprimer cette tâche?')) {
		$.ajax({
			url: 'delete.php?id=' + $(this).attr('id'),
			method:'GET',
			data: null
		})
		.done(function(data) {
			loadTodo();
		})
		.error(function(msg) {
			alert("ERROR ajax: " + msg);
		})
	}
}

function loadTodo() {
	list.empty();
	$.ajax({
		url: 'select.php',
		method: 'GET',
		data: null,
	})
	.done(function(data) {
		data = jQuery.parseJSON(data);
		//console.log(data);
		jQuery.each(data, function(i, val) {
			var div = $('<div id="' + i + '">' + val + '</div>');
			list.prepend(div.click(deleteTodo));
		})
	})
	.error(function(msg) {
		alert("ERROR ajax: " + msg);
	})
}

function newTodo() {
	var todo = prompt('Que dois tu faire?', '');
	if (todo != '') {
		$.ajax({
			url: 'insert.php?todo=' + todo,
			type: 'GET',
			data: null,
		})
		.done(function(data) {
			loadTodo(data);
		})
		.error(function(msg) {
			alert("ERROR ajax: " + msg);
		})
	}
}

$(document).ready(function() {
	button.click(newTodo);
	loadTodo();
});
