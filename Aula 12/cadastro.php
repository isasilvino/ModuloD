<?php
session_start();
if (isset($_SESSION['mensagem'])) {
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cadastro</title>
</head>
<!-- estilização do backgoung e do card onde ficam os inputs de cadastro-->

<body class="bg-gradient-to-br from-lime-200  to-amber-100 flex justify-center items-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800">Crie sua conta</h2>
        <p class="text-sm text-gray-500 text-center mb-6">Entre para compartilhar seus projetos criativos</p>

        <!-- utilizando action pra utilizar as condições e algoritmos de acoes.php, e method para utilizar metodo global $_POST e seus armazenamentos (names) -->
        <form action="acoes.php" method="post" class="space-y-4">
            <div>
                <!-- area de label e input que o user insere o seu @ de usuario -->
                <label class="block text-gray-700">Usuário</label>
                <!--input esta utilizando o name 'nome' que o POST vai armazenar, o id esta sendo utilizado com a finalidade de ser chamado para a função da obrigatoriedade de @ no nome -->
                <!-- value eh utilizado para o nome ficar armazenado em dados formulario do session, caso algo de errado na sessao de cadastro e a tela recarregue, os dados permanecem preenchidos -->
                <input type="text" name="nome" id="username" placeholder="@usuario" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none"
                    value="<?php echo isset($_SESSION['dados_formulario']['nome']) ? $_SESSION['dados_formulario']['nome'] : ''; ?>" required>
                <!-- script de js força o nome a iniciar com @, ele carrega a pagina e verifica se inicia com arroab senao ele acrescenta e se a pessoa apaga ele rapidamente ja insere outro novamente -->
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let input = document.getElementById("username");

                        if (!input.value.startsWith("@")) {
                            input.value = "@" + input.value.replace(/@/g, "");
                        }

                        input.addEventListener("input", function() {
                            if (!input.value.startsWith("@")) {
                                input.value = "@" + input.value.replace(/@/g, "");
                            }
                        });
                    });
                </script>


            </div>

            <div>
<!-- value eh utilizado para o email ficar armazenado em dados formulario do session, caso algo de errado na sessao de cadastro e a tela recarregue, os dados permanecem preenchidos -->
                <label class="block text-gray-700">E-mail</label>
                <input type="email" name="email" placeholder="seuemail@exemplo.com" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none" 
                value="<?php echo isset($_SESSION['dados_formulario']['email']) ? $_SESSION['dados_formulario']['email'] : ''; ?>" required>

            </div>

            <div>

<!-- input password utilizado para a digitação ficar escondida em asteriscos -->
                <label class="block text-gray-700">Senha</label>
                <input type="password" name="senha" placeholder="Crie uma senha"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none">

            </div>

            <div>

                <label class="block text-gray-700">Confirme sua senha</label>
                <input type="password" name="confirmar_senha" placeholder="Confirme sua senha"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none">
            </div>
<!-- checkbox de confirmação de idade, não é pssível se cadastrar sem marcar a checkbox -->
 <!-- value utilizado da mesma maneira que nome e email, porem assim a checkbox fica marcada -->
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="termos" class="w-4 h-4 text-purple-500 focus:ring-purple-500 border-gray-300 rounded" <?php echo isset($_POST['termos']) ? 'checked' : ''; ?> required>
                <label class="text-sm text-gray-700">Tenho 16 anos e concordo com os <a href="#" class="text-purple-500 underline">termos de uso</a></label>

            </div>

            <button type="submit" name="cadastrar_usuario" class="w-full bg-rose-500 text-white font-bold py-3 rounded-lg hover:bg-rose-600 transition duration-300">Cadastrar</button>

        </form>
<!-- se a pessoa ja possui conta href encaminha pra area de login novamente -->
        <div class="text-center mt-4">
            <a href="index.php" class="text-gray-500 hover:underline">Já tem uma conta? Faça login</a>


        </div>
    </div>
</body>

</html>