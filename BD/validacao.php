<?php
session_start();
include("cabecalho.php");

// Apenas aceita POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: cadastroUser.php');
    exit;
}

// Normaliza campos (tente pegar pelos nomes que você tem no formulário)
$nome       = trim($_POST['nome']    ?? $_POST['nome']    ?? '');
$cpf        = trim($_POST['cpf']     ?? $_POST['cpf']     ?? '');
$telefone   = trim($_POST['telefone'] ?? $_POST['phone'] ?? '');
$email      = trim($_POST['email']   ?? $_POST['email'] ?? '');
$login_in   = trim($_POST['login']    ?? $_POST['email'] ?? ''); // usado no login
$senha      = $_POST['senha'] ?? '';

// Detecta modo: se há campos do cadastro -> modo cadastro; caso contrário -> login
$is_register = !empty($nome) || !empty($cpf) ||

// Lista de usuários (exemplo). Em produção use banco.
$users = [
    [
        'login'    => 'cliente',
        'email'    => 'cliente@gmail.com',
        'password' => 'cliente@123@',
        'nome'     => 'Cliente Exemplo',
        'role'     => 'cliente'
    ],
];

// Função utilitária
function find_user($loginOrEmail, $users) {
    foreach ($users as $u) {
        if ($loginOrEmail === $u['login'] || $loginOrEmail === $u['email']) {
            return $u;
        }
    }
    return null;
}

// Validações
$errors = [];

// Validações comuns ao cadastro
if ($is_register) {
    // Nome
    if ($nome === '') {
        $errors[] = "O campo Nome é obrigatório.";
    } elseif (strlen($nome) < 2) {
        $errors[] = "Nome muito curto.";
    }

    // CPF — aceita formatos: 000.000.000-00 ou apenas dígitos (11)
   /* $cpfClean = preg_replace('/\D/', '', $cpf);
    if ($cpfClean === '') {
        $errors[] = "O CPF é obrigatório.";
    } elseif (!preg_match('/^\d{11}$/', $cpfClean)) {
        $errors[] = "CPF inválido. Deve conter 11 dígitos (ex: 000.000.000-00).";
    }

    // Data de nascimento (YYYY-MM-DD)
    if ($nascimento === '') {
        $errors[] = "A data de nascimento é obrigatória.";
    } else {
        $ts = strtotime($nascimento);
        if ($ts === false) {
            $errors[] = "Data de nascimento inválida.";
        } else {
            $year = (int)date('Y', $ts);
            $currentYear = (int)date('Y');
            if ($year < 1900 || $year > $currentYear) {
                $errors[] = "Ano de nascimento fora do intervalo esperado.";
            }
        }
    }

    // Endereço
    if ($endereco === '') {
        $errors[] = "O endereço é obrigatório.";
    }

    // Telefone (validação simples)
    $telClean = preg_replace('/\D/', '', $telefone);
    if ($telefone === '') {
        $errors[] = "O telefone é obrigatório.";
    } elseif (!preg_match('/^\d{10,11}$/', $telClean)) {
        $errors[] = "Telefone inválido. Use DDD + número (10 ou 11 dígitos).";
    }
    
    // Email
    if ($email === '') {
        $errors[] = "O e-mail é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "E-mail inválido.";
    }

    // Senha: verificação mínima (tamanho + conteúdo)
    if ($senha === '') {
        $errors[] = "A senha é obrigatória.";
    } elseif (strlen($senha) < 8) {
        $errors[] = "A senha deve ter pelo menos 8 caracteres.";
    } elseif (!preg_match('/[A-Za-z]/', $senha) || !preg_match('/\d/', $senha)) {
        $errors[] = "A senha deve conter letras e números.";
    }

    // Se houver erros, mostra e sai
    if (!empty($errors)) {
        echo "<h2 style='color:red;'>Foram encontrados os seguintes erros:</h2><ul style='color:red;'>";
        foreach ($errors as $err) {
            echo "<li>" . htmlspecialchars($err) . "</li>";
        }
        echo "</ul>";
        echo "<p><a href='cadastroUser.php'>Voltar para o formulário</a></p>";
        include("rodape.php");
        exit;
    }

    // Aqui tudo válido: em produção você deveria:
    // - verificar se email/cpf já existem no banco
    // - salvar usuário com password_hash()
    // - enviar confirmação por email, etc.
    // Grava na sessão e redireciona para página principal
    $_SESSION['login'] = $login_in !== '' ? $login_in : strtolower(strtok($email, '@')); // exemplo de login
    $_SESSION['email'] = $email;
    $_SESSION['nome']  = $nome;
   

    // OBS: em produção, NÃO guarde a senha em texto puro na sessão.
    // Use password_hash() ao salvar e NÃO salve a senha na sessão.
    $_SESSION['senha'] = $senha;

    echo "<h2 style='color:green;'>Cadastro realizado com sucesso! Redirecionando...</h2>";
    echo "<p><a href='principal.php'>Ir para a página principal</a></p>";
    header("Refresh:2; url=principal.php");
    exit;
}

// ------------------- MODO LOGIN -------------------
if (!$is_register) {
    // Valida login e senha
    $loginForCheck = $login_in;
    if ($loginForCheck === '') {
        $errors[] = "Informe o login ou email.";
    }
    if ($senha === '') {
        $errors[] = "Informe a senha.";
    }

    if (!empty($errors)) {
        echo "<h2 style='color:red;'>Foram encontrados os seguintes erros:</h2><ul style='color:red;'>";
        foreach ($errors as $err) {
            echo "<li>" . htmlspecialchars($err) . "</li>";
        }
        echo "</ul>";
        echo "<p><a href='cadastro.php'>Voltar para o formulário</a></p>";
        include("rodape.php");
        exit;
    }

    // procura usuário
    $user = find_user($loginForCheck, $users);
    if (!$user) {
        echo "<h2 style='color:red;'>Login inválido.</h2>";
        echo "<p><a href='cadastroUser.php'>Voltar</a></p>";
        include("rodape.php");
        exit;
    }

    // compara senha (texto aqui) — em produção password_verify()
    if ($senha !== $user['password']) {
        echo "<h2 style='color:red;'>Senha incorreta.</h2>";
        echo "<p><a href='cadastro.php'>Voltar</a></p>";
        include("rodape.php");
        exit;
    }

    // Sucesso: grava sessão com dados do usuário
    $_SESSION['login'] = $user['login'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['nome']  = $user['nome'];

    header("Location: principal.php");
    exit;
}

include("rodape.php");
