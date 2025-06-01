window.addEventListener('load', function() {
      const chatContainer = document.querySelector('.chat');
      if(chatContainer) {
        chatContainer.scrollTop = chatContainer.scrollHeight;
      }
    });