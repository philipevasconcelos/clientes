O projeto consiste em um sistema web de cadastro de clientes, onde um usuário administrador tem acesso as páginas principais de cadastro de clientes e uma lista de clientes. Esse usuário administrador pode navegar entre as telas do sistema, Clientes e Cadastro, além de ter permissão de excluir um cliente com todas as informações do sistema ou editar as suas informações. 
Para acessar o sistema o usuário deve entrar com as credenciais:
Usuário: admin 
Senha: admin
O usuário ao acessar o sistema, será direcionado para a página onde estão listados todos os clientes cadastrados até o momento. 
As informações apresentadas do cliente são:
Nome completo
Data de Nascimento
E-mail 
Cep 
Logradouro 
UF 
Bairro 
Cidade 
Complemento 

É possível visualizar na latendo onde apresenta as informações do cliente dois links, um de editar e excluir. Clicando em editar ao lado das respectivas informações do cliente, o usuário administrador será direcionado para uma tela onde é possível alterar uma única informação ou todas as informações sobre esse respectivo usuário. Em excluir o usuário deleta todas as informações que foram cadastradas daquele respectivo usuário.
Para realizar o cadastro do cliente o usuário deve clicar em uma opção chamada Cadastro, no canto superior da tela, onde será exibido uma tela com capôs a serem preenchidos. 
Ao preencher o campo CEP com um cep válido os campos de Logradouro, UF, Bairro e Cidade, serão preenchidos automaticamente. Caso o usuário digite um cep invalido o campo não será preenchido. Esse preenchimento automático ocorre através uma API ViaCEP implementada com JavaScript. 
Após realizar o cadastro do cliente o usuário e direcionado para a lista de clientes cadastrados.
Navegando nas opções na parte superior do sistema o usuário pode encerrar a seção clicando em Sair.
