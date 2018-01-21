<?php

namespace App\Service;

use App\Entity\Core\User;

class MailManager
{
    protected $mailer;
    protected $templating;
    protected $mailFrom;
    protected $mailFromNom;

    /**
     * MailManager constructor.
     * @param \Swift_Mailer $mailer
     * @param $templating
     * @param $mailFrom
     * @param $mailFromNom
     */
    public function __construct(\Swift_Mailer $mailer,$templating, $mailFrom, $mailFromNom)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->mailFrom = $mailFrom;
        $this->mailFromNom = $mailFromNom;
    }

    /**
     * @param User $user
     */
    public function sendUserRegistrationEmail(User $user)
    {

        $body = $this->templating->render('core/emails/registration.html.twig', [
            'username' => $user->getEmail()
        ]);

        $message = (new \Swift_Message())
            ->setSubject('Confirmation de votre inscription')
            ->setFrom($this->mailFrom, $this->mailFromNom)
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');
        $this->mailer->send($message);
    }
}