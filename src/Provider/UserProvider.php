<?php


namespace Mohist\SodionAuth\Provider;

use Mohist\SodionAuth\Result\Result;

abstract class UserProvider
{
    /**
     * @param $username
     * @return Result
     */
    public abstract function getByName($username);

    /**
     * @param $email
     * @return Result
     */
    public abstract function getByEmail($email);

    /**
     * @param $username
     * @param $password
     * @return Result
     */
    public abstract function loginByName($username, $password);

    /**
     * @param $email
     * @param $password
     * @return Result
     */
    public abstract function loginByEmail($email, $password);

    /**
     * @param $username
     * @param $email
     * @param $password
     * @return Result
     */
    public abstract function register($username, $email, $password);
}
