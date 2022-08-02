<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class Penlight extends Model
{
    use HasFactory;
    protected $table = 'm_penlight';

    // グローバルスコープ定義
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('m_penlight.is_active', 1);
        });
    }

    public function list()
    {
        return Penlight::
            orderBy('id', 'asc')
            ->get();
    }
}
