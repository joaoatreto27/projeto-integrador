/// Mascara input cnpj
function mascaraCnpj(cnpj) {
    cnpj = cnpj.replace(/\D/g, ''); 
    cnpj = cnpj.replace(/^(\d{2})(\d)/, '$1.$2'); 
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3'); 
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, '.$1/$2'); 
    cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2'); 
    return cnpj;
}


//Mascara input telefone
function mascaraTelefone(telefone) {
    telefone = telefone.replace(/\D/g, ''); 
    telefone = telefone.replace(/^(\d{2})(\d)/g, '($1) $2'); 
    telefone = telefone.replace(/(\d{5})(\d)/, '$1-$2'); 
    return telefone;
}

//Mascara inptu cep
function mascaraCep(cep) {
    cep = cep.replace(/\D/g, ''); 
    cep = cep.replace(/^(\d{5})(\d)/, '$1-$2'); 
    return cep;
}

//Mascara input cpf
function mascaraCPF(cpf) {
    cpf = cpf.replace(/\D/g, '');
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4'); 
    return cpf;
}

  

  