<?
$cpf = $_POST[cpf];
//Pega o CPF via post

if($cpf <> '') { 
	validarCPF($cpf);
}
//verifica se o CPF foi enviado. Se foi ele executa a função validarCPF


function validarCPF($cpf) { 

	$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
	if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
		echo 1;
		return 1;
		//retorna 1 (erro) se as sequencias acima forem informadas como CPF
		
	} else { // Calcula os números para verificar se o CPF é verdadeiro
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				echo 1;
				return 1;
				//Em caso de erro retorna 1, informando que o CPF é inválido.
			}
		}
		echo 0;
		return 0;
		// Retorna 0 quando o CPF é válido. 
		//OBS: Vale ressaltar que esse validador valida apenas o cálculo dos dígitos informados e não a existencia de uma pessoa ligada a esse CPF. Existem diversos sites que geram CPFs para testes que não estão ligados a pessoas físicas.
	}
}

?>