# Desafio Leo Learning


Desenvolvedor: Franklim Araújo Paulino (franklim.ti@gmail.com)

O repóstóprio atual serve apenas para demonstração de capacidade técnica.
Muitas necessidades para um sistema real não foram levadas em conta devido ao tempo e ao esforço demandado,
uma vez que o desafio exigia o não uso de frameworks. Funcionalidades como:
# Segurança:
- Contra ataques XSS: Validações de Entrada de Formulario, Filtragem de inputs a serem salvo e escape de Saída de dados
- Contra ataques CSRF: Token randomico e unico de valiação de formulário, Sessão
- Contra Session Fixation: Gerenciador de Sessão com validação e regenerate de ID de sessão
- Gerenciador de Exceptions e Error: set_exception_handler() e set_erro_handler()
- Configuração no .INI que evitam include script por URL, inserção de ID de sessão por URL entre outros indispensáveis a segurança.
# Modulos
- A modulação do sistema foi "fracamente" baseada em frameworks recentes e sem muita implementação de Padrões de Design,
    a não ser o Singleton usado para PDO, Controller para gerenciamento de requisições, AbsctractModel para um gerenciador generico
de dados a ser extendido por todos as Entidades/Classe



## Front-End

- Composto HTML puro e CSS com Tailwind sem o uso de nenhuma linha de JavaScript


## Back-End

- Operado com PHP puro.

# Primeiro passo

- Fazer o clone do projeto para o ambiente local;
  - Pré-requisito: GIT e Docker
- Montar o projeto com : sudo docker-compose up --build
- Ao terminar, observar o Address IP oferecido pelo DOCKER na imagem php_1

# Banco de dados
- MySql
- Acessivel externamente por 
  - string: jdbc:mysql://0.0.0.0:3307/phprs ou;
  - host 0.0.0.0:3307
  - dbname phprs
  - user root
  - PW phprs
- Para o sistema rodar corretamente o script.sql, que está na pasta root da aplicação deve ser executada no banco ou em 
linha de comando ou por meio de um SGDB.