<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamQrCode extends Model
{
    use HasFactory;
    
    protected $table = 'team_qrcodes';
    protected $guarded = ['id'];



    /**
     * Get the team that owns the QR code.
    */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
