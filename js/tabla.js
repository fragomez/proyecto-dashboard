var miga = localStorage.getItem("miga").split(',');
document.querySelector(".title").innerHTML = miga[0];
document.querySelector(".breadcrumbs li:nth-child(1) a").innerHTML = miga[0];
document.querySelector(".breadcrumbs li:nth-child(3) a").innerHTML = miga[1];

var table = new DataTable("table");