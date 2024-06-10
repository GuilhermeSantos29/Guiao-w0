document.getElementById('purchaseForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let event_id = document.getElementById('event').value;
    let quantity = document.getElementById('quantity').value;
    let total = document.getElementById('total').value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'verificar_compra.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            let responseText = xhr.responseText.trim();
            if (responseText === 'Compra realizada com sucesso') {
                alert('Compra realizada com sucesso!');
                window.location.reload();
            } else {
                alert('Erro: ' + responseText);
            }
        } else {
            alert('Erro ao conectar com o servidor.');
        }
    };

    xhr.send('event=' + encodeURIComponent(event_id) + '&quantity=' + encodeURIComponent(quantity) + '&total=' + encodeURIComponent(total));
});
