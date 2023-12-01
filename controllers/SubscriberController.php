<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SubscriberController
{

    /**
     * sendEmail()
     * Send messages with PHPMailer library
     * @return string|PDOException|void 
     */
    static public function sendEmail()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;           //Enable verbose debug output
                $mail->SMTPDebug = 0;                               //Enable verbose debug output
                // Active utf-8
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                    //Send using SMTP
                $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                           //Enable SMTP authentication
                $mail->Username   = EMAIL_USER;                     //SMTP username
                $mail->Password   = EMAIL_PASS;                     //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Enable implicit TLS encryption
                $mail->Port       = EMAIL_PORT;                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom(EMAIL_USER, EMAIL_NAME);
                $mail->addAddress($email, $name);                   //Add a recipient

                //Content
                $mail->isHTML(true);                                //Set email format to HTML
                $mail->Subject = 'Aquí esta el asunto';
                $mail->Body    = 'Este es el cuerpo del mensaje en HTML <b>se puede usar negritas!</b>';
                $mail->AltBody = 'Este es el cuerpo del mensaje para clientes que no acepten HTML';

                if ($mail->send()) {
                    $table = 'subscribers';
                    $data = array(
                        'name' => $name,
                        'email' => $email
                    );
                    // BD Storage
                    if (SubscriberModel::storage($table, $data) == 'ok') {
                        return 'success';
                    }
                }
            } catch (Exception $e) {
                // Returns Error when the message cannot be sent
                return "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
            }
        }
    }
}
