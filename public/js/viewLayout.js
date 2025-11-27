let favoritarIMG = document.getElementById("favoritarIMG")
let comentarIMG = document.getElementById("comentarIMG")
let stars = document.body.getElementsByClassName("starsIMG")
let comentarioField = document.getElementById("novoComentario")
const removerComentario = document.getElementById("removerComentario")
const type = document.getElementById('type').value
const id = document.getElementById('id').value

const path = "http://127.0.0.1:8000/images/"

let isFavorite = favoritarIMG.src.includes("primary")
let isCommented = comentarIMG.src.includes("primary")
let nota = getNota();
let hasChanged = false;
let comentario = "";

const edit = document.getElementById("edit")

window.onbeforeunload = () => {sendRequest()}

document.getElementById("cancelarComentario").addEventListener("click",()=>{
    if(edit == null){
        document.getElementById("comentarioTextArea").value = ""
    }
    comentarioField.hidden = true
});

document.getElementById("enviarComentario").addEventListener("click", () => {
    let text = document.getElementById("comentarioTextArea").value.trim()
    
    if(text != "" && text != null){
        hasChanged = true;
        comentario = text;
        window.location.reload(true);
    }

})

if(removerComentario != null){
    removerComentario.addEventListener("click",()=>{
        let confirmDialog = document.getElementById("confirmDialog"); 
        confirmDialog.hidden = false;
        confirmDialog.scrollIntoView({behavior:"smooth",block:"start",inline:"nearest"})
    });
}

document.getElementById("confirmarRemover").addEventListener("click",()=>{

    let token = document.getElementById("_token").value
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token

    axios.post(`/${type}/${id}/removerComentario`,{})
    .then(response => {console.log(response)})
    .catch(error => {console.log(error)})

    window.location.reload(true);

});

document.getElementById("cancelarRemover").addEventListener("click",()=>{
    document.getElementById("confirmDialog").hidden = true
});

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

function sendRequest(){
    if(hasChanged){

        let token = document.getElementById("_token").value
        axios.defaults.headers.common['X-CSRF-TOKEN'] = token

        axios.post(`/${type}/${id}/viewPOST`,{
            nota: nota,
            isFavorite: isFavorite,
            comentario: comentario,
            isEdit: edit != null
        })
        .then(response => {console.log(response)})
        .catch(error => {console.log(error)})
    }
}

function getNota(){
    let n = 0;
    Array.from(stars).forEach(star => {
        let isliked = star.src.includes("primary")

        if(isliked){
            n++
        }
    })
    return n;
}