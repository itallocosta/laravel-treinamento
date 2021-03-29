<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominium extends Model
{
    use HasFactory;

    protected $table = 'condominiums';

    protected $fillable = ['id', 'name', 'telefone', 'endereco'];

    public function sindico()
    {
        return $this->belongsTo(User::class, 'user_sindico_id');
    }

    public function subSindico()
    {
        return $this->belongsTo(User::class, 'user_subsindico_id');
    }
}
