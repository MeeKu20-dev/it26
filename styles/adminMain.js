let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

function TableSearch() {
  let input, filter, table, tr, td, txtValue;

  //Intialising Variables
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("patientTable");
  tr = table.getElementsByTagName("tr");

  for (let i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
          } else {
              tr[i].style.display = "none";
          }
      }
  }
}

function docTableSearch() {
  let input, filter, table, tr, td, txtValue;

  //Intialising Variables
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("docTable");
  tr = table.getElementsByTagName("tr");

  for (let i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
          } else {
              tr[i].style.display = "none";
          }
      }
  }
}

function medTableSearch() {
  let input, filter, table, tr, td, txtValue;

  //Intialising Variables
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("medTable");
  tr = table.getElementsByTagName("tr");

  for (let i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
          } else {
              tr[i].style.display = "none";
          }
      }
  }
}