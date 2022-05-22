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