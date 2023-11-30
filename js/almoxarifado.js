import { createFormWarehouse } from '../commons/forms.js'

(() => {
  function addFormsInHtml(){
    const mainForm = document.querySelector('#create-warehouse-main-form');
    const modalForm = document.querySelector('#edit-warehouse-modal-form');
  
    mainForm.appendChild(createFormWarehouse('warehouse-main'));
    modalForm.appendChild(createFormWarehouse('warehouse-modal'));
  }
  
  addFormsInHtml();
  
  $(document).ready(function() {
      $('#dataTableWarehouse').DataTable({
          "language": {
              "paginate": {
                "next": "Próxima",
                "previous": "Anterior"
              },
              "search": "Buscar",
              "info": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
              "lengthMenu": "Mostrar _MENU_ registros",
              "emptyTable": "Tabela vazia",
              "zeroRecords": "Nenhum registro correspondente encontrado"
            }
      });
  });

})()