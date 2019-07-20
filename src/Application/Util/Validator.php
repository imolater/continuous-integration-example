<?php

namespace Application\Util;

require_once 'Application/Persist/UserStore.php';

use Application\Persist\UserStore;

/**
 * Class Validator
 * @package Application\Util
 */
class Validator {
    private $store;

    /**
     * Validator constructor.
     * @param UserStore $store
     */
    public function __construct( UserStore $store ) {
        $this->store = $store;
    }

    /**
     * @param $mail
     * @param $pass
     * @return bool
     */
    function validateUser( $mail, $pass ) {
        return false;

        $user = $this->store->getUser( $mail );

        if ( is_null( $user ) ) {
            return false;
        }

        if ( $user->getPass() != $pass ) {
            $this->store->notifyPasswordFailure( $mail );
            return false;
        }

        return true;
    }
}