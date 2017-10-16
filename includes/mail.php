<?php

    require_once("libphp-phpmailer/class.phpmailer.php");
    require_once("../includes/constants.php");

    function smtpmailer($to, $from, $from_name, $subject, $body) 
    { 
        // instantiate mailer
        $mail = new PHPMailer();

        // use your ISP's SMTP server (e.g., smtp.fas.harvard.edu if on campus or smtp.comcast.net if off campus and your ISP is Comcast)
        $mail->IsSMTP();
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username   = GUSER;  // GMAIL username
        $mail->Password   = GPWD;            // GMAIL password

        // set From:
        $mail->SetFrom($from, $from_name);

        // set To:
        $mail->AddAddress($to);

        // set Subject:
        $mail->Subject = $subject;
        
        $mail->IsHTML(true);                                  // set email format to HTML

        // set body
        $mail->Body = $body;

        // send mail
        if ($mail->Send() === false)
            die($mail->ErrorInfo . "\n");
    }
    
    // smtpmailer('karan_kishinani@hotmail.com', GUSER, 'C$50 Finance', 'SELL', 'You have sold 5 stocks');
    
?>
