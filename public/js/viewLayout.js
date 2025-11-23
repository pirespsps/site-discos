let favoritarIMG = document.getElementById("favoritarIMG")
let comentarIMG = document.getElementById("comentarIMG")
let stars = document.body.getElementsByClassName("starsIMG")
let comentarioField = document.getElementById("novoComentario")

let path = "http://127.0.0.1:8000/images/"

let isFavorite = favoritarIMG.src.includes("primary")
let isCommented = comentarIMG.src.includes("primary")
let nota = getNota();
let hasChanged = false;

window.onbeforeunload = () => {
    if(hasChanged){
        
    }
}

Array.from(stars).forEach(element => {
    element.addEventListener("click", () => { starEvent(element) });
});

favoritarIMG.addEventListener("click", favoriteEvent);

comentarIMG.addEventListener("click", comentarEvent)

function comentarEvent() {
    comentarioField.hidden = !comentarioField.hidden
}

function favoriteEvent() {
    hasChanged = true;
    if (isFavorite) {
        favoritarIMG.src = `${path}whiteHeartIcon.png`
        isFavorite = false
    } else {
        favoritarIMG.src = `${path}primaryHeartIcon.png`
        isFavorite = true
    }
}

function starEvent(element) {
    hasChanged = true;

    nota = element.id.replace("star", "")

    Array.from(stars).forEach(star => {
        star.src = `${path}whiteStarIcon.png`
    });

    for (let i = 1; i <= nota; i++) {
        let star = document.getElementById(`star${i}`)
        star.src = `${path}primaryStarIcon.png`
    }
}

function getNota(){
    n = 0;
    Array.from(stars).forEach(star => {
        let isliked = star.src.includes("primary")

        if(isliked){
            n++
        }
    })
    return n;
}