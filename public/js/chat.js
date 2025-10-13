const textarea = document.getElementById("chatInput");

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











async function sendApiIA() {
  const message = document.getElementById("chatInput").value;
  const chatBox = document.querySelector(".container-conversa-chat");
  const typing = document.querySelector(".digitando");
  const typingChat = document.querySelector("#digitando-chat");
  const online = document.querySelector(".online");

  // Mostra que está digitando
  online.style.display = "none"
  typing.style.display = "block";


  const containerUser = document.createElement("div");
  containerUser.className = "container-menssagem-chat user-content-container";

  const chatMensagemUser = document.createElement("div");
  chatMensagemUser.className = "chat-menssagem user-content";

  const mensagemContentUser = document.createElement("div");
  mensagemContentUser.className = "menssagem-content";

  const pUser = document.createElement("p");
  pUser.textContent = message; // aqui adiciona sua variável

  // Montando a estrutura
  mensagemContentUser.appendChild(pUser);
  chatMensagemUser.appendChild(mensagemContentUser);
  containerUser.appendChild(chatMensagemUser);

  // Adicionando no chatBox
  chatBox.appendChild(containerUser);
  chatBox.appendChild(typingChat);
  typingChat.style.display = "block";
  chatBox.scrollTo({
    top: chatBox.scrollHeight,
    behavior: "smooth"
  });

  textarea.value = "";

  textarea.disabled = true;
  document.getElementById("send-btn").disabled = true;





  // Envia para o backend Laravel
  const response = await fetch("/api/chat/send", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ message }),
  });

  // Recebe a resposta da API
  const data = await response.json();

  // Esconde o "digitando..."
  typing.style.display = "none";
  typingChat.style.display = "none";
  online.style.display = "block"

  mensagemIA = data.reply;

  // Criando os elementos
  const container = document.createElement("div");
  container.className = "container-menssagem-chat";

  const chatMensagem = document.createElement("div");
  chatMensagem.className = "chat-menssagem systema-content";

  const mensagemContent = document.createElement("div");
  mensagemContent.className = "menssagem-content";

  const p = document.createElement("p");
  p.textContent = mensagemIA; // aqui adiciona sua variável

  // Montando a estrutura
  mensagemContent.appendChild(p);
  chatMensagem.appendChild(mensagemContent);
  container.appendChild(chatMensagem);

  // Adicionando no chatBox
  chatBox.appendChild(container);
  chatBox.scrollTo({
    top: chatBox.scrollHeight,
    behavior: "smooth"
  });

  textarea.disabled = false;
  document.getElementById("send-btn").disabled = false;

}






textarea.addEventListener("input", () => {
  // Redefine a altura antes de recalcular
  textarea.style.height = "auto";
  // Ajusta conforme o conteúdo, limitado a 200px
  textarea.style.height = Math.min(textarea.scrollHeight, 200) + "px";
});

textarea.addEventListener("keydown", (e) => {
  // Shift + Enter = pular linha
  if ((e.key === "Enter" || e.key === "NumpadEnter") && e.shiftKey) {
    e.preventDefault();
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    textarea.value = textarea.value.substring(0, start) + "\n" + textarea.value.substring(end);
    textarea.selectionStart = textarea.selectionEnd = start + 1;
    textarea.dispatchEvent(new Event("input"));
  }

  // Enter sem Shift = enviar mensagem
  if ((e.key === "Enter" || e.key === "NumpadEnter") && !e.shiftKey) {

    if (window.innerWidth > 900) {
      e.preventDefault();
      sendApiIA();
      textarea.style.height = "auto";
    }
  }
});


document.getElementById("send-btn").addEventListener("click", sendApiIA);
