let rowsToRemove = [];
let rows = document.getElementsByClassName("rowI");
let tabela = document.getElementById("tabela");
const type = document.getElementById('type').value
const id = document.getElementById('id').value

Array.from(document.getElementsByClassName("removeBT")).forEach((btn) => {
    btn.addEventListener("click", () => {
        const row = btn.closest("tr");
        const id = row.getAttribute("name").replace("row", "");

        rowsToRemove.push(id);
        row.remove();
    });
});

document.getElementById("confirmarBT").addEventListener("click", () => {
    let titulo = document.getElementById("tituloI").value.trim();
    let ano = document.getElementById("anoI").value.trim();
    let banda;
    if(document.getElementById("bandaI") !== null){
        banda = document.getElementById("bandaI").value.trim();
    }
    let camposM = [];

    Array.from(rows).forEach((row) => {
        let data = [];
        Array.from(row.getElementsByClassName("input")).forEach((element) => {
            data.push(element.value);
        });
        camposM.push(data);
    });

    let token = document.getElementById("_token").value;
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

    axios.post(`/${type}/${id}`, {
        titulo: titulo,
        ano: ano, 
        banda: banda,
        campos: camposM,
        remove: rowsToRemove,
        _method: 'PUT',
    })
        .then(response => { document.location.href = `/${type}/${id}`})
        .catch(error => { console.log(error) });

});