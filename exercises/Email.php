<?php
namespace DWA;

/**
 * Email Class
 */
class Email 
{
    
    # Properties
    private $recepient;
    private $expensedatafile;
    
    /**
     * Constructor for Email
     */
    public function __construct($recipient)
    {
        $this->recipient = $recepient;
    }
    
    # Public Methods
    
    /**
     * Public Method to send email.
     * @param subject Email Subject.
     * @param message Email Message
     */
    public function send($subject, $message){
        return mail($this->recipient, $subject, $message);
    }
    
}