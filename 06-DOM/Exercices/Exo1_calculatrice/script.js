window.onload = () => {
    //Ecouter les click sur les touches
    let touches = document.querySelectorAll(".touche");
    for (let touche of touches) {
        touche.addEventListener("click", gestionTouches);
    }
}

//Reagir au click sur les touches
function gestionTouches() {
    let touche = this.innerText;
console.log(touche)
}
