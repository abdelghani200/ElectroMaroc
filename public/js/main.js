function gatCatProducts($id) {
    const input = document.querySelector("#cat_id");
    const form = document.querySelector("#catPro");
    input.value = $id;
    form.submit();
}


function submitForm($id) {
    const input = document.querySelector("#product_id");
    const form = document.querySelector("#form");
    input.value = $id;
    form.submit();
    // console.log(12);
}


function submitFormCat($id) {
    const input = document.querySelector("#categorie_id");
    const form = document.querySelector("#form");
    input.value = $id;
    form.submit();
    // console.log(12);
}


function deleteFormCat($id) {
    const input = document.querySelector("#delete_categorie_id");
    const form = document.querySelector("#delete_form");
    input.value = $id;
    form.submit();
}


function formAchat() {
    const form = document.querySelector("#achat");
    form.innerHTML = `
    <form class="" style="width: 600px;border-style: solid;padding:2rem;justify-content:center;justify-items: center;">
        <div class="form-group mb-3">
            <label for="card-number" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="card-number" aria-describedby="emailHelp">
        </div>
        <div class="form-group mb-3">
            <label for="card-holder-name" class="form-label">Cardholder name</label>
            <input type="text" class="form-control" id="card-holder-name">
        </div>
        <div class="form-group mb-3">
            <label for="expiry-date">Expiry date</label>
            <input class="form-control expire" type="text" placeholder="MM / YYYY" id="expiry-date" />
        </div>
        <div class="form-group mb-3">
            <label for="security-number">Security Number</label>
            <input class="form-control ccv" type="text" placeholder="CVC" maxlength="3" id="security-number"/>
        </div>
        <button class="btn btn-primary buy" type="submit" id="paypalbutton"><i class="fa fa-cc-paypal fa-brands"></i> Pay€</button>
    </form>`;
    document.querySelector("#paypalbutton").addEventListener("click", alertCommand);
}


document.querySelector("#buy-button").addEventListener("click", formAchat);


function alertCommand() {
    alert("Votre commande éffectue (❤️)");
}





// function updateTotal(price, qtyId, totalId) {
//     var qty = document.getElementById(qtyId).value;
//     var total = price * qty;
//     document.getElementById(totalId).innerHTML = total;
// }


//   let amount = document.querySelector('#amount').dataset.amount;
//   let finalAmount = Math.floor(amount / 9.86);
//   Buttons({
    
//     onApprove: function(data, actions) {
//       // This function captures the funds from the transaction.
//       return actions.order.capture().then(function(details) {
//         // This function shows a transaction success message to your buyer.
//         alert('Commande effectuée par ' + details.payer.name.given_name);
//         document.querySelector('#addOrder').submit();
//       });
//     }
//   }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
