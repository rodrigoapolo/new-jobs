function mascara_cpf()
{
    var cpf = document.getElementById('txCpfCan');
    if(cpf.value.length == 3 || cpf.value.length == 7)
    {
        cpf.value += ".";
    }else if(cpf.value.length == 11)
    {
        cpf.value +="-";
    }
}

function mascara_cnpj()
{
    var cnpj = document.getElementById('txCnpf');
    if(cnpj.value.length == 2 || cnpj.value.length == 6)
    {
        cnpj.value += ".";
    }else if(cnpj.value.length == 10)
    {
        cnpj.value +="/";
    }else if(cnpj.value.length == 15)
    {
        cnpj.value +="-";
    }
}

function mascara_telefone(fone)
{
    var telefone = fone;
    if(telefone.value.length == 0)
    {
        telefone.value += "(";
    }else if(telefone.value.length == 3)
    {
        telefone.value +=")";
    }else if(telefone.value.length == 9)
    {
        telefone.value +="-";
    }
}


function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    // document.getElementById('uf').value=("");
    // document.getElementById('ibge').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('rua').value=(conteudo.logradouro);
    document.getElementById('bairro').value=(conteudo.bairro);
    document.getElementById('cidade').value=(conteudo.localidade);
    // document.getElementById('uf').value=(conteudo.uf);
    // document.getElementById('ibge').value=(conteudo.ibge);
} //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value="...";
        document.getElementById('bairro').value="...";
        document.getElementById('cidade').value="...";
        // document.getElementById('uf').value="...";
        // document.getElementById('ibge').value="...";

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
};