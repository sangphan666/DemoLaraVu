<?php

namespace JPTech\Roles\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoleNotFoundException extends NotFoundHttpException
{

    /**
     * RoleNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct('Role not found.');
    }
}
