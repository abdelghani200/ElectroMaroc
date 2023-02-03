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
}


function submitFormCat($id) {
    const input = document.querySelector("#categorie_id");
    const form = document.querySelector("#form");
    input.value = $id;
    form.submit();
}


function deleteFormCat($id) {
    const input = document.querySelector("#delete_categorie_id");
    const form = document.querySelector("#delete_form");
    input.value = $id;
    form.submit();
}


function deleteOrder($id) {
    const input = document.querySelector("#delete_order_id");
    const form = document.querySelector("#delete_order");
    input.value = $id;
    form.submit();
}




function Valider(orderId) {
  let row = document.querySelector(`tr[data-order-id="${orderId}"]`);
  
  // Vérifier si l'ID de la commande a déjà été stocké dans localStorage
  if (localStorage.getItem(`orderId_${orderId}`) === 'validated') {
    // Si oui, définir la couleur enregistrée sur la ligne
    row.style.backgroundColor = "green";
  } else {
    // Sinon, définir la couleur de la ligne en vert
    row.style.backgroundColor = "green";
    // Et enregistrer l'ID de la commande dans localStorage
    localStorage.setItem(`orderId_${orderId}`, 'validated');
  }
}

document.addEventListener("DOMContentLoaded", function() {
  // Récupérer toutes les lignes de commandes
  let rows = document.querySelectorAll("tr[data-order-id]");

  // Boucler sur chaque ligne
  for (let i = 0; i < rows.length; i++) {
    let row = rows[i];
    let orderId = row.getAttribute("data-order-id");

    // Vérifier si l'ID de la commande a déjà été stocké dans localStorage
    if (localStorage.getItem(`orderId_${orderId}`) === 'validated') {
      // Si oui, définir la couleur enregistrée sur la ligne
      row.style.backgroundColor = "green";
    }
  }
});




function Delivery(orderId) {
  let row = document.querySelector(`tr[data-order-id="${orderId}"]`);
  
  // Vérifier si l'ID de la commande a déjà été stocké dans localStorage
  if (localStorage.getItem(`orderId_${orderId}`) === 'delivery') {
    // Si oui, définir la couleur enregistrée sur la ligne
    row.style.backgroundColor = "skyblue";
  } else {
    // Sinon, définir la couleur de la ligne en vert
    row.style.backgroundColor = "skyblue";
    // Et enregistrer l'ID de la commande dans localStorage
    localStorage.setItem(`orderId_${orderId}`, 'delivery');
  }
}

document.addEventListener("DOMContentLoaded", function() {
  // Récupérer toutes les lignes de commandes
  let rows = document.querySelectorAll("tr[data-order-id]");

  // Boucler sur chaque ligne
  for (let i = 0; i < rows.length; i++) {
    let row = rows[i];
    let orderId = row.getAttribute("data-order-id");

    // Vérifier si l'ID de la commande a déjà été stocké dans localStorage
    if (localStorage.getItem(`orderId_${orderId}`) === 'delivery') {
      // Si oui, définir la couleur enregistrée sur la ligne
      row.style.backgroundColor = "skyblue";
    }
  }
});
  










// function formAchat() {
//     const form = document.querySelector("#achat");
//     form.innerHTML = `
//     <form id="achat" style="width: 600px;border-style: solid;padding:2rem;justify-content:center;justify-items: center;">
//         <div class="form-group mb-3">
//             <label for="card-number" class="form-label">Card Number</label>
//             <input type="text" class="form-control" id="card-number" aria-describedby="emailHelp" required>
//         </div>
//         <div class="form-group mb-3">
//             <label for="card-holder-name" class="form-label">Cardholder name</label>
//             <input type="text" class="form-control" id="card-holder-name" required>
//         </div>
//         <div class="form-group mb-3">
//             <label for="expiry-date">Expiry date</label>
//             <input class="form-control expire" type="text" placeholder="MM / YYYY" id="expiry-date" required />
//         </div>
//         <div class="form-group mb-3">
//             <label for="security-number">Security Number</label>
//             <input class="form-control ccv" type="text" placeholder="CVC" maxlength="3" id="security-number" required/>
//         </div>
//         <button class="btn btn-primary buy" type="submit" id="paypalbutton"><i class="fa fa-cc-paypal fa-brands"></i> Pay€</button>
//     </form>`;

//     document.querySelector("#paypalbutton").addEventListener("click", alertCommand);

// }


// document.querySelector("#buy-button").addEventListener("click", formAchat);



// function alertCommand() {
//     alert("Votre commande éffectue (❤️)");
// }


document.querySelector("#buy-button").addEventListener("click", function () {
    document.getElementById("achat").style.display = "flex";
});

document.querySelector("#paypalbutton").addEventListener("click", function () {
    var form = document.querySelector("#addorder");
    if (form) {
        form.submit();
    }
});


