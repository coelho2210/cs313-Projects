const nav = () => {
	const burger = document.querySelector('.burger');
	const navegation = document.querySelector('.nav-links');
	const navLinks = document.querySelectorAll('.nav-links li');
	
	
	
	
	burger.addEventListener('click',() => {
		navegation.classList.toggle('nav-active');
	});

	navLinks.forEach((link, index) => {

		link.style.animation =`navLinkFade 0.5s ease forwards ${index / 7 + 0.2}s`;
		
	});
}
//const app = ()=> {
nav();

