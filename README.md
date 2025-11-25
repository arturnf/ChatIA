
## 🤖 Chat com IA usando Laravel + OpenAI (GPT-4)

Este projeto demonstra como integrar Laravel à API da OpenAI, criando um sistema de chat totalmente funcional com respostas inteligentes e contextualizadas.
A aplicação permite que usuários enviem mensagens e recebam respostas geradas dinamicamente pelo modelo GPT-4, simulando conversas naturais com inteligência artificial.

![App Screenshot](https://arturferreira.com/imgs/imgsProjetos/chatia.png)

## 🚀 Visão Geral

O sistema foi construído para servir como base para:

- Chatbots inteligentes

- Automação de atendimento

- Assistentes virtuais personalizados

- Interfaces conversacionais de alta qualidade

- Laravel funciona como intermediário entre o cliente e a API da OpenAI, garantindo:

- Segurança das chaves e requisições

- Desempenho e controle total do fluxo

- Escalabilidade e facilidade de manutenção

O resultado é uma aplicação fluida, segura e ideal para estudos ou soluções profissionais baseadas em IA.

## 🛠️ Tecnologias Utilizadas

- Laravel 10

- PHP 8.2


## 📚 Funcionalidades Principais
### 💬 Chat com Inteligência Artificial

- Envio de mensagens do usuário

- Respostas automáticas utilizando o modelo GPT-4

- Mensagens em formato de conversa (contexto mantido)

- Suporte a prompts personalizado

## 🔐 Backend Seguro com Laravel

- Armazenamento seguro da OPENAI_API_KEY no .env

- Requisições feitas pelo HTTP Client do Laravel

- Sanitização e validação das entradas do usuário

# ⚙️ Como Rodar o Projeto

### 1. Clone o repositório

```bash
  git clone https://github.com/arturnf/ChatIA
  cd ChatIA
```

### 2. Instale as dependências do backend

```bash
  composer install
```

### 3. Configure o arquivo .env

```bash
  cp .env.example .env
```
Adicione sua chave da OpenAI no arquivo `.env`:
```bash
  OPENAI_API_KEY="sua-chave-aqui"
```

### 4. Gere a key da aplicação

```bash
  php artisan key:generate
```

### 5. Inicie o servidor

```bash
  php artisan serve
```

## Autor

- [@arturnf](https://www.github.com/arturnf)


