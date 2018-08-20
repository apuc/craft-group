// tab switcher for project examples
function openService(evt, buttonName) {
    // Declare all variables
    var i, services_item, btn_services;
    // Get all elements with class="services_item" and hide them
    services_item = document.getElementsByClassName("services_item");
    for (i = 0; i < services_item.length; i++) {
        services_item[i].style.display = "none";
    }
    // Get all elements with class="btn-project" and remove the class "active"
    btn_services = document.getElementsByClassName("btn_services");
    for (i = 0; i < btn_services.length; i++) {
        btn_services[i].className = btn_services[i].className.replace(" activeServices", "");
    }
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(buttonName).style.display = "flex";
    evt.currentTarget.className += " activeServices";
}

$(function () {
    document.getElementById("defaultOpen").click();
});