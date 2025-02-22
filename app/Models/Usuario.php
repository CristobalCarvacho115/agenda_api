<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='usuarios';
    protected $hidden = ['deleted_at'];
    public $timestamps = false;

    public function pagos():HasMany{
        return $this->hasMany(Pago::class);
    }

    public function actividades():HasMany{
        return $this->hasMany(Actividad::class);
    }

    public function fondo():BelongsTo{
        return $this->belongsTo(Fondo::class);
    }

    public function rol():BelongsTo{
        return $this->belongsTo(Rol::class);
    }
}
