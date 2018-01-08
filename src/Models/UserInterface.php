<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 07/01/2018
 * Time: 08:47
 */

namespace Fin\Models;


interface UserInterface
{
    public function getID(): int ;

    public function getFullName(): string;

    public function getEmail(): string ;

    public function getPassword(): string ;
}