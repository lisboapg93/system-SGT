# Sistema de Gestão de Tarefas

## Visão geral do projeto
O projeto tem o intuito de ser utilizado para gestão de tarefas, com criação, edição e deleção de itens criado pelo usuário e estas tarefas pode ser classificadas como concluidas pelo usuario que está utlizando.

## Principais desafios encontrados
Os desafios encontrados por mim durante sua contrução é o pouco conhecimento na liguagem PHP e em Docker, onde o manuseio do container foi onde levou mais tempo para ser concluído.

## Processo de desenvolvimento
O processo de desenvolvimento se deu por pesquisas e inúmeros teste para sua versão final.

### Roadmap
1 - Clone Repositório
```sh
git clone https://github.com/lisboapg93/system-SGT.git
```

2 - Subir os containers do projeto
```sh
docker-compose up -d
```

3 - Acessar o contêiner do Laravel
```sh
docker-compose exec laravel bash
```

4 - Fazer migrate para banco
```sh
php artisan migrate 
```

5 - Subir sistema
```sh
php artisan serve --host=0.0.0.0 --port=8000
```

6 - Acessar a página do projeto com a URL:
```sh
http://localhost:8000/home
```
