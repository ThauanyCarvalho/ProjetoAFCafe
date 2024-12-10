<?php

if(filter_has_var(INPUT_POST,"salvar")) {
    #Diretório onde vamos salvar as imagens
    $diretorio = "imagensAlunos/";

    #Verificando se o diretório existe
    if(!is_dir($diretorio)){
        die("O diretório '$diretorio' não existe");
    }

    #Verificando se o arquivo foi enviado
    if(isset($_FILES["foto"])){
        $arquivo = $_FILES["foto"];

        #verifica se houve erro no upload do arquivo
        if($arquivo['error']!== UPLOAD_ERR_OK){
            die("Erro ao fazer upload da imagem. Código do erro: ".$arquivo['error']);
        }
        #Pegar a extensão do arquivo
        $extensao = strtolower(pathinfo(basename($arquivo['name']), PATHINFO_EXTENSION));
        #Gera o nome unico do arquivo
        $nomeArquivo = uniqid().'.'.$extensao;
        $caminhoArquivo = $diretorio . $nomeArquivo;
        #Move o arquivo para o diretório especificado
        if(!move_uploaded_file($arquivo['tmp_name'],$caminhoArquivo)){
            die('Erro ao mover o arquivo');
        }
    }else{
        die("Nenhum arquivo foi enviado");
    }#Fim de Upload da Imagem

    spl_autoload_register(function($class){
        require_once("Classes/{$class}.class.php");
    });

    $aluno = new Aluno;
    $aluno->setNome(filter_input(INPUT_POST, 'nome'));
    $aluno->setEmail(filter_input(INPUT_POST, 'email'));
    $aluno->setCelular(filter_input(INPUT_POST, 'celular'));
    $aluno->setEstadoCivil(filter_input(INPUT_POST, 'estadoCivil'));
    $aluno->setStatus(filter_input(INPUT_POST, 'status'));
    $aluno->setFoto($nomeArquivo);

    $aluno->add() ;


}
