<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Login.css">

    <link rel="icon" href="../imagens/LogoMarcaSfundo.png">
</head>
<?php
    if (filter_has_var(INPUT_POST, "logar")) {
        spl_autoload_register(function ($class) {
          require_once "../classes/{$class}.class.php" ;
        });
        $usuario = new Usuario;
        $usuario->setNome(filter_input(INPUT_POST, 'nome'));
        $usuario->setSenha(filter_input(INPUT_POST,  'senha'));
        $mensagem = $usuario->login();
        echo "<script>alert('$mensagem');</script>";
    }
?>



    <div class="header" id="header">
        <div class="navigation_resp" id="navigation_resp">
            <button type="button" class="btn_icon_header btn-close" aria-label="Close" onclick="toggleSideBar()">
            </button>
            <a href="localizacao.html">Localização</a>
            <a href="baseAf.html">Home</a>
            <a href="Historia.html">História</a>
            <a href="Premios.html">Premios</a>
    
        </div>


        <button onclick="toggleSideBar()" class="btn_icon_header">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </button>
        <div class="logo_header">
            <img src="../imagens/LogoMarcaSfundo.png" class="img_logo_header" alt="Logo AF Café">
        </div>


        <div class="navigation_header" id="navigation_header">
            <button type="button" class="btn_icon_header btn-close" aria-label="Close" onclick="toggleSideBar()">
            </button>
            <a href="Paginacontato.html">Localização</a>
            <a href="baseAf.html">Home</a>
            <a href="Historia.html">História</a>
            <a href="Produtos.html">Produtos</a>

        </div>
        <a href="login.html" id="login">Entrar</a>
    </div>


    <div tabindex="0" onclick="closeSideBar()" class="content" id="content">
        
            <main >
                <div class="tela_login">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="redirect" value="<?php echo isset($_GET['redirect']) ? htmlspecialchars($_GET['redirect']) : '../PHP/dashboard.php'; ?>">
                        <img src="../imagens/LogoMarcaSfundo.png" alt="" class="imagem_tela_login">
                        <h1>Login</h1>
                       <input type="text" id="nome" placeholder="Usuário" name="nome">
                       <br><br>
                     <input type="password"  id="senha" placeholder="Senha" name="senha">
                       <br><br>
                        
                       <button type="submit" class="btn btn-primary" name="logar">Entrar</button>     
                </form>       
                </div>
                
                
            </main>

        <footer>
            <div id="footer_content">
                <div id="footer_contacts" class="footer_contacts">
                    <div>
                        
                    </div>
                    <img src="../imagens/LogoMarcaSfundo.png" class="LogoMarcaSfundo" alt="">
                    <p>O melhor produto do <br> grão ao café para você</p>
    
                    <div id="footer_social_media">
                        <a href="https://www.instagram.com/af.cafe2018?igsh=cG84ZjVxZmYzMDg0" class="footer-link " id="instagram"><i class="fa-brands fa-instagram"></i></a>
    

    
                        <a href="https://l.instagram.com/?u=https%3A%2F%2Fwa.me%2F%2B5569999798988%3Ffbclid%3DPAZXh0bgNhZW0CMTEAAaZrMi16IscipJ9wli3ikh83Ii-JxOSBBOS8L4KbWLfaYdGh8a2ccvnrodk_aem_gIWpfvH2n3r61eBqPkWoGQ&e=AT2ubaDQW20O4lNgIoJUPBl0Qwm3IVl7jzLvVZW7yP8onK6FAeYTdag_TVIf8K74s6pXq02ZOtU3Kqy2rVdoTOQWGksUFqVqii0XFw" class="footer-link " id="whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
                <ul class="footer-list">
                    <li>
                        <h3>Produtos</h3>
                    </li>
                    <li>
                        <a href="#" class="footer-link">Café Especial</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">Licor de Café</a>
                    </li>
    
                </ul>
                <ul class="footer-list">
                    <li>
                        <h3>Localização</h3>
                    </li>
                    <li>
                        Sitio Mandacaru, Nossa Senhora Aparecida e São João Batista.
                    </li>
                    <li>
                        linhas 06 e 07 lotes 69B, 69D e 1024
                    </li>
                    <li>
                        Municipío De Ministro Andreazza
                    </li>
                </ul>
                <div id="footer_subscribe">
                    <h3>Inscreva-se</h3>
                    <p>
                        Increva seu email para receber as melhores ofertas
                    </p>
                    <div id="input_group">
                        <input type="email" id="email">
                        <button><i class="fa-regular fa-envelope"></i></button>
                    </div>
                </div>
    
            </div>
            <div id="footer_copyright">
                &#169
                2024 copyright reserved
            </div>
        </footer>
    </div>

    


    <script src="../JS/Base.js"></script>
    <script src="../JS/premio.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>