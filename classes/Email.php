<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '3728a367d71ced';
        $mail->Password = '0e495ba86523ad';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'uptask.com');
        $mail->Subject = 'Confirma tu cuenta';
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Has creado tu cuenta en UpTask, solo deber confirmarla en el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:8000/confirmar?token=" . $this->token . "'>Confirmar Cuenta </a></p>";
        $contenido .= "<p>Si tu no creaste esta cuenta puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }

    public function enviarInstrucciones() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '3728a367d71ced';
        $mail->Password = '0e495ba86523ad';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'uptask.com');
        $mail->Subject = 'Reestablece tu password';
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Parece que has olvidado tu password, sigue el siguiente enlace para recuperarla</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:8000/reestablecer?token=" . $this->token . "'>Reestablecer Password </a></p>";
        $contenido .= "<p>Si tu no creaste esta cuenta puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }
}