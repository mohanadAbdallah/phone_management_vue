<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobile extends Model
{
    use HasFactory;
    protected $fillable = ['mobile_name','customer_name','email','type','phone','identity','address',
        'salary','residual','created_at','date','status','user_id'];


    protected $appends=['status_name', 'status_color'];

    public function mobile_payments()
    {
        return $this->hasMany(mobile_payment::class);
    }

    public function scopeUserMobiles($q, $id = null)
    {
        $id = $id ?? auth()->user()->id;
        return $q->where('user_id', $id);
    }
    public function scopeUserActiveMobiles($q, $id = null)
    {
        $id = $id ?? auth()->user()->id;
        return $q->where('user_id', $id)->where('status',0);
    }

    public function getStatusNameAttribute()
    {
        if ($this->status ==0)
            return @trans('app.active');
        elseif ($this->status ==1)
            return @trans('app.expired');
        elseif ($this->status ==2)
            return  @trans('app.complete');
        elseif ($this->status ==3)
            return  @trans('app.underProcedure');
        elseif ($this->status ==4)
            return  @trans('app.accepted');
        elseif ($this->status ==5)
            return  @trans('app.delivered');

        else
            null;


    }
    public function getStatusColorAttribute()
    {
        $status = $this->status;
        if ($this->status ==0)
            return 'badge badge-success' ;
        elseif ($this->status ==1)
            return 'badge badge-danger ' ;
        elseif ($this->status ==2)
            return 'badge badge-danger' ;
        elseif ($this->status ==3)
            return 'badge badge-success' ;
        elseif ($this->status ==4)
            return 'badge bg-pink' ;
        elseif ($this->status ==5)
            return 'badge bg-pink' ;
        elseif ($this->status ==6)
            return 'badge bg-purple-300' ;
        elseif ($this->status ==7)
            return 'badge badge-success' ;
        elseif ($this->status ==8)
            return 'badge bg-purple-700' ;
        else null;
    }
}
