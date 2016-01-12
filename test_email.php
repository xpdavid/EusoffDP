<?php
	//request for file 'Mail.php' in the server
        require_once('Mail.php');
        $to="acesscp@gmail.com";
        //Subject of the email
        $subject = 'Confirmation Email: Eusoff Hall Dance Production';
        //Message of the email
        
        $content = "nihao";

        //Email variables
        $from = 'eusoffworks@eusoff.nus.edu.sg';
        $host = 'ssl://smtp.gmail.com';
        $port = '465';
        $username = EMAIL_USER;
        $password = EMAIL_PWD;

        $headers = array ('From'         => $from,
                          'Reply-To'     => $from,
                          'To'           => $to,
                          'Subject'      => $subject,
                          'MIME-Version' => '1.0',
                          'Content-Type' =>'text/html');

        $smtp = Mail::factory('smtp', array(
                'host' => $host,
                'port' => $port,
                'auth' => true,
                'username' => $username,
                'password' => $password));

        $mail = $smtp->send($to, $headers, $content);


?>