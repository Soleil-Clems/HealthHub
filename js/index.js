let from = document.getElementById("form");
let allrdv = document.getElementById("rdv");
let show = document.getElementById("dateRdv")
let jour = document.getElementById("jour");
let submit = document.getElementById("submit");
let validaterdv = document.getElementById("validaterdv");
let daterdv = null;
let currentDate = new Date();
let year = currentDate.getFullYear();
let month = currentDate.getMonth() + 1;
let monthYear = `${year}-${month}`;

makerdv();
function makerdv() {
  for (let index = 1; index <= 31; index++) {
    createrdv(index);
  }
  rdvSelected();
  numberOfGrids();
}

// let lb =document.getElementById("lb")



// lb.appendChild(label)
function createrdv(jour) {
  let label = document.createElement("label")
  label.setAttribute('for', `jour${jour}`)
  let labeltext = document.createTextNode(jour)
  label.appendChild(labeltext)
  label.classList ="label labelrdv"
  let radio = document.createElement("input");
  radio.type = "radio";
  radio.name = "creneau"
  radio.id= `jour${jour}`
  radio.classList = "btnRdv";
  radio.style.display="none"
  let newdate = `${monthYear}-${jour}`;
  radio.value = newdate;
  label.appendChild(radio)

  allrdv.appendChild(label);
}

function rdvSelected() {
  let Onerdv = document.querySelectorAll(".btnRdv");
  Onerdv.forEach((btnrdv) => {
    btnrdv.addEventListener("click", () => {
      btnrdv.style.background = 'red'
      show.innerText =btnrdv.value
      
      validaterdv.style.display = "flex";
    });
  });

}

function numberOfGrids() {
  allrdv.style.gridTemplateColumns = `repeat(7, 1fr)`;
  allrdv.style.gridTemplateRows = `repeat(7, 1fr)`;
}

