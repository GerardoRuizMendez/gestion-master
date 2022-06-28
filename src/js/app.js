document.addEventListener("DOMContentLoaded", function() {
    console.log("hola");

    var estado=document.querySelectorAll("#estado");

    estado.forEach(element => {
        console.log(element.innerHTML);
        if(element.innerHTML=="Pagado"){
            element.classList.add("ePagado");
        }
        if(element.innerHTML=="No pagado"){
            element.classList.add("eNoPagado");
        }
        if(element.innerHTML=="Rechazado"){
            element.classList.add("eRechazado");
        }
    });
});


