console.log("Connected !");
// const amountPaid = document.getElementById("amountPaid"); //Amount paid by customer
// const totalAmount = document.getElementById("totalAmount"); //Total
// const customerChange = document.getElementById("customerChange");
// const submitBtn = document.getElementById("submitBtn");

let change = '';
 function f1(){
     if(amountPaid.value >= totalAmount.value){
         change = amountPaid.value - totalAmount.value;
         customerChange.value = change.toFixed(2);
        //  submitBtn.disabled = false;
        console.log("HI");

     }else{
        change = amountPaid.value - totalAmount.value; 
        customerChange.value =   change ;
        // submitBtn.disabled = true;
     }
    
    //  if(change < 0){
    //     customerChange.style.color = "red";
    //     submitBtn.disabled = true;
    //  }
    //  if(change == 0){
    //     customerChange.style.color = "blue";
    //     submitBtn.disabled = false;
    //  }
     
}

// function f2(){
//     submitBtn.disabled = true;
// }                 