<?php

namespace Application\Persist;

require_once 'Application/Domain/User.php';

use Application\Domain\User;

/**
 * Class UserStore
 * @package Application\Persist
 */
class UserStore {
    /**
     * @var array
     */
    private $users = array();

    /**
     * @param $name
     * @param $mail
     * @param $pass
     *
     * @return bool
     * @throws \Exception
     */
    function addUser( $name, $mail, $pass ) {
        if ( isset( $this->users[$mail] ) ) {
            throw new \Exception( "Пользователь с email - {$mail} уже существует" );
        }

        $this->users[$mail] = new User( $name, $mail, $pass );
        return true;
    }

    /**
     * @param $mail
     */
    function notifyPasswordFailure( $mail ) {
        if ( !is_null( $user = $this->getUser( $mail ) ) )
            $user->failed( time() );
    }

    /**
     * @param $mail
     *
     * @return User|null
     */
    public function getUser( $mail ): ?User {
        return $this->users[$mail];
    }
}