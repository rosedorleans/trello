<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'author_id',
        'assignee_id',
        'due_date',
    ];

    /**
     * Get the author user of the ticket.
     */
    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the assignee user of the ticket.
     */
    public function assignee()
    {
        return $this->belongsTo('App\Models\User');
    }
}
