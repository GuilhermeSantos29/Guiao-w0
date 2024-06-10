document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let errorMessage = document.getElementById('error-message');

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'verificar_register.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            let responseText = xhr.responseText.trim();
            if (responseText.includes('Nova conta criada com sucesso')) {
                window.location.href = 'login.html';
            } else {
                errorMessage.textContent = responseText;
            }
        } else {
            errorMessage.textContent = 'Erro ao conectar com o servidor.';
        }
    };

    xhr.send('name=' + encodeURIComponent(name) + '&email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
});

