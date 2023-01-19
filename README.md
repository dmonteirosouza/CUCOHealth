# CUCOHealth

Este projeto utiliza o Docker Compose para gerenciar suas dependências e configurações de ambiente. Para executar o projeto, siga os seguintes passos:

Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.

Faça o clone do repositório do projeto para sua máquina local.

Navegue até o diretório raiz do projeto no terminal.

Execute o comando `docker-compose up -d` para iniciar os containers do projeto. Este comando pode demorar um pouco na primeira vez que é executado, pois o Docker precisa baixar as imagens necessárias.

Para parar os containers, execute o comando `docker-compose down`.

*Observação*: O projeto também inclui um arquivo de collection do Postman, chamado `CUCOHealth.postman_collection.json`, que pode ser usado para testar as rotas da aplicação. Para importá-lo no Postman, basta clicar em "Import" e selecionar o arquivo.

*Observação 2*: O projeto foi criado sem considerar autenticação e controle de acesso, então todas as rotas estarão disponíveis sem necessidade de autenticação. Certifique-se de adicionar as devidas proteções de segurança antes de usar em produção.


