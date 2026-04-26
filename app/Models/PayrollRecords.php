<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

 
class PayrollRecords extends Model
{
    public $incrementing = false;
    use HasFactory;
    protected $fillable  = ['name', 'employee_id', 'month', 'year', 'gross_pay', 'overtime_pay', 'tax','epf_employee', 'epf_employer', 'net_pay', 'created_at', 'updated_at'];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                // Use orderedUuid() for better database performance
                $model->{$model->getKeyName()} = (string) Str::orderedUuid();
            }
        });
    }

    public function employee() 
    {
        return $this->belongsTo(Employees::class,'employee_id','id');
    }

    public function getMonthNameAttribute()
{
    return \Carbon\Carbon::create()->month($this->month)->format('F');
}

}