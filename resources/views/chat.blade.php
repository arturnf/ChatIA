<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('favicon.png') }}?v=13" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Artur Ferreira IA</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/chat.css') }}?v=2">
</head>

<body>
    <div class="container">
        <main>
            <div class="conversas">
                <div class="titulo">
                    <h3>Conversas</h3>
                </div>
                <div class="lista">
                    <div class="contato">
                        <div class="foto-contato">
                            <img src="{{ asset('imgs/perfil.PNG') }}" alt="">
                        </div>
                        <div class="box-contato">
                            <div class="nome-contato">
                                <h5>Artur Ferreira</h5>
                            </div>
                            <div class="menssagem-contato">
                                <p>Olá, como posso ajudá-lo?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat">
                <div class="header-chat">
                    <div class="foto-contato-chat">
                        <img src="{{ asset('imgs/perfil.PNG') }}" alt="">
                    </div>
                    <div class="box-contato-chat">
                        <div class="nome-contato-chat">
                            <h5>Artur Ferreira</h5>
                            <span title="Inteligência Artificial">IA</span>
                        </div>
                        <div class="online">
                            <p>Online</p>
                        </div>
                        <div class="digitando">
                            <p>Digitando...</p>
                        </div>
                    </div>
                </div>

                <div class="container-conversa-chat">

                    @php
                        $hasUserMessage = false;
                        $hasAssistantMessage = false;
                        foreach ($messages as $msg) {
                            if ($msg['role'] === 'user') {
                                $hasUserMessage = true;
                            }
                            if ($msg['role'] === 'assistant') {
                                $hasAssistantMessage = true;
                            }
                        }
                    @endphp
                    @if ($hasUserMessage || $hasAssistantMessage)
                        <div class="container-menssagem-chat">
                            <div class="chat-menssagem systema-content">
                                <div class="menssagem-content">
                                    <p>Olá, como posso ajudá-lo?</p>
                                </div>
                            </div>
                        </div>

                        @foreach ($messages as $msg)
                            @if ($msg['role'] === 'user')
                                <div class="container-menssagem-chat user-content-container">
                                    <div class="chat-menssagem user-content">
                                        <div class="menssagem-content">
                                            <p>{{ $msg['content'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @elseif($msg['role'] === 'assistant')
                                <div class="container-menssagem-chat">
                                    <div class="chat-menssagem systema-content">
                                        <div class="menssagem-content">
                                            <p>{{ $msg['content'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <div id="digitando-chat" class="container-menssagem-chat">
                        <div class="chat-menssagem systema-content">
                            <div class="menssagem-content">
                                <p class="digitando-p">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>




                <div class="container-input-chat">
                    <textarea id="chatInput" enterkeyhint="newline" placeholder="Digite sua mensagem..."></textarea>
                    <button id="send-btn"><i class="fa-regular fa-paper-plane"></i></button>
                </div>
            </div>
    </div>
    </main>
    </div>



    @if ($hasUserMessage == false)
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                mostrarBoasVindas();
            });

            async function mostrarBoasVindas() {
                const chatBox = document.querySelector(".container-conversa-chat");
                const typingChat = document.querySelector("#digitando-chat");
                const typing = document.querySelector(".digitando");
                const online = document.querySelector(".online");

                // Mostra o "digitando" e garante que fique no final
                online.style.display = "none";
                chatBox.appendChild(typingChat);
                typingChat.style.display = "block";
                typing.style.display = "block";

                // Simula o tempo de digitação do bot (1,5 segundos por exemplo)
                await new Promise(resolve => setTimeout(resolve, 1500));

                // Esconde o "digitando"
                typingChat.style.display = "none";
                typing.style.display = "none";
                online.style.display = "block";

                // Cria a mensagem de boas-vindas
                const container = document.createElement("div");
                container.className = "container-menssagem-chat";

                const chatMensagem = document.createElement("div");
                chatMensagem.className = "chat-menssagem systema-content";

                const mensagemContent = document.createElement("div");
                mensagemContent.className = "menssagem-content";

                const p = document.createElement("p");
                p.textContent = "Olá, como posso ajudá-lo?";

                // Montando a estrutura
                mensagemContent.appendChild(p);
                chatMensagem.appendChild(mensagemContent);
                container.appendChild(chatMensagem);

                // Adicionando no chatBox e scroll suave
                chatBox.appendChild(container);
                chatBox.scrollTo({
                    top: chatBox.scrollHeight,
                    behavior: "smooth"
                });
            }
        </script>
    @endif
    <script src="{{ asset('js/chat.js?v=2') }}"></script>
</body>

</html>
