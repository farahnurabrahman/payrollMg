<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

 
class Employees extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory;
    protected $fillable  = ['name', 'department_id', 'position', 'basic_salary', 'allowance', 'overtime_hours', 'hourly_rate','created_at', 'updated_at'];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                // Use orderedUuid() for better database performance
                $model->{$model->getKeyName()} = (string) Str::orderedUuid();
            }
        });
    }

     public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id', 'id');
    }

    public function payrollRecords()
    {
        return $this->hasMany(PayrollRecords::class, 'employee_id', 'id');
        }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($employee) {
            if ($employee->payrollRecords()->count() > 0) {
            throw new \Exception("Employee has active Payroll.");
            }
            });
            }
}