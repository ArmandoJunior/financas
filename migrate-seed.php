<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 02/01/2018
 * Time: 21:34
 */

exec(__DIR__.'/vendor/bin/phinx rollback -t=0');
exec(__DIR__.'/vendor/bin/phinx migrate');
exec(__DIR__.'/vendor/bin/phinx seed:run -s UserSeeder');
exec(__DIR__.'/vendor/bin/phinx seed:run -s CategoryCostsSeeder');
exec(__DIR__.'/vendor/bin/phinx seed:run -s BillReceivesSeeder');
exec(__DIR__.'/vendor/bin/phinx seed:run -s BillPaysSeeder');