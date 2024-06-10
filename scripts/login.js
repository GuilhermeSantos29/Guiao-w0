document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let errorMessage = document.getElementById('error-message');
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'verificar_login.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            let responseText = xhr.responseText.trim();
            if (responseText === '') {
                window.location.href = 'index1.php';
            } else {
                errorMessage.textContent = responseText;
            }
        } else {
            errorMessage.textContent = 'Erro ao conectar com o servidor.';
        }
    };

    xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
});

