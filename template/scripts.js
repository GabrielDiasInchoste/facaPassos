function filtroNome() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("filtro");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabela");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
};

function delProduto(id) {
    if (confirm("Deseja Excluir ?")) {
      window.location.href = "produto.php?acao=excluir&id=".concat(id);
    }
};

function delSku(id) {
    if (confirm("Deseja Excluir ?")) {
      location.href = "sku.php?acao=excluir&id=".concat(id);
    }
};

function delFornecedor(id) {
    if (confirm("Deseja Excluir ?")) {
      window.location.href = "fornecedor.php?acao=excluir&id=".concat(id);
    }
};
