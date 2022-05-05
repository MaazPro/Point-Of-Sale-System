console.log("Node 2 Connected !");
const customerChange = document.getElementById("customerChange");
const submitBtn = document.getElementById("submitBtn");
const totalAmount = document.getElementById("totalAmount"); //Total
const amountPaid = document.getElementById("amountPaid"); //Amount paid by customer
submitBtn.disabled = true;

let change = '';
function f1(){

        change = amountPaid.value - totalAmount.value; 
        customerChange.value = change ;
        customerChange.value = change.toFixed(2);

     
    if(change >= 0){
        console.log("Change is " + change);
        customerChange.style.color = "blue";
        submitBtn.disabled = false;
    }
    if(change < 0){
        console.log("Change is " + change);
        customerChange.style.color = "red";
        submitBtn.disabled = true;
    }
}

function changeColor(){
    customerChange.style.color = "red";
    console.log("Change color");

}


 function f2(){
    submitBtn.disabled = true;
}                 