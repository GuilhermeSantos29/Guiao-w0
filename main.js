document.addEventListener('DOMContentLoaded', function() {
  if (document.getElementById('loginForm')) {
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      alert('Login efetuado com sucesso!');
    });
  }

  if (document.getElementById('registerForm')) {
    document.getElementById('registerForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      alert('Registro efetuado com sucesso!');
    });
  }

  if (document.getElementById('purchaseForm')) {
    document.getElementById('purchaseForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const eventSelection = document.getElementById('event').value;
      const quantity = document.getElementById('quantity').value;
      alert(`Bilhetes para ${eventSelection} comprados com sucesso! Quantidade: ${quantity}`);
    });
  }
});

