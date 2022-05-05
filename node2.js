console.log("Node 2 Connected !");
const customerChange = document.getElementById("customerChange");
const submitBtn = document.getElementById("submitBtn");
const totalAmount = document.getElementById("totalAmount"); //Total
const amountPaid = document.getElementById("amountPaid"); //Amount paid by customer
submitBtn.disabled = true;

let change = '';
function f1(){
    // if(amountPaid.value >= totalAmount.value){
        //  change = amountPaid.value - totalAmount.value;
        //  changeColor();
        //  customerChange.value = change.toFixed(2);
        //  submitBtn.disabled = false;
        // customerChange.value = change;
        // customerChange.style.color = "blue";
        

    //  }else{
        change = amountPaid.value - totalAmount.value; 
        customerChange.value = change ;
        customerChange.value = change.toFixed(2);
        // customerChange.style.color = "red";
        // submitBtn.disabled = true;
    //  }
    
    //  if(change < 0){
    //     customerChange.style.color = "red";
    //     submitBtn.disabled = true;
    //  }
    //  if(change == 0){
    //     customerChange.style.color = "blue";
    //     submitBtn.disabled = false;
    //  }
     
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