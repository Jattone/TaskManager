<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Task extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    const NEW         = 1;
    const IN_PROGRESS = 2;
    const ON_REVIEW   = 3;
    const COMPLETED   = 4;

    const STATUSES = [
        Task::NEW,
        Task::IN_PROGRESS,
        Task::ON_REVIEW,
        Task::COMPLETED,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "description",
        "status",
        "assignee",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "assignee");
    }
}
