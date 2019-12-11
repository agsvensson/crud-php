function validaDepto () {
    var sigla = document.getElementById('sigla');
    var nome = document.getElementById('nome');
    var erro = document.getElementById('erro');
    var msg = document.getElementById('msg-erro');

    erro.classList.add('hidden');
    msg.innerHTML = '';

    if (sigla.value == '') {
        erro.classList.remove('hidden');
        msg.innerHTML = 'Preencha a sigla';
        sigla.focus();
        return false;
    }

    if (nome.value == '') {
        erro.classList.remove('hidden');
        msg.innerHTML = 'Preencha o nome';
        nome.focus();
        return false;
    }

    return true;
}