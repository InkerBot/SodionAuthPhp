<?php

namespace Mohist\SodionAuth\Controller;


use Mohist\SodionAuth\Response\Response;
use Mohist\SodionAuth\Result\NoSuchUserResult;
use Mohist\SodionAuth\Result\SuccessResult;

class GetByNameController extends Controller
{
    protected function hand($request)
    {
        $result = $this->provider->getByName($request->username);
        switch (get_class($result)) {
            case NoSuchUserResult::class:
                return Response::no_user();
            case SuccessResult::class:
                return Response::ok([
                    'username' => $result->username,
                    'email' => $result->email,
                ]);
            default:
                return Response::unknown('server_error', 'server_error');
        }
    }
}
