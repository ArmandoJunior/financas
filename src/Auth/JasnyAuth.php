<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 06/01/2018
 * Time: 22:03
 */

namespace Fin\Auth;


use Fin\Repository\RepositoryInterface;
use Jasny\Auth;
use Jasny\Auth\User;

class JasnyAuth extends Auth
{


    use Auth\Sessions;
    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * JasnyAuth constructor.
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Fetch a user by ID
     *
     * @param int|string $id
     * @return User|null
     */
    public function fetchUserById($id)
    {
        return $this->repository->find($id, false);
    }

    /**
     * Fetch a user by username
     *
     * @param string $username
     * @return User|null
     */
    public function fetchUserByUsername($username)
    {
        return $this->repository->findByField('email', $username)[0];
    }
}