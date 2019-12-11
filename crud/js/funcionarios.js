function validaFuncionario() {
    var nome = document.getElementById('nome');
    var salario = document.getElementById('salario');
    var sexo = document.getElementById('sexo');
    var id_departamento = document.getElementById('id_departamento');

    var erro = document.getElementById('erro');
    var msg = document.getElementById('msg-erro');

    erro.classList.add('hidden');
    msg.innerHTML = '';

    if (id_departamento.value == '00') {
        erro.classList.remove('hidden');
        msg.innerHTML = 'Preencha o departamento';
        id_departamento.focus();
        return false;
    }

    if (nome.value == '') {
        erro.classList.remove('hidden');
        msg.innerHTML = 'Preencha o nome';
        nome.focus();
        return false;
    }

    
    if (sexo.value == '00') {
        erro.classList.remove('hidden');
        msg.innerHTML = 'Preencha o sexo';
        sexo.focus();
        return false;
    }

    
    if (salario.value == '') {
        erro.classList.remove('hidden');
        msg.innerHTML = 'Preencha o salario';
        salario.focus();
        return false;
    }

    return true;
}