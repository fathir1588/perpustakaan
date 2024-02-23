<?php

namespace App\Models;

use App\Http\Controllers\BukuController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBuku extends Model
{
    protected $table = 'tabel_buku'; //protected $table untuk konvensi penamaan tabel karna laravel default mengharuskan pakai akhiran s, seperti mahasiswas
    protected $guarded = [];
}
