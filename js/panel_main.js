// PROGRESSBAR
var allProgress = document.querySelectorAll('main .card .progress');
// PROGRESSBAR
allProgress.forEach(item => {
    item.style.setProperty('--value', item.dataset.value)
})
var miga = localStorage.getItem("miga").split(',');
document.querySelector(".title").innerHTML = miga[0];
document.querySelector(".breadcrumbs li:nth-child(1) a").innerHTML = miga[0];
document.querySelector(".breadcrumbs li:nth-child(3) a").innerHTML = miga[1];
var sesion = JSON.parse(sessionStorage.getItem("login"));

var adm_tot = async () => {
    let myHeader = new Headers();
    let config = {
        headers: myHeader,
        method: "POST"
    };
    myHeader.set("accept", "PromedioAdm");
    let peticion = await fetch("../php/api.php", config);
    let res = await peticion.json();
    if (res["Admins registrados"] > 0) {
        var plantilla =
            `<div class="card">
        <div class="head">
            <div>
                <h2>${res["Admins registrados"]}</h2>
                <p>${res["Mensaje"]}</p>
            </div> 
            <ion-icon name="trending-up" class="icon"></ion-icon>
        </div>
        <span class="progress" data-value="${Math.round(res[`Porcentaje`])}%" style="--value:${Math.round(res[`Porcentaje`])}%;"></span>
        <span class="label">${Math.round(res[`Porcentaje`])}%</span>
    </div>
    `;
    }
    document.querySelector(".info-data").insertAdjacentHTML("beforeend", plantilla);
}

var usu_tot = async () => {
    let myHeader = new Headers();
    let config = {
        headers: myHeader,
        method: "POST"
    };
    myHeader.set("accept", "promUsu");
    let peticion = await fetch("../php/api.php", config);
    let res = await peticion.json();
    if (res["Usuarios registrados"] > 0) {
        var plantilla =
            `<div class="card">
        <div class="head">
            <div>
                <h2>${res["Usuarios registrados"]}</h2>
                <p>${res["Mensaje"]}</p>
            </div> 
            <ion-icon name="trending-up" class="icon"></ion-icon>
        </div>
        <span class="progress" data-value="${Math.round(res[`Porcentaje`])}%" style="--value:${Math.round(res[`Porcentaje`])}%;"></span>
        <span class="label">${Math.round(res[`Porcentaje`])}%</span>
    </div>
    `;
    }
    document.querySelector(".info-data").insertAdjacentHTML("beforeend", plantilla);
}

var dato_aca_tot = async () => {
    let myHeader = new Headers();
    let config = {
        headers: myHeader,
        method: "POST"
    };
    myHeader.set("accept", "prom_dato_aca");
    let peticion = await fetch("../php/api.php", config);
    let res = await peticion.json();
    if (res["Datos registrados"] > 0) {
        var plantilla =
            `<div class="card">
        <div class="head">
            <div>
                <h2>${res["Datos registrados"]}</h2>
                <p>${res["Mensaje"]}</p>
            </div> 
            <ion-icon name="trending-up" class="icon"></ion-icon>
        </div>
        <span class="progress" data-value="${Math.round(res[`Porcentaje`])}%" style="--value:${Math.round(res[`Porcentaje`])}%;"></span>
        <span class="label">${Math.round(res[`Porcentaje`])}%</span>
    </div>
    `;
    }
    document.querySelector(".info-data").insertAdjacentHTML("beforeend", plantilla);
}

var centro_tot = async () => {
    let myHeader = new Headers();
    let config = {
        headers: myHeader,
        method: "POST"
    };
    myHeader.set("accept", "prom_cent");
    let peticion = await fetch("../php/api.php", config);
    let res = await peticion.json();
    if (res["Centros registrados"] > 0) {
        var plantilla =
            `<div class="card">
        <div class="head">
            <div>
                <h2>${res["Centros registrados"]}</h2>
                <p>${res["Mensaje"]}</p>
            </div> 
            <ion-icon name="trending-up" class="icon"></ion-icon>
        </div>s
        <span class="progress" data-value="${Math.round(res[`Porcentaje`])}%" style="--value:${Math.round(res[`Porcentaje`])}%;"></span>
        <span class="label">${Math.round(res[`Porcentaje`])}%</span>
    </div>
    `;
    }
    document.querySelector(".info-data").insertAdjacentHTML("beforeend", plantilla);
}

var prom_situacion_tot = async () => {
    let myHeader = new Headers();
    let config = {
        headers: myHeader,
        method: "POST"
    };
    myHeader.set("accept", "prom_situ");
    let peticion = await fetch("../php/api.php", config);
    let res = await peticion.json();
    if (res["Situaciones laborales registradas"] > 0) {
        var plantilla =
            `<div class="card">
        <div class="head">
            <div>
                <h2>${res["Situaciones laborales registradas"]}</h2>
                <p>${res["Mensaje"]}</p>
            </div> 
            <ion-icon name="trending-up" class="icon"></ion-icon>
        </div>
        <span class="progress" data-value="${Math.round(res[`Porcentaje`])}%" style="--value:${Math.round(res[`Porcentaje`])}%;"></span>
        <span class="label">${Math.round(res[`Porcentaje`])}%</span>
    </div>
    `;
    }
    document.querySelector(".info-data").insertAdjacentHTML("beforeend", plantilla);
}


adm_tot();
usu_tot();
dato_aca_tot();
centro_tot();
prom_situacion_tot();