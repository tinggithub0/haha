<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'toUser',
        'title',
        'body',
        'deadline',
        'finisher',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMessages( $id = '' )
    {
        // 取得 user 資料並整理
        $userTable = User::select('id', 'username')->get();
        foreach ($userTable as $key => $user) {
            $users[$user->id] = $user->username;
        }

        //取得 messages 資料並整理
        if ($id != '') {
            $messages = [Message::find($id)];
        } else {
            $messages = Message::where('finisher', '=', 0)->get();
        }
        foreach ($messages as $key => $message) {
            if (0 == $message->toUser) {
                $messages[$key]->toUserName = 'all';
            } else {
                $messages[$key]->toUserName = $users[$message->toUser];
            }
        }

        return $messages;
    }
}
