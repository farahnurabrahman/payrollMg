<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

 
class Departments extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id'; 
    use HasFactory;
    protected $fillable  = ['name', 'created_at', 'updated_at'];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::orderedUuid();
            }
        });
    }

    public function employees()
    {
        return $this->hasMany(Employees::class, 'department_id', 'id');
        }

        
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($department) {
            if ($department->employees()->count() > 0) {
            throw new \Exception("Departments has active employees.");
            }
            });
            }
}