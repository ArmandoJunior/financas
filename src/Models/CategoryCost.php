<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 04/01/2018
 * Time: 12:33
 */

namespace Fin\Models;


use Illuminate\Database\Eloquent\Model;

class CategoryCost extends Model
{
    //Mass Assigment
    protected $fillable = [
      'name'
    ];

}