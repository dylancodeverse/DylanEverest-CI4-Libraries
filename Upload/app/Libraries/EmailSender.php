<?php 

namespace App\Libraries;

use CodeIgniter\Email\Email;

class EmailSender 
{

    protected Email $email ;

    public function __construct(?Email $email=null ,$conf=null)
    {
        if ($email==null) {
            $email =\Config\Services::email();
        }
        $this->email = $email;

        $this->configSend($conf);
    }


    public function configSend($conf = ['protocol'=>'sendmail',
                                        'mailPath'=>'/usr/sbin/sendmail',
                                        'charset'=>'iso-8859-1',
                                        'wordWrap'=>true
                                        ])
    {
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
    
        $this->email->setFrom($fromMail, $yourName)
            ->setTo($toMail)
            ->setCC($CC)
            ->setBCC($BCC)
            ->setSubject($subject)
            ->setMessage($message)
            ->send();
    }
    
}
