function gstSwitch(type){
    var gstOne1 = document.querySelector(".gstOne1");
    var gstOne2 = document.querySelector(".gstOne2");
    var gstTwo = document.querySelector(".gstTwo");

    if(type == "one"){
        console.log("Open one");
        gstOne1.classList.add("open");
        gstOne2.classList.add("open");
        gstTwo.classList.remove("open");
    }else{
        console.log("Open two");
        gstTwo.classList.add("open");
        gstOne1.classList.remove("open");
        gstOne2.classList.remove("open");
    }
}

function calcTotal(){
    let productQty = document.getElementById("productQty");
    let productUnitPrice = document.getElementById("productUnitPrice");
    let productTotal = document.getElementById("productTotal");    

    productTotal.value = productQty.value * productUnitPrice.value;
}

const allTotal = [];
let sumSubtotal = 0;

function addList(){
    let productName = document.getElementById("productName");
    let productDescription = document.getElementById("productDescription");
    let productQty = document.getElementById("productQty");
    let productHsn = document.getElementById("productHsn");
    let productUnitPrice = document.getElementById("productUnitPrice");
    let productTotal = document.getElementById("productTotal");    
    tableItems = document.getElementById("tableItems");

    const productField = document.createElement("tr");
    if(productName.value === "" || productDescription.value === "" || productQty.value === "" || productHsn.value === "" || productUnitPrice.value === ""){
        alert("All fields are manditory.");
    }else{
        productField.className = "table_content";
        productField.innerHTML = "<td>1</td><td>"+ productName.value+ " ("+ productDescription.value +")" +"</td><td>"+ productQty.value +"</td><td>"+ productHsn.value +"</td><td>"+ productUnitPrice.value +"</td><td id='pTotal'>"+ productQty.value*productUnitPrice.value +"</td>";
        tableItems.appendChild(productField);

        productName.value = "";
        productDescription.value = "";
        productHsn.value = "";
        productUnitPrice.value = "";

        allTotal.push(parseInt(productTotal.value));

        for (let i = 0; i < allTotal.length; i++) {
            sumSubtotal += allTotal[i];
        }

        document.getElementById("subTotal").innerHTML = sumSubtotal.toFixed(2);
        document.getElementById("cgstPer").innerHTML = ((sumSubtotal / 100) * 9).toFixed(2);
        document.getElementById("sgstPer").innerHTML = ((sumSubtotal / 100) * 9).toFixed(2);
        document.getElementById("igstPer").innerHTML = ((sumSubtotal / 100) * 18).toFixed(2);
        document.getElementById("listTotal").innerHTML = ((sumSubtotal * 0.18) + sumSubtotal).toFixed(2);

        sumSubtotal = 0;
    }

    const delIcon = document.createElement("td");
    delIcon.className = "close";
    delIcon.innerHTML = "<i class='fa-solid fa-trash-can'></i></td>";
    productField.appendChild(delIcon);

    var closeTr = document.getElementsByClassName("close");
    for (let i = 0; i < closeTr.length; i++) {
        closeTr[i].onclick = function() {
            var parentTr = this.parentElement;
            parentTr.remove();

            let pTotal = document.querySelectorAll("#pTotal");
            allTotal.splice(0,allTotal.length);

            for(let i = 0; i < pTotal.length; i++){
                allTotal.push(parseInt(pTotal[i].innerHTML));
            }

            for (let i = 0; i < allTotal.length; i++) {
                sumSubtotal += allTotal[i];
            }
    
            document.getElementById("subTotal").innerHTML = sumSubtotal.toFixed(2);
            document.getElementById("cgstPer").innerHTML = ((sumSubtotal / 100) * 9).toFixed(2);
            document.getElementById("sgstPer").innerHTML = ((sumSubtotal / 100) * 9).toFixed(2);
            document.getElementById("igstPer").innerHTML = ((sumSubtotal / 100) * 18).toFixed(2);
            document.getElementById("listTotal").innerHTML = ((sumSubtotal * 0.18) + sumSubtotal).toFixed(2);
    
            sumSubtotal = 0;
        }
    }
}




const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");
const searchBox = document.querySelector(".search-box input");

const optionsList = document.querySelectorAll(".option");

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");

  searchBox.value = "";
  filterList("");

  if (optionsContainer.classList.contains("active")) {
    searchBox.focus();
  }
});

optionsList.forEach(o => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
  });
});

searchBox.addEventListener("keyup", function(e) {
  filterList(e.target.value);
});

const filterList = searchTerm => {
  searchTerm = searchTerm.toLowerCase();
  optionsList.forEach(option => {
    let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
    if (label.indexOf(searchTerm) != -1) {
      option.style.display = "block";
    } else {
      option.style.display = "none";
    }
  });
};


const selected2 = document.querySelector(".selected2");
const optionsContainer2 = document.querySelector(".options-container2");
const searchBox2 = document.querySelector(".search-box2 input");

const optionsList2 = document.querySelectorAll(".option2");

selected2.addEventListener("click", () => {
  optionsContainer2.classList.toggle("active");

  searchBox2.value = "";
  filterList("");

  if (optionsContainer2.classList.contains("active")) {
    searchBox2.focus();
  }
});

optionsList2.forEach(o => {
  o.addEventListener("click", () => {
    selected2.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer2.classList.remove("active");
  });
});

searchBox2.addEventListener("keyup", function(e) {
  filterList2(e.target.value);
});

const filterList2 = searchTerm2 => {
  searchTerm2 = searchTerm2.toLowerCase();
  optionsList2.forEach(option => {
    let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
    if (label.indexOf(searchTerm2) != -1) {
      option.style.display = "block";
    } else {
      option.style.display = "none";
    }
  });
};