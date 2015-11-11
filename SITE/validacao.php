<script>
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function cpf1(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d{2})$/,"$1-$2")
    return v
}

//valida telefone
function ValidaTelefone(tel){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(tel.value))
		document.getElementById("erros3").innerHTML = "Corrija seu telefone!"
else
		document.getElementById("erros3").innerHTML = "";
}

function ValidaSenha(senha2){
        senha1= document.getElementById('senha1').value;
	senha2= document.getElementById('senha2').value;
	if (senha2 != senha1)
                document.getElementById("erros4").innerHTML = "Suas senhas n?o s?o iguais!"
else
		document.getElementById("erros4").innerHTML = "";
}


function ValidaNome(nome){
	exp = /([A-Z]{1}[a-z]+){1}([ ]{1}[A-Z]{1}[a-z]+)+/
	 if(!exp.test(nome.value))
         	document.getElementById("erros1").innerHTML = "Seu nome parece inv?lido, tente novamente!"
else
		document.getElementById("erros1").innerHTML = "";
}

function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)        
        	document.getElementById("erros2").innerHTML = "C.P.F. Inv?lido";
	else
		document.getElementById("erros2").innerHTML = "";
	
}

function telefone(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2")
	v=v.replace(/(\d{4})(\d)/,"$1-$2")
    return v
}

function letras1(v){
     return v.replace(/\d/g,"")
}
</script>