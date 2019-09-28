const nav = () => {
  const burger = document.querySelector(".burger");
  const navegation = document.querySelector(".nav-links");
  const navLinks = document.querySelectorAll(".nav-links li");

  burger.addEventListener("click", () => {
    //my toggle
    navegation.classList.toggle("nav-active");

    //Animate links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = "";
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 +
          1.5}s`;
      }
	});
	
	//my Burger Animation
	burger.classList.toggle('toggle');

  });
};

//const app = ()=> {
nav();
