<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Asegúrate de que esta línea esté presente y correcta

class Contactos extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $mensaje = array();  // Inicializa el array del mensaje

        if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])) {
            if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])) {
                $mensaje = array('msg' => 'TODOS LOS CAMPOS SON REQUERIDOS', 'icono' => 'warning');
            } else {
                $mail = new PHPMailer(true);
                try {
                    // Configuración del servidor
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = HOST_SMTP;
                    $mail->SMTPAuth = true;
                    $mail->Username = USER_SMTP;
                    $mail->Password = PASS_SMTP;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = PUERTO_SMTP;

                    // Destinatarios
                    $mail->setFrom('carlos.rivas1@catolica.edu.sv', TITLE);
                    $mail->addAddress($_POST['email']);

                    // Contenido
                    $mail->isHTML(true);
                    $mail->Subject = $_POST['nombre'] . ' Mensaje desde: ' . TITLE;
                    $mail->Body = $_POST['mensaje'];
                    $mail->AltBody = 'Gracias por la preferencia';

                    $mail->send();
                    $mensaje = array('msg' => 'Correo enviado, revisa tu bandeja de entrada o SPAM', 'icono' => 'success');
                } catch (Exception $e) {
                    $mensaje = array('msg' => 'Error al enviar el correo: ' . $mail->ErrorInfo, 'icono' => 'error');
                }
            }
        } else {
            $mensaje = array('msg' => 'Error fatal', 'icono' => 'error');
        }

        // Devuelve siempre una respuesta JSON
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }
}
