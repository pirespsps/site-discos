let pesquisa = document.getElementById("pesquisar");
let dropdown = document.getElementById("dropdown-pesquisar");

pesquisa.addEventListener("input",() => {
    if(pesquisa.value != ""){
        dropdown.hidden = false;
    }else{
      dropdown.hidden = true;
    }
});

dropdown.querySelectorAll("li").forEach(item => {
    item.addEventListener("click", () => {
        let texto = pesquisa.value.trim();
        let comp = item.dataset.value;

        if(texto !== ""){
            window.location.href = `${comp}/search/${encodeURIComponent(texto)}`;
        }
    });
});