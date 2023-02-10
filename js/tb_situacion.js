
var miga = localStorage.getItem("miga").split(',');
document.querySelector(".title").innerHTML = miga[0];
document.querySelector(".breadcrumbs li:nth-child(1) a").innerHTML = miga[0];
document.querySelector(".breadcrumbs li:nth-child(3) a").innerHTML = miga[1];

var tablaSinFK = async (data) => {
    return new Promise((resolve) => {
        var frag = new DocumentFragment();
        for (let [id, fila] of Object.entries(data)) {
            var tr = document.createElement("TR");
            tr.setAttribute("data-id", id);
            var editar = document.createElement("ION-ICON");
            editar.name = "cloud-upload";
            editar.classList.add("edit")
            editar.setAttribute("data-btn", id);
            var eliminar = document.createElement("ION-ICON");
            // eliminar.name = "trash";
            // eliminar.classList.add("delete");
            // eliminar.setAttribute("data-btn", id);
            var tdU = document.createElement("TD");
            tdU.append(editar);
            var tdD = document.createElement("TD");
            tdD.setAttribute("style", "text-align: center;");
            // tdD.append(eliminar);
            for (let [columna, value] of Object.entries(fila)) {
                var td = document.createElement("TD");
                if (columna != "id_situacion_laboral" && columna != "id_usuario_fk") {
                    td.setAttribute("contenteditable", "");
                }
                td.innerHTML = value;
                tr.append(td);
            }
            tr.append(tdU);
            tr.append(tdD);
            frag.append(tr);
        }
        resolve(frag);
    })
}

var listar_situa = async () => {
    let myHeader = new Headers();
    let config = {
        headers: myHeader,
        method: "POST"
    };
    myHeader.set("accept", "table_situac");
    let peticion = await fetch("../php/api.php", config);
    let res = await peticion.json();
    let plantilla = await tablaSinFK(res);
    document.querySelector("tbody").append(plantilla);
}

listar_situa();

document.querySelector("tbody").addEventListener("click", async (e) => {
    if (!e.target.classList.value.indexOf("edit")) {
        let input = document.querySelector(`tbody tr[data-id="${e.target.dataset.btn}"]`);
        let json = {
            id: input.children[0].innerHTML,
            ocu: input.children[2].innerHTML,
            rela: input.children[3].innerHTML,
            empl: input.children[4].innerHTML,
            asig: input.children[5].innerHTML,
            empre: input.children[6].innerHTML,
            salario: input.children[7].innerHTML,
            tim: input.children[8].innerHTML,
            condi: input.children[9].innerHTML,
            cursos: input.children[10].innerHTML,
        }
        let myHeader = new Headers();
        let config = {
            headers: myHeader,
            method: "POST",
            body: JSON.stringify(json)
        };
        myHeader.set("accept", "update_situ");
        let peticion = await fetch("../php/api.php", config);
        let res = await peticion.json();
        if (res["Datos actualizados"]) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Datos actualizados',
                showConfirmButton: false,
                timer: 1500
            })

        }
    } 
})