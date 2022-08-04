<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class Member extends Model
{
    use HasFactory;
    protected $table = 't_member';

    protected $fillable = [
        'group_id',
        'member_name',
        'member_kana',
        'member_nickname',
        'birthday',
        'pen_light_id1',
        'pen_light_id2',
        'pen_light_id3',
        'twitter',
        'instagram',
        'tiktok',
        'Youtube',
        'is_display'
    ];

    // グローバルスコープ定義
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('t_member.is_active', 1);
        });
    }

    public function search($request)
    {
        $search_group_id = (!is_null($request->group_id)) ? $request->group_id : ((!is_null($request->gid)) ? $request->g_id : null);
        $search_member_name =
            (!is_null($request->member_name)) ? str_replace(array(' ', '　'), '', $request->member_name) : null;
        $search_member_kana =
            (!is_null($request->member_kana)) ? str_replace(array(' ', '　'), '', mb_convert_kana($request->member_kana, 'KVc')) : null;
        $search_member_nickname =
            (!is_null($request->member_nickname)) ? str_replace(array(' ', '　'), '', $request->member_nickname) : null;
        $search_penlight =
            (!is_null($request->penlight)) ? $request->penlight : null;

        $data = Member::
            where('is_display', 1)
            ->when(!is_null($search_group_id), function ($query1) use ($search_group_id) {
                return $query1->where('t_member.group_id', $search_group_id);
            })
            ->when(!is_null($search_member_name), function ($query2) use ($search_member_name) {
                return $query2->where('t_member.member_name', 'like', '%' . $search_member_name . '%');
            })
            ->when(!is_null($search_member_kana), function ($query3) use ($search_member_kana) {
                return $query3->where('t_member.member_kana', 'like', '%' . $search_member_kana . '%');
            })
            ->when(!is_null($search_member_nickname), function ($query4) use ($search_member_nickname) {
                return $query4->where('t_member.member_nickname', 'like', '%' . $search_member_nickname . '%');
            })
            ->when(!is_null($search_penlight), function ($query5) use ($search_penlight) {
                return $query5->where('t_member.pen_light_id1', $search_penlight)
                        ->orwhere('t_member.pen_light_id2', $search_penlight)
                        ->orwhere('t_member.pen_light_id3', $search_penlight);
            })
            ->orderBy('t_member.group_id', 'asc')
            ->orderBy('t_member.id', 'asc')
            ->get();

        return $data;
    }

    public function insert($request)
    {
        $member_name = (!is_null($request->member_name)) ? str_replace(array(' ', '　'), '', $request->member_name) : null;
        $member_kana = (!is_null($request->member_kana)) ? str_replace(array(' ', '　'), '', mb_convert_kana($request->member_kana, 'KVc')) : null;
        $member_nickname = (!is_null($request->member_nickname)) ? str_replace(array(' ', '　'), '', $request->member_nickname) : null;

        $entity = Member::create([
            'group_id'          => $request->group_id,
            'member_name'       => $member_name,
            'member_kana'       => $member_kana,
            'member_nickname'   => $member_nickname,
            'birthday'          => $request->birthday,
            'pen_light_id1'     => $request->pen_light_id1,
            'pen_light_id2'     => $request->pen_light_id2,
            'pen_light_id3'     => $request->pen_light_id3,
            'twitter'           => $request->twitter,
            'instagram'         => $request->instagram,
            'tiktok'            => $request->tiktok,
            'Youtube'           => $request->Youtube,
            'is_display'        => 1,
        ]);

        return $entity->id;
    }
}
