# Teste Vitafor - Rick and Morty

Projeto desenvolvido em PHP utilizando a API do Rick and Morty.

---

## Funcionalidades

- Login e cadastro
- Listagem de personagens
- Visualizar detalhes
- Salvar personagens favoritos
- Excluir personagens

---

## Tecnologias

- PHP
- SQLite
- Bootstrap 5
- JavaScript

---

## Requisitos

Antes de rodar o projeto, é necessário ter instalado:

- XAMPP
- PHP 8+
- Apache habilitado
- Git

---
## Configuração do SQLite

O SQLite normalmente já vem habilitado no XAMPP.

Caso ocorra erro ao iniciar o projeto, verifique no arquivo:

```text
xampp/php/php.ini
```

se as extensões abaixo estão habilitadas:

```ini
extension=pdo_sqlite
extension=sqlite3
```

Após habilitar, reinicie o Apache.

O projeto utiliza SQLite como banco de dados local.

O SQLite funciona através do arquivo:

```text
database.sqlite
```

---

## Como rodar o projeto

### 1. Clone o repositório

```bash
git clone https://github.com/chriisti4n/rickandmorty.git
```

---

### 2. Coloque o projeto no htdocs

```text
C:\xampp\htdocs\RickandMorty
```

---

### 3. Inicie o Apache

Abra o XAMPP e inicie o Apache.

---

### 4. Acesse o projeto

```text
http://localhost/RickandMorty
```

---

## Aplicação

### Home

- Exibir personagens da API Rick and Morty
- Pesquisa de personagens
- Visualização rápida dos cards
- Acesso aos detalhes dos personagens

  <img width="1920" height="1080" alt="{D3481F5F-3C71-474C-99E7-18C398E23286}" src="https://github.com/user-attachments/assets/178bc42f-3e3b-4213-9b46-1088f999683b" />

---

### Detalhes

- Exibir informações completas
- Mostrar imagem ampliada
- Salvar personagem

<img width="1920" height="1080" alt="{83A3AFA9-E267-4E01-B305-29B7FAD23DDA}" src="https://github.com/user-attachments/assets/38e49cc5-28e4-4b23-aef9-e5f4f44b08a4" />

---

### Personagens

- Exibir personagens salvos pelo usuário
- Listar favoritos em cards
- Acesso aos detalhes dos personagens
- Excluir personagem salvo

<img width="1920" height="1080" alt="{F9CBC72E-2F27-4743-B388-14D53BB38C12}" src="https://github.com/user-attachments/assets/b371d294-12f9-4ef8-9967-200856e09875" />

---

### Login

- Realizar login no sistema
- Validar usuário e senha
- Criar sessão do usuário

<img width="1920" height="1080" alt="{E3994B21-CAB4-4CD6-A5C7-3393A258DCB5}" src="https://github.com/user-attachments/assets/87375020-8b26-4fab-9e0a-cd6a803402bb" />

---

### Cadastro

- Cadastro de novos usuários
- Armazenamento no banco SQLite
- Validação de informações básicas

<img width="1920" height="1080" alt="{DAA06DC3-8DBB-4D1D-9B61-4C003DEAC63C}" src="https://github.com/user-attachments/assets/111b773c-de7a-4280-a673-e543398dfbda" />

---

### Sobre

- Exibir informações do desenvolvedor
- Mostrar tecnologias utilizadas
- Disponibilizar links profissionais

<img width="1920" height="1080" alt="{2C756D2A-DAF5-44F8-9D8E-C756343712CA}" src="https://github.com/user-attachments/assets/9aef9732-0725-43c8-a1b1-6317e9d5c62d" />

---

## Desenvolvedor

Fábio Oliveira

GitHub:  
https://github.com/chriisti4n

LinkedIn:  
https://www.linkedin.com/in/fábio-oliveira-852553245/
