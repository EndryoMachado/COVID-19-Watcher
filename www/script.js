var btnTopo = document.getElementById("btnTopo");
var lista1 = document.getElementById("lista1");
var lista2 = document.getElementById("lista2");
btnTopo.addEventListener("click", function() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});

window.addEventListener("scroll", function() {
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    btnTopo.style.display = "block";
  } else {
    btnTopo.style.display = "none";
  }
});



  lista1.addEventListener("change", function() {
    var opcaoSelecionada = lista1.value;
    for (var i = 1; i < lista2.options.length; i++) {
      if (lista2.options[i].value == opcaoSelecionada) {
        lista2.options[i].disabled = true;
      } else {
        lista2.options[i].disabled = false;
      }
    }
  });

  lista2.addEventListener("change", function() {
    var opcaoSelecionada = lista2.value;

    for (var i = 1; i < lista1.options.length; i++) {
      if (lista1.options[i].value == opcaoSelecionada) {
        lista1.options[i].disabled = true;
      } else {
        lista1.options[i].disabled = false;
      }
    }
  });



