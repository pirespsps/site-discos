var counter = 1;

var tracks = document.getElementsByName("track[]");
var divTrack = document.getElementById("tracks");

const uploadDiv = document.getElementById('uploadDiv');
const fileInput = document.getElementById('fileInput');
const previewImg = document.getElementById('previewImg');

uploadDiv.addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});


Array.from(tracks).forEach(element => {
    addFocusEvents(element);
})

function addFocusEvents(element) {

    element.addEventListener("focusout", (e) => {

        let value = e.target.value.trim();
        let id = e.target.id;

        if (value != "" && id == "track" + counter) {
            counter++;

            let div = document.createElement("div");

            let label = document.createElement("label");
            label.htmlFor = "track" + counter;
            label.innerHTML = `Track ${counter}`;
            label.setAttribute("style","opacity:0.4");
            label.classList.add("text-white")

            let inputTitulo = document.createElement("input");
            inputTitulo.setAttribute("style","opacity:0.4");
            inputTitulo.type = "text";
            inputTitulo.id = "track" + counter;
            inputTitulo.name = "track[]";
            inputTitulo.classList.add("w-50","rounded-pill","bg-secondary","text-white","m-1");

            let inputDuracao = document.createElement("input");
            inputDuracao.setAttribute("style","opacity:0.4");
            inputDuracao.type = "text";
            inputDuracao.placeholder = "Duração mm:ss";
            inputDuracao.id = "time" + counter;
            inputDuracao.name = "time[]";
            inputDuracao.classList.add("w-25","bg-secondary","rounded-pill","text-white","m-1","mx-3");

            inputTitulo.addEventListener("focusin",(f)=>{
                label.setAttribute("style","opacity:1");
                inputTitulo.setAttribute("style","opacity:1");
                inputDuracao.setAttribute("style","opacity:1");
            })

            inputTitulo.addEventListener("focusout",(f) => {
                if(inputTitulo.value == ""){
                    label.setAttribute("style","opacity:0.4");
                    inputTitulo.setAttribute("style","opacity:0.4");
                    inputDuracao.setAttribute("style","opacity:0.4");
                }else{
                    inputDuracao.required = true;
                }
            })

            addFocusEvents(inputTitulo);

            div.append(label);
            div.append(inputTitulo);
            div.append(inputDuracao);

            divTrack.appendChild(div);

            label.scrollIntoView({behavior:"smooth",block:"start",inline:"nearest"});
        }
    })
}