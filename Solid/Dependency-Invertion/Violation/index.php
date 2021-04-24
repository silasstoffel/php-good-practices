<?php

// implementations

class Mailer
{
    private string $service;

    public function send()
    {
        return 'send';
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
