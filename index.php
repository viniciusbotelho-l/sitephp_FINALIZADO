<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background-color: orange;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: white;
        }

        .login-container {
            width: 400px;
            margin: 30px auto;
            background-color: rgb(60, 97, 219);
            border: 2px solid black;
            border-radius: 10px;
            padding: 30px;
            color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }

        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: white;
            color: rgb(60, 97, 219);
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            background-color: #f0f0f0;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: white;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <h1>Seja bem-vindo</h1>


<div class="login-container">
    <form action="login.php" method="post" autocomplete="off" onsubmit="return validarFormulario()">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <input type="submit" value="Entrar">
    </form>
</div>

<!-- Coloque o script AQUI ou no final do body -->
<script>
function validarFormulario() {
    const cpf = document.getElementById("cpf").value.replace(/\D/g, "");
    const senha = document.getElementById("senha").value;

    if (!/^\d{11}$/.test(cpf) || /^(\d)\1+$/.test(cpf) || !validarCPF(cpf)) {
        alert("CPF inválido!");
        return false;
    }

    const regexSenha = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{6,}$/;
    if (!regexSenha.test(senha)) {
        alert("Senha inválida! Deve ter ao menos 6 caracteres com: \n- 1 maiúscula\n- 1 minúscula\n- 1 número\n- 1 especial");
        return false;
    }

    return true;
}

function validarCPF(cpf) {
    let soma = 0, resto;
    for (let i = 1; i <= 9; i++) 
        soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) return false;

    soma = 0;
    for (let i = 1; i <= 10; i++) 
        soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    return resto === parseInt(cpf.substring(10, 11));
}
</script>

    <footer>
        &copy; 2025 Projeto Login PHP. Todos os direitos reservados.
    </footer>

</body>
</html>