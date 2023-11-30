import { createFormUser } from '../commons/forms.js'

(() => {

    const tableBody = document.querySelector('#table-body')

    const usersList = [
        {
            'id': '5',
            'name': 'Maria',
            'email': 'maria@gmail',
            'type': 'Gestor',
            'status': '1',
        },
        {
            'id': '10',
            'name': 'João',
            'email': 'joao@gmail',
            'type': 'Usuário Padrão',
            'status': '1',
        },
        {
            'id': '1',
            'name': 'Thiago',
            'email': 'thiago@gmail',
            'type': 'Gestor',
            'status': '1',
        },
        {
            'id': '7',
            'name': 'Eduardo',
            'email': 'eduardo@gmail',
            'type': 'Usuário Padrão',
            'status': '0',
        },
    ]

    const createRow = (user) => {
        const tableRow = document.createElement('tr');
        const status = user.status === '1' ? true : false

        tableRow.innerHTML = `
            <td>${user.id}</td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.type}</td>
            <td>
                <button class="btn btn-${status ? 'success' : 'danger'} btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-${status ? 'check' : 'times'}"></i>
                    </span>
                    <span class="text">${status ? 'Ativo' : 'Inativo'}</span>
                </button>
            </td>
            <td>
                <button class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#modal-edit-user">
                    <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Editar</span>
                </button>
            </td>
        `

        return tableRow
    }


    function addRowsInTable(users){
        const fragment = new DocumentFragment();

        users.forEach((user) => {
            fragment.appendChild(createRow(user))
        })

        tableBody.appendChild(fragment)
    }

      
    function addFormsInHtml(){
        const mainForm = document.querySelector('#create-user-main-form');
        const modalForm = document.querySelector('#edit-user-modal-form');
        
        mainForm.appendChild(createFormUser('user-main'));
        modalForm.appendChild(createFormUser('user-modal'));
    }
     
    
    function listUsers() {
        addRowsInTable(usersList)

        $(document).ready(function() {
            $('#dataTableUsers').DataTable({
                "language": {
                    "paginate": {
                      "next": "Próxima",
                      "previous": "Anterior"
                    },
                    "search": "Buscar",
                    "info": "Mostrando de _START_ a _END_ de _TOTAL_ usuários",
                    "lengthMenu": "Mostrar _MENU_ usuários",
                    "emptyTable": "Tabela vazia",
                    "zeroRecords": "Nenhum registro correspondente encontrado"
                  }
            });
        });
    }
    
    addFormsInHtml();
    listUsers();
})()

