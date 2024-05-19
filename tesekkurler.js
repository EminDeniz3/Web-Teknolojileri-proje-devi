document.addEventListener('DOMContentLoaded', () => {
    const messagesDiv = document.getElementById('messages');
    const allMessages = JSON.parse(localStorage.getItem('allMessages')) || [];
  
    if (allMessages.length === 0) {
      messagesDiv.innerHTML = '<p>Henüz gönderilen bir mesaj yok.</p>';
    } else {
      allMessages.forEach((message, index) => {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message');
  
        messageElement.innerHTML = `
          <h4>Mesaj ${index + 1}</h4>
          <p><strong>Ad:</strong> ${message.name}</p>
          <p><strong>E-posta:</strong> ${message.email}</p>
          <p><strong>Mesaj:</strong> ${message.message}</p>
          <hr>
        `;
  
        messagesDiv.appendChild(messageElement);
      });
    }
  });
  