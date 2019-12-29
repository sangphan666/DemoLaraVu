<?php

namespace JPTech\Users\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserNotFoundException extends NotFoundHttpException
{

    /**
     * UserNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct('User not found.');
    }
}
