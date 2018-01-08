<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 04/01/2018
 * Time: 12:33
 */

namespace Fin\Models;


use Illuminate\Database\Eloquent\Model;

class BillPay extends Model
{
    //Mass Assigment
    protected $fillable = [
      'date_launch',
      'name',
      'value',
      'user_id',
      'category_cost_id'
    ];

    public function categoryCost()
    {
        return $this->belongsTo(CategoryCost::class);
    }

}