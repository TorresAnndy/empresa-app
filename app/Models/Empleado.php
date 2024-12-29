<?php

// app/Models/Empleado.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Define los campos que se pueden asignar en masa
    protected $fillable = [
        'nombre', 'ingresos', 'gastos', 'viaticos', 'extras'
    ];
}

