# Projeto Relatório PROEX

Bom dia, Ivna. Coloquei o projeto no GitHub. Deixei algumas coisas que acho que poderemos utilizar

No diretório libs:
Contém as funções para realizar consultas no banco. Utilizamos as funções nas páginas ara exibir as informações. 

No diretório Pages:
Configurações Servidores e Vínculos - podemos utilizar para vincular um participante de um projeto a uma Unidade Acadêmica, Curso... Fiz um esboço no Banco de Dados com essas tabelas. Depois deem uma verificada se o relacionamento está ok.

Formulários Relatório - comecei a fazer os campos do formulário, mas não tive tempo para deixar melhor organizado.

As informações do relatório que precisamos colocar no sistema estão nesse link: https://docs.google.com/forms/d/e/1FAIpQLSc4CcP9KoqVjqMAyrlRmi4w3tjM0p7HBc1D894ktxw7OPi1WQ/viewform?usp=sharing

Criei uma branch dev para as versões que estamos implementando. Depois subimos para a main.

Adicionei você com o email da UFCA. As ferramentas que eu estava utilizando: VS Code, Mysql Workbench e o PHP 8.2.1

Desculpem a demora em compartilhar o projeto

Essas são as atividades:

Desenvolvimento da interface gráfica. A minha sugestão é Laravel, porque é baseada em PHP. Se quiser utilizar JavaScript pode ser o React.js ou Angular. Mas você pode escolher a tecnologia que tem mais conhecimento.

Criação do Banco de Dados usando o MySQL (Você também pode escolher o SGBD que tem mais afinidade). Será necessário criar tabelas para as permissões de acesso (eu comecei a fazer uma tabela que tem essas permissões, mas precisamos adequar para a nossa necessidade). Teremos diferentes níveis de acesso, por exemplo, a Chefe da CGA deve conseguir visualizar todos os relatórios, conseguir criar usuários. Como se fosse um administrador. Porque o relatório é vinculado a essa Coordenadoria. Precisamos implementar as operações básicas, como inserção, atualização e consulta. Além de armazenar as informações do relatório.

Desenvolvimento do backend. Pode ser PHP puro ou algum framework, como Laravel. A arquitetura do projeto segue o MVC. Temos, inclusive, essa divisão nos diretórios. Usamos o Composer (como gerenciador de dependências).  Precisamos implementar as regras de negócio, os fluxos por onde o relatório tramita (eu e Paola vamos fazer isso com a CGA e a pró-Reitora), validações e processamento de dados (Qualquer dúvida sobre os procedimentos pode me procurar ou Paola). A parte da segurança e da autenticação já está funcionando.

Temos que automatizar ao máximo o preenchimento dos campos. Se houver algum dado que o usuário já adicionou no nosso banco de dados, vamos tentar recuperar essa informação para evitar que ele preencha novamente e possa introduzir alguma inconsistência nos dados. Recursos como lista de opções, validações de campos, autocomplete. Ele pode ir confirmando ou editar, se houver algum erro nas informações carregadas do banco.

Para os usuários acessarem, estava utilizando o email institucional e a senha mudar123. Essa pode ser o padrão para todos os usuários no primeiro acesso. Com o login dorgival.netto@ufca.edu.br e a senha 123456 você consegue cadastrar os outros usuários.

Precisamos ver como conseguir os dados (nome, email, matrícula, tipo) de todos os servidores e estudantes da UFCA.

Depois nos preocupamos com os testes, integração, implantação, documentação... Essa demanada é urgente para a PROEX.
