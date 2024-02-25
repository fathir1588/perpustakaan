<?php


namespace App\Models;



use App\Models\User;
use App\Models\ModelBuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status_peminjam',
        'jumlahPinjaman',
    ];

    // Relasi dengan tabel users (pengguna)
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(ModelBuku::class, 'buku_id');
    }
}

