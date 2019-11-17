<?php 
    require 'vendor/autoload.php';
    class SendEmail{
        public static function SendMail($to,$subject,$content){
            $key = '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';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("dvirtue@gmail.com", "Damian Salesman");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);
            $sendgrid = new \SendGrid($key);
            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught : '. $e->getMessage() ."\n";
                return false;
            }
        }
    }
?>