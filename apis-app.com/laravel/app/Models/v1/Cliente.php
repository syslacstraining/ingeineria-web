<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\v1\Categoria;



class Cliente extends Model
{
    use HasUUID;
    use SoftDeletes;
    
    protected $table = 'clientes'; 

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $uuidFieldName = 'id';    

}