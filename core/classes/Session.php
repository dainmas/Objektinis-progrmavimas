<?php

namespace Core;

abstract class Session {

    protected $repo;
    protected $is_logged_in;
    protected $user;

    const LOGIN_SUCCESS = 1;
    const LOGIN_ERR_CREDENTIALS = -1;
    const LOGIN_ERR_NOT_ACTIVE = -2;

    /**
     * Konstruktorius pradeda sesiją… ir bando
     * user'į prijungti su Cookie
     */
    abstract public function __construct(\Core\Modules\User\Repository $repo);
    
    /**
     * Grąžina $is_logged_in;
     */
    abstract public function isLoggedIn();

    /**
     * Bando user'į priloginti iš 
     * Server-Side'o Cookie $_SESSION
     * bandant jį priloginti su $_SESSION'e
     * išsaugotais email ir password
     */
    abstract public function loginViaCookie();
    
    /**
     * Bando user'į priloginti per $email ir $password
     * 
     * Jeigu blogas passwordas/email, return'inti
     * LOGIN_ERR_CREDENTIALS
     * 
     * Jeigu useris not active, return'inti
     * LOGIN_ERR_NOT_ACTIVE
     * 
     * Jeigu viskas gerai: 
     * 1# į $_SESSION išsaugoti email ir password
     * 2# nusettinti $this->user
     * 3# return'inti LOGIN_SUCCESS
     * 
     *      * 
     * @param type $email
     * @param type $password
     * @return int
     */
    abstract public function login($email, $password):int;

    /**
     * Išvalyti $_SESSION
     * užbaigti sesiją… (Google)
     * ištrinti sesijos cookie (Google)
     * nustatyti is_logged_in
     * nustatyti $this->user
     */
    abstract public function logout();

    /**
     * Return'inti user'io objektą…
     */
    abstract public function getUser():User;
    
}


