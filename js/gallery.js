function trieparauthor() {
  var prixmin = document.getElementById("priceMin").value;
  var prixmax = document.getElementById("priceMax").value;
  var Myselect = document.getElementById("select");
  var author = document.getElementsByName("author");
  var book = document.getElementsByName("book");
  var prixbooks = document.getElementsByName("price");

  if (Myselect.value != "") {
    if (prixmin != "" && prixmax != "") {
      if (parseFloat(prixmax) >= parseFloat(prixmin)) {
        for (var i = 0; i < book.length; i++) {
          if (
            Myselect.value == author[i].innerText &&
            parseFloat(prixbooks[i].innerText) >= parseFloat(prixmin) &&
            parseFloat(prixbooks[i].innerText) <= parseFloat(prixmax)
          ) {
            book[i].style.display = "block";
          } else {
            book[i].style.display = "none";
          }
        }
      } else {
        alert("les valeurs ne sont pas valide");
      }
    } else {
      for (var i = 0; i < book.length; i++) {
        if (Myselect.value == author[i].innerText) {
          book[i].style.display = "block";
        } else {
          book[i].style.display = "none";
        }
      }
    }
  } else {
    if (prixmin != "" && prixmax != "") {
      if (parseFloat(prixmax) >= parseFloat(prixmin)) {
        for (var i = 0; i < prixbooks.length; i++) {
          if (
            parseFloat(prixbooks[i].innerText) >= parseFloat(prixmin) &&
            parseFloat(prixbooks[i].innerText) <= parseFloat(prixmax)
          ) {
            book[i].style.display = "block";
          } else {
            book[i].style.display = "none";
          }
        }
      } else {
        alert("les valeurs ne sont pas valide");
      }
    } else {
      alert("tous les champs sont vide");
    }
  }
}
