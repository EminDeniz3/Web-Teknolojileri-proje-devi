document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const clearBtn = document.getElementById('clearBtn');
    const formMessage = document.getElementById('formMessage');
  
    submitBtn.addEventListener('click', function(event) {
      // Form verilerini al
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const message = document.getElementById('message').value;
  
      // Basit doğrulama
      if (!name || !email || !message) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
      }
  
      // E-posta formatı kontrolü
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert('Geçerli bir e-posta adresi giriniz.');
        return;
      }
  
      // Başarı mesajını göster
      formMessage.style.display = 'block';
  
      // 2 saniye bekle ve sonra başka bir sayfaya yönlendir
      setTimeout(() => {
        // Form verilerini localStorage'a kaydet
        const formData = {
          name: name,
          email: email,
          message: message
        };
  
        // Daha önce kaydedilmiş form verilerini al
        let allMessages = JSON.parse(localStorage.getItem('allMessages')) || [];
        allMessages.push(formData);
        localStorage.setItem('allMessages', JSON.stringify(allMessages));
  
        // Başka bir sayfaya yönlendirme
        window.location.href = 'tesekkurler.html'; // Yönlendirilmek istenen sayfanın URL'si
      }, 2000); // 2000 milisaniye = 2 saniye
    });
  
    clearBtn.addEventListener('click', function() {
      // Form alanlarını temizle
      document.getElementById('name').value = '';
      document.getElementById('email').value = '';
      document.getElementById('message').value = '';
    });
  });
  