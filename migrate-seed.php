<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 02/01/2018
 * Time: 21:34
 */

exec(__DIR__.'/vendor/bin/phinx rollback');
exec(__DIR__.'/vendor/bin/phinx migrate');
exec(__DIR__.'/vendor/bin/phinx seed:run');