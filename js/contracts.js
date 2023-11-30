import { createFormContract } from '../commons/forms.js'

(() => {
  const listContracts = [
    {
      numContract: '2014.09.22.01-SESAU',
      modality: 'DISPENSA DE LICITAÇÃO',
      numModality: '2014.09.01.01',
      object: 'LOCAÇÃO DE IMÓVEL LOCALIZADO À RUA MANOEL MIGUEL DOS SANTOS, 125-LAGOA SECA-JUAZEIRO DO NORTE/CE, DESTINADO PARA O FUNCIONAMENTO DO CAPS I (CENTRO DE ATENÇÃO PSICOSSOCIAL INFANTIL) DE JUAZEIRO DO NORTE',
      providers: ['RAIMUNDO TAVARES SIMÕES', 'Helio de Lima Ferreira'],
      validity: '2023/10/15',
      additive:'7º Aditivo',
      start: '2022',
      months: '13 Meses',
    },
    {
      numContract: '2021.05.21-0001',
      modality: 'Dispensa de Licitação',
      numModality: '2021.05.14.01',
      object: 'Contratação de serviços a serem prestados na locação de veículos destinados ao transporte de profissionais de sáude no combate à pandemia provocada pelo Coronavírus',
      providers: ['W.A LOCADORA EIRELI'],
      validity: '2021/07/21',
      additive:'',
      start: '2020',
      months: '12 Meses',
    },
  ];
  const types = ['Locação de Imóveis', 'Prestação de Serviços', 'Aquisições'];
  const modalities = ['Dispensa de Licitação', 'Pregão Eletrônico', 'Pregão', 'Processo de Adesão', 'Processo de Carona', 'Tomada de Preços', 'Concorrência Pública', 'Carta Convite', 'Chamamento Público', 'Ata de Registro de Preços'];
  const providers = ['RAIMUNDO TAVARES SIMÕES', 'Helio de Lima Ferreira'];
  
  const tbodyContracts = document.querySelector('#table-body-contracts');
  
  let selectedProviders;
  let listProviders;
  let divSelectModality;
  let divSelectType;
  
  
  function addProviders(providers){
    const fragment = new DocumentFragment();
  
    providers.forEach((provider) => {
      fragment.appendChild(createButtonProvider(provider));
    });
  
    listProviders.appendChild(fragment)
  }
  
  
  function createButtonProvider(provider){
    const button = document.createElement('button');
    button.classList = 'list-group-item list-group-item-action'
    button.textContent = provider
    return button
  }
  
  
  function addOptionsSelect(options, typeSelect){
    let text, id, optionsInnerHTML = '';
    let classList = 'custom-select';
    let chosen;
    
    if (typeSelect === 'types'){
      id = 'select-type-service'
      text = 'Selecione o tipo'
    }
    else if(typeSelect === 'modalities'){
      id = 'select-modality'
      text = 'Selecione a modalidade'
    }
  
    let selectString = `<option value="none" selected>${text}</option>`
  
    options.forEach((option, index) => {
      optionsInnerHTML += `<option value="${typeSelect}-${index+1}">${option}</option>`
    });
  
    if (typeSelect === 'types'){
      chosen = divSelectType;
    }
    else if(typeSelect === 'modalities'){
      chosen = divSelectModality;
    }
    
    chosen.forEach((choice) => {
      const select = document.createElement('select');
      select.id = id;
      select.classList = classList;
      select.innerHTML = selectString + optionsInnerHTML;
  
      choice.appendChild(select)
    })
  }
  
  
  function addListProviders(text){
    const button = document.createElement('button');
    button.classList = 'list-group-item list-group-item-action';
    button.textContent = text;
    listProviders.appendChild(button);
  }
  
  
  function createContractRow(contract){
    const key = Math.floor(Date.now() * Math.random()).toString(36)
    const tableRow = document.createElement('tr');
    let providersString = ''
    
    contract.providers.forEach((provider, index) => {
      if (index === 0) providersString += provider
      else providersString += ', <br>' + provider
    })
  
    tableRow.id = `trow-${key}`
  
    tableRow.innerHTML = `
      <td>${contract.numContract}</td>
      <td>${contract.modality} Nº. ${contract.numModality}</td>
      <td>${contract.object}</td>
      <td>${providersString}</td>
      <td>${contract.validity}</td>
      <td>${contract.additive}</td>
      <td>${contract.start}</td>
      <td>${contract.months}</td>
      <td>
        <button data-id="trow-${key}" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#modal-edit-contract">
          <span data-id="trow-${key}" class="icon text-white-50">
              <i data-id="trow-${key}" class="fas fa-edit"></i>
          </span>
          <span data-id="trow-${key}" class="text">Editar</span>
        </button>
      </td>
    `
    return tableRow
  }
  
  
  function addContractsToTable(contracts){
    const fragment = new DocumentFragment();
  
    contracts.forEach((contract) => {
      fragment.appendChild(createContractRow(contract));
    });
  
    tbodyContracts.appendChild(fragment)
  }
  
  
  function addEventInEditButtons(){
    tbodyContracts.childNodes.forEach((node) => {
      if (node.nodeName !== '#text'){
        const lastTd = node.childNodes[node.childNodes.length-2];
        const button = lastTd.childNodes[1];
  
        button.addEventListener('click', (e) => {
          const identifier = e.target.getAttribute('data-id');
          const row = document.querySelector(`#${identifier}`);
          console.log(row)
        })
      }
    })
  }
  
  
  function selectionOfProviders(e){
    const date = new Date().getTime();
    const div = document.createElement('div');
    const { nodeName } = selectedProviders.childNodes[0];
  
    listProviders.removeChild(e.target);
  
    div.classList.add('btn', 'btn-primary', 'btn-icon-split');
  
    div.innerHTML = `
      <span class="text">${e.target.textContent}</span>
      <span data-id="${date}" id="remove-provider" class="remove-provider icon text-white-50">
        <i class="fas fa-times"></i>
      </span>
    `
  
    if (nodeName) {
      if(nodeName === '#text') selectedProviders.textContent = ''
    }
  
    selectedProviders.appendChild(div);
  
    const removeButton = div.querySelector(`[data-id="${date}"]`)
    removeButton.addEventListener('click', () => {
      const text = div.querySelector('.text').textContent;
      addListProviders(text);
  
      div.parentElement.removeChild(div);
  
      if (selectedProviders.childElementCount < 1) selectedProviders.textContent = 'Nenhum prestador selecionado' ;
    })
  }
  
  
  function addFormsInHtml(){
    const mainForm = document.querySelector('#create-contract-main-form');
    const modalForm = document.querySelector('#edit-contract-modal-form');
  
    mainForm.appendChild(createFormContract('contract-main'));
    modalForm.appendChild(createFormContract('contract-modal'));
  
    divSelectType = document.querySelectorAll('[data-id="select-type-service-contract"]');
    divSelectModality = document.querySelectorAll('[data-id="select-modality-contract"]');
  
    selectedProviders = document.querySelector('#provider-selected');
    listProviders = document.querySelector('#list-provider');
  
  }
  
  
  addFormsInHtml();
  addOptionsSelect(types, 'types');
  addOptionsSelect(modalities, 'modalities');
  addProviders(providers);
  addContractsToTable(listContracts);
  addEventInEditButtons();
  
  listProviders.addEventListener('click', (e) => selectionOfProviders(e));
  
  $(document).ready(function() {
      $('#dataTable').DataTable({
          "language": {
              "paginate": {
                "next": "Próxima",
                "previous": "Anterior"
              },
              "search": "Buscar",
              "info": "Mostrando de _START_ a _END_ de _TOTAL_ contratos",
              "lengthMenu": "Mostrar _MENU_ contratos",
            }
      });
  });
})()