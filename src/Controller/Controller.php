<?php

namespace Mohist\SodionAuth\Controller;

use Mohist\SodionAuth\Provider\UserProvider;
use Mohist\SodionAuth\Response\Response;

class Controller
{
    /** @var UserProvider */
    protected $provider;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function handle($post)
    {
        $response = $this->hand((object)$post);
        return $response;
    }

    protected function hand($request)
    {
        switch ($request->action) {
            case 'register':
                return (new RegisterController($this->provider))->hand($request);
            case 'loginByName':
                return (new LoginByNameController($this->provider))->hand($request);
            case 'loginByEmail':
                return (new LoginByEmailController($this->provider))->hand($request);
            case 'getByName':
                return (new GetByNameController($this->provider))->hand($request);
            case 'getByEmail':
                return (new GetByEmailController($this->provider))->hand($request);
            default:
                return Response::unknown('flarum_error','ah?'.$request->action);
        }
    }
}
