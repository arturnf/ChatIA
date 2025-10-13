<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artur Ferreira IA</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
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
                            <img src="{{ asset('imgs/perfil.JPEG') }}" alt="">
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
                        <img src="{{ asset('imgs/perfil.JPEG') }}" alt="">
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

    <script src="{{ asset('js/chat.js') }}"></script>
</body>

</html>