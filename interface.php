<?php

interface Newsletter{
    public function subscribe($email);
}
class MailChimp{
    public function subscribe($email)
    {
        # code...
        die('subscribing with mailchimp!');
    }
}

class Drip implements Newsletter{
    public function subscribe($email)
    {
        # code...
        die('subscribing with drip!');
    }
}

class NewsLetterController{
    public function store(Newsletter $mailchimp)
    {
        # code...
        $email = 'mnk@gmail.com';
        $mailchimp->subscribe($email);
    }
}

$newsletter = new NewsLetterController();

$newsletter->store(new Drip());