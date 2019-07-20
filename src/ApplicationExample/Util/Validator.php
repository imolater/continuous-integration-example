<?php

namespace ApplicationExample\Util;

require_once 'lib/ApplicationExample/Persist/UserStore.php';

use ApplicationExample\Persist\UserStore;

/**
 * Class Validator
 * @package ApplicationExample\Util
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