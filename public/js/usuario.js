document.getElementById("defaultOpen").click();

function openTab(evt,tabName){
    var i, tabContents, tabItems;

    tabContents = document.getElementsByClassName("tab-content");

    for(i = 0;i < tabContents.length;i++){
        tabContents[i].style.display = "none";
    }

    tabItems = document.getElementsByClassName("tab-item");
    
    for(i = 0;i < tabItems.length;i++){
        tabItems[i].className = tabItems[i].className.replace("link-primary", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += "link-primary";

}