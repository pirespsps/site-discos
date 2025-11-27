let rowsToRemove = [];
let rows = document.getElementsByClassName("rowI");
let tabela = document.getElementById("tabela");

Array.from(document.getElementsByClassName("removeBT")).forEach((btn) => {
    btn.addEventListener("click", () => {
        const row = btn.closest("tr");
        const id = row.getAttribute("name").replace("row", "");

        rowsToRemove.push(id);
        row.remove();
    });
});

document.getElementById("confirmarBT").addEventListener("click",() => {
    let titulo = document.getElementById("tituloI").value;
    let ano = document.getElementById("anoI").value;
    let banda = document.getElementById("bandaI").value;

    Array.from(rows).forEach((row) => {
        
    });

});