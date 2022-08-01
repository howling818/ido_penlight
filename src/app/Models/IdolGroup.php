<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class IdolGroup extends Model
{
    use HasFactory;
    protected $table = 'm_idol_group';

    protected $fillable = [
        'group_name',
        'group_kana',
        'url',
        'updated_userid'
    ];

    // グローバルスコープ定義
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('m_idol_group.is_active', 1);
        });
    }

    public function findByGoupId($group_id)
    {
        $data = IdolGroup::
            where('group_id', $group_id)
            ->orderBy('id', 'asc')
            ->get();

        return $data;
    }

    public function getList()
    {
        $data = IdolGroup::
            orderBy('id', 'asc')
            ->get();

        return $data;
    }
}
