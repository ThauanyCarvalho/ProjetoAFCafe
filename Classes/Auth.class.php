<?php

class Auth
{
    private $email;
    private $token;
    private $expiracao;

    public function validarEmail($email)
    {
        $query = "SELECT id FROM Usuario WHERE emailUsuario = :email";
        $stmt = Database::prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            $this->email = $email;
            return false; // E-mail não encontrado
        }else{
            return true;
        }
    }

    /**
     * Gera um token para redefinição de senha e armazena no banco.
     */
    public function gerarToken()
    {
        
        // Gera um token seguro
        $this->token = bin2hex(random_bytes(32));
        $this->expiracao = date("Y-m-d H:i:s", strtotime("+1 hour"));
        $query = "INSERT INTO redefinicoes_senha (email, token, expiracao) VALUES (:email, :token, :expiracao)";
        $stmt = Database::prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':token', $this->token);
        $stmt->bindParam(':expiracao', $this->expiracao);

        if ($stmt->execute()) {
            return $this->token;
        }

        return false;
    }

    /**
     * Valida o token recebido.
     */
    public function validateToken($token)
    {
        $query = "SELECT * FROM redefinicoes_senha 
                  WHERE token = :token AND expiracao >= NOW()";
        $stmt = Database::prepare($query);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $registro = $stmt->fetch(PDO::FETCH_OBJ);
            $this->email = $registro->email;
            return true;
        }

        return false;
    }

    /**
     * Atualiza a senha do usuário.
     */
    public function updatePassword($novaSenha)
    {
        $criptografada = password_hash($novaSenha, PASSWORD_DEFAULT);

        $query = "UPDATE usuarios SET senha = :senha WHERE email = :email";
        $stmt = Database::prepare($query);
        $stmt->bindParam(':senha', $criptografada);
        $stmt->bindParam(':email', $this->email);

        if ($stmt->execute()) {
            // Remove o token usado
            $this->deleteToken();
            return true;
        }

        return false;
    }

    /**
     * Remove tokens após redefinição de senha.
     */
    private function deleteToken()
    {
        $query = "DELETE FROM redefinicoes_senha WHERE email = :email";
        $stmt = Database::prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}