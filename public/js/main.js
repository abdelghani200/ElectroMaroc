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


function View($id) {
  const input = document.querySelector("#order_id");
  const form = document.querySelector("#addorder");
  input.value = $id;
  form.submit();
}


function deleteForm($id) {
  const input = document.querySelector("#delete_product_id");
  const form = document.querySelector("#delete_prd");
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


