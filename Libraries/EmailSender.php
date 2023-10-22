<?php 

namespace App\Libraries;

use CodeIgniter\Email\Email;
/**
 * Mila manisy identification a deux facteurs anle compte gmail
 * Avy eo mi creer App passwords 
 * Avy eo allowevana ilay app passwords (tsy azo adino)
 */
class EmailSender 
{

    protected Email $email ;

    /**
     * model of the array (just copy it)
     */
    public $data = [
        'fromMail' => 'sender@example.com',
        'yourName' => 'John Doe',
        'toMail' => 'recipient@example.com',
        'CC' => 'cc@example.com',
        'BCC' => 'bcc@example.com',
        'subject' => 'Sample Subject',
        'message' => 'Hello, this is a sample message.'
    ];
    


    public function __construct(?Email $email=null ,$userName ,$password)
    { 
        echo 'HIHI';
        if ($email==null) {
            $email =\Config\Services::email();
        }
        $this->email = $email;

        $this->configSend($userName ,$password);
    }


    public function configSend($email ,$password )
    {

        $conf = [
                    'protocol'=>'smtp',
                    'mailPath'=>'/usr/sbin/sendmail',
                    'wordWrap'=>true,
                    'SMTPHost'=>'smtp.googlemail.com',   
                    'SMTPUser'=>$email,
                    'SMTPPass'=>$password,
                    'SMTPPort'=>465,
                    'SMTPTimeout'=>60,
                    'SMTPKeepAlive'=>false,
                    'SMTPCrypto'=>'ssl',
                    'newline' => "\r\n",
                    'mailType' =>'html'

                ];
    
        $this->email->initialize($conf);



    }


    /**
     * Mila mi set anle fandehany alony 
     * form anle array
     */

    public function sendEmail(array $array)
    {
        $fromMail = isset($array['fromMail']) ? $array['fromMail'] : '';
        
        $yourName = isset($array['yourName']) ? $array['yourName'] : '';
        
        $toMail = isset($array['toMail']) ? $array['toMail'] : '';
        
        $CC = isset($array['CC']) ? $array['CC'] : '';
        
        $BCC = isset($array['BCC']) ? $array['BCC'] : '';
        
        $subject = isset($array['subject']) ? $array['subject'] : '';
        
        $message = isset($array['message']) ? $array['message'] : '';
    
        return $this->email->setFrom($fromMail, $yourName)
            ->setTo($toMail)
            ->setCC($CC)
            ->setBCC($BCC)
            ->setSubject($subject)
            ->setMessage($message)
            ->send();
    }
    
}
