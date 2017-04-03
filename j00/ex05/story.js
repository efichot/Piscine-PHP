//global varaible
window.pokemon = "";

function reload() {
	location.reload();
}

function showAlert() {
	alert("Merci d'avoir joué.\n ©efichot");
}

function pokeball(bigPicture) {
	var display = document.querySelector("#display");
	var choices = document.querySelector("#reponse");
	var chance = Math.random();
	console.log(chance);
	if (chance < 0.5) {
		display.innerHTML = "Mince, raté! Essaie encore.";
		choices.innerHTML = "Je reload la page pour toi!";
		window.setTimeout(reload, 3000);
	} else {
		display.innerHTML = "Bravo, tu as capturé " + window.pokemon + "!";
		choices.innerHTML = "Felicitation! Le " + window.pokemon + " est ajouté à ton pokedex.";
		bigPicture.src = "resources/pokedex-kanto-1.jpg";
		window.setTimeout(showAlert, 3000);
	}
}
function addPokeball(bigPicture) {
	var div = document.querySelector(".menu2");
	div.innerHTML += '<img src="resources/pokeball.png" alt="pokeball" id="pokeball">';
	document.querySelector("#pokeball").addEventListener("click", function() {
		pokeball(bigPicture);
	});
}
function response(event)
{
	//inhibition of redirection
	event.preventDefault();
	var response = document.querySelector("#question").value;
	var bigPicture = document.querySelector("#cluster");
	var display = document.querySelector("#display");
	var choices = document.querySelector("#reponse");
	console.log(response);
	document.querySelector("#question").value = "";
	if (response.toLowerCase() == "non") {
		display.innerHTML = "Ok très bien!";
		choices.innerHTML = "Connard."
	} else if (response.toLowerCase() == "oui") {
		display.innerHTML = "Ok choisis ton pokemon!";
		choices.innerHTML = "salameche/carapuce/bulbizarre";
		bigPicture.src="resources/bulbasaur_charmander_squirtle_pokemon_starters.jpg"
	} else {
		display.innerHTML = "Quoi?!";
		choices.innerHTML = "C'est oui ou c'est non";
	}
	if (response.toLowerCase() == "salameche") {
		window.pokemon = "salameche";
		display.innerHTML = "Sale cheater!";
		choices.innerHTML = "Click sur la pokeball pour l'attraper";
		bigPicture.src="resources/Salameche-2.png";
		addPokeball(bigPicture);
	} else if (response.toLowerCase() == "carapuce") {
		window.pokemon = "carapuce";
		display.innerHTML = "Bon choix!";
		choices.innerHTML = "Click sur la pokeball pour l'attraper";
		bigPicture.src="resources/carapuce.png";
		addPokeball(bigPicture);
	} else if (response.toLowerCase() == "bulbizarre") {
		window.pokemon = "bulizarre";
		display.innerHTML = "Tu aimes la difficulté!";
		choices.innerHTML = "Click sur la pokeball pour l'attraper";
		bigPicture.src="resources/bulbizarre-68.jpg";
		addPokeball(bigPicture);
	}
}
//window.onload is fired when the entire page load
window.onload = function() {
	document.querySelector("#form").addEventListener("submit", response);
}
