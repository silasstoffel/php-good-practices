<?php

// abstraction

interface Mailer
{
    public function send(): void;
}

// implementations

class SmtpMailer implements Mailer
{
    public function send()
    {
        print 'SMTP implementations';
    }
}

class SendGridMailer implements Mailer
{
    public function send()
    {
        print 'SendGridMailer implementations';
    }
}


class SendWelcomeMessage
{
    private Mailer $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send()
    {
        $this->mailer->send();
    }
}

// use
$welcome = new SendWelcomeMessage(
    new SmtpMailer()
);
$welcome->send();


$welcome = new SendWelcomeMessage(
    new SendGridMailer()
);
$welcome->send();

