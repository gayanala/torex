<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable=[
        'donation_request_id',
        'file_path',
        'file_type',
        'original_filename',
    ];
    public function customer() {
        return $this->belongsTo('App\DonationRequest');
    }
}
