<?php

    function upload($flefoto){


		// Variáveis que recebem a URL e o caminho local
		$path_url = "http://".$_SERVER['HTTP_HOST']."/web";
		$path_local = $_SERVER['DOCUMENT_ROOT']."/web";

		$arquivo = $flefoto['name'];
		$tamanho_arquivo = $flefoto['size'];
		$tamanho_arquivo = round($tamanho_arquivo/1024);

		$ext_arquivo = strrchr($arquivo, ".");
		$nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
		$nome_arquivo = md5(uniqid(time()).$nome_arquivo);

		$diretorio_arquivo = "$path_local/cms/view/img/temp/";


		$arquivos_permitidos = array(".jpg", ".png", ".jpeg", ".mp4");
		if(in_array($ext_arquivo, $arquivos_permitidos)){
			if($tamanho_arquivo<=7000){

				$arquivo_tmp = $flefoto['tmp_name'];
				$imagem = $diretorio_arquivo . $nome_arquivo . $ext_arquivo;
				$imagem22 = $nome_arquivo . $ext_arquivo;

				if(move_uploaded_file($arquivo_tmp, $imagem)){
					return $imagem22;
				}
			}
		}

  }
?>
