<?php
session_start();
ob_start(); // evita "headers already sent" caso cabecalho imprima algo
include("../PHP/header.php");

// só aceita POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: cadastro.php');
    exit;
}

// --------------------
// Deteção do tipo
// --------------------
// Preferência: campo hidden 'tipo' se existir (recomendado).
// Caso não exista, inferimos a partir dos campos enviados:
// - se houver 'cnpj' -> clinica
// - se houver 'cpf' ou 'nascimento' -> usuario
// - caso contrário, trata como tentativa de login
$tipo = trim($_POST['tipo'] ?? '');

if ($tipo === '') {
    if (!empty($_POST['cnpj'])) $tipo = 'clinica';
    elseif (!empty($_POST['cpf']) || !empty($_POST['nascimento'])) $tipo = 'usuario';
    else $tipo = ''; // login / indefinido
}

// --------------------
// Normaliza variáveis segundo os names do seu form
// (os names do seu HTML: nome, cpf, nascimento, endereco, telefone, email, senha, senha_confirm)
// Para clinica existe cnpj; ambos usam 'nome','endereco','telefone','email','senha','senha_confirm'
// --------------------
$errors = [];

if ($tipo === 'usuario') {
    $nome       = trim($_POST['nome'] ?? '');
    $cpf        = trim($_POST['cpf'] ?? '');
    $nascimento = trim($_POST['nascimento'] ?? '');
    $endereco   = trim($_POST['endereco'] ?? '');
    $telefone   = trim($_POST['telefone'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $senha      = $_POST['senha'] ?? '';
    $senha_conf = $_POST['senha_confirm'] ?? '';
} elseif ($tipo === 'clinica') {
    // Repare: no seu HTML a clínica também usa name="nome" para o nome da clínica
    $nome       = trim($_POST['nome'] ?? '');
    $cnpj       = trim($_POST['cnpj'] ?? '');
    $endereco   = trim($_POST['endereco'] ?? '');
    $telefone   = trim($_POST['telefone'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $senha      = $_POST['senha'] ?? '';
    $senha_conf = $_POST['senha_confirm'] ?? '';
} else {
    // modo login (quando não vier dados de cadastro)
    $login_in = trim($_POST['login'] ?? $_POST['email'] ?? '');
    $senha    = $_POST['senha'] ?? '';
}

// --------------------
// Validações
// --------------------
if ($tipo === 'usuario' || $tipo === 'clinica') {
    // Nome
    if ($nome === '') $errors[] = "O campo Nome é obrigatório.";

    // CPF ou CNPJ
    if ($tipo === 'usuario') {
        $cpfClean = preg_replace('/\D/', '', $cpf);
        if ($cpfClean === '') $errors[] = "O CPF é obrigatório.";
        elseif (!preg_match('/^\d{11}$/', $cpfClean)) $errors[] = "CPF inválido (11 dígitos).";
    } else { // clinica -> CNPJ
        $cnpjClean = preg_replace('/\D/', '', $cnpj);
        if ($cnpjClean === '') $errors[] = "O CNPJ é obrigatório.";
        elseif (!preg_match('/^\d{14}$/', $cnpjClean)) $errors[] = "CNPJ inválido (14 dígitos).";
    }

    // Nascimento (aplica apenas para usuário)
    if ($tipo === 'usuario') {
        if ($nascimento === '') $errors[] = "A data de nascimento é obrigatória.";
        else {
            $ts = strtotime($nascimento);
            if ($ts === false) $errors[] = "Data de nascimento inválida.";
            else {
                $year = (int)date('Y', $ts);
                $currentYear = (int)date('Y');
                if ($year < 1900 || $year > $currentYear) $errors[] = "Ano de nascimento fora do intervalo esperado.";
            }
        }
    }

    // Endereço
    if ($endereco === '') $errors[] = "O endereço é obrigatório.";

    // Telefone simples (10 ou 11 dígitos)
    $telClean = preg_replace('/\D/', '', $telefone);
    if ($telefone === '') $errors[] = "O telefone é obrigatório.";
    elseif (!preg_match('/^\d{10,11}$/', $telClean)) $errors[] = "Telefone inválido. Use DDD + número (10 ou 11 dígitos).";

    // Email
    if ($email === '') $errors[] = "O e-mail é obrigatório.";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "E-mail inválido.";

    // Senha
    if ($senha === '') $errors[] = "A senha é obrigatória.";
    elseif (strlen($senha) < 8) $errors[] = "A senha deve ter pelo menos 8 caracteres.";
    elseif (!preg_match('/[A-Za-z]/', $senha) || !preg_match('/\d/', $senha)) $errors[] = "A senha deve conter letras e números.";

    if ($senha !== $senha_conf) $errors[] = "As senhas não coincidem.";

    // Se houver erros, guarda e redireciona para o form (recomendo exibir os campos preenchidos)
    if (!empty($errors)) {
        $_SESSION['flash_errors'] = $errors;
        // opcional: repopular campos via sessão para facilitar correção no form
        $_SESSION['old'] = $_POST;
        header('Location: cadastro.php');
        exit;
    }

    // --------------------
    // Cadastro válido - aqui você salvaria no banco (ex.: PDO)
    // Exemplo: hash da senha e criação de sessão
    // --------------------
    $hashed = password_hash($senha, PASSWORD_DEFAULT);

    // exemplo de "salvamento" em sessão (apenas para demo)
    $_SESSION['user'] = [
        'nome' => $nome,
        'email'=> $email,
        'role' => ($tipo === 'usuario' ? 'cliente' : 'clinica')
        // NÃO salve senha em texto
    ];

    $_SESSION['flash_success'] = "Cadastro realizado com sucesso!";
    header('Location: cadastro.php');
    exit;
}

// --------------------
// MODO LOGIN
// --------------------
$login_in = trim($_POST['login'] ?? $_POST['email'] ?? '');
if (empty($tipo)) {
    $errors = [];
    if ($login_in === '') $errors[] = "Informe o login ou e-mail.";
    if ($senha === '')       $errors[] = "Informe a senha.";

    if (!empty($errors)) {
        $_SESSION['flash_errors'] = $errors;
        header('Location: cadastro.php');
        exit;
    }

    // Exemplo de verificação (em produção use banco e password_verify)
    // Aqui assumimos lista estática ou função find_user()
    // Para simplificar: sucesso demo
    $_SESSION['login'] = $login_in;
    $_SESSION['flash_success'] = "Login efetuado com sucesso (demo).";
    header('Location: principal.php');
    exit;
}

include("../PHP/footer.php");
ob_end_flush();
