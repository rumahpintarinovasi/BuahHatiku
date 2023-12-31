<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianInvoice extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rincian_invoice';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IdRincian';

    public function tipe_absensi()
    {
        return $this->belongsTo(TipeAbsensi::class, 'IdTipe', 'IdTipe');
    }
}
