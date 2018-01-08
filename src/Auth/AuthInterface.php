<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 06/01/2018
 * Time: 21:07
 */

namespace Fin\Auth;


use Fin\Models\UserInterface;

interface AuthInterface
{
    public function login(array $credentials): bool;

    public function check(): bool;

    public function logout(): void;

    public function hashPassword(string $password): string;

    public function user(): ?UserInterface;

}