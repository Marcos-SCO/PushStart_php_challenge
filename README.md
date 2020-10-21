# PushStart_php_challenge
PushStart Php Rest api challenge 

### <p id='about'>📑 Sobre</p>

Projeto de api rest realizado como teste na Push Start.

<br/>

### <p id='tecnology'>🖥 Tecnologias</p>

<ul>
  <li>PHP</li>
  <li>MySql</li>
  <li>Composer</li>
</ul>


### <p id='dependencies'>📋 Dependências</p>

<ul>
  <li>"vlucas/phpdotenv": "^5.2"</li>
  <li>"coffeecode/router": "^1.0"</li>
</ul>


### <p id='install'>🔥 Como instalar</p>

#### Baixe ou Clone.

```shell
$ git clone https://github.com/Marcos-SCO/PushStart_php_challenge
```

<br/>

#### Instale as dependências.

```shell
$ composer install
```

<br>

Para rodar o projeto será necessário ter o MySql e Composer instalados.

- Com o MySql crie um banco de dados como o nome: db_api_pushstart

- No diretório db, pegue a dump salvo e insira no seu banco de dados

- Vá até src/, copie o arquivo “.env.example”, renomeie para “.env” e insira suas variáveis de desenvolvimento.

Para fazer o teste das endpoints utilize um api client como o Postman.

<br/>


### Endpoints da api:
    
- Login: 
url: {{BASE}}/login  
Método: POST

        Exemplo de requisição:
        {
            “first_name”: “username”, 
            “last_name”: “userlastname” 
        }

<br>

- Exibir informações com um id: 
url: {{BASE}}/usuario/{id}  
Método: GET

<br>

- Atualizar informações: 
url: {{BASE}}/usuario  
Método: PUT

        Exemplo de requisição:
        {
            "first_name : “first_name”,
            "last_name" : “last_name”,
            "password" :“password”,
            "email" : ”email” 
        }

<br>

- Atualizar imagem: 
url: {{BASE}}/usuario  
Método: POST

<br>

    Utilize form-data com key e value
    Exemplo de requisição:

            Id_user : 1,
            Img_path : imagem selecionada  

<br>

- Sair da sessão
url: {{BASE}}/usuario  
Método: DELETE

Exemplo de requisição:
        {
            "email" : ”email” 
        }

<br>

- Pegar todos registros:
url: {{BASE}}/usuarios  
Método: GET

<br>

- Criar registro: 
url: {{BASE}}/usuário/criar  
Método: POST

    Utilize form-data com key e value
    Exemplo de requisição:
        
            first_name : first_name,
            last_name : last_name,
            password : password,
            email : email 
            Img_path : imagem selecionada  

<br>

- Deletar usuário
url: {{BASE}}/usuário/deletar  
Método: DELETE

Exemplo de requisição:
{
    "email" : ”email” 
}
