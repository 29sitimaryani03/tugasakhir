<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'no',
        'available'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pembayaran');
    }

    function handleUploadLogo()
    {
        $this->handleDeleteLogo();
        if (request()->hasFile('url_logo')) {
            $url_logo = request()->file('url_logo');
            $destination = "logo-payment/img";
            $randomStr = Str::random(5);
            $filename = time() . "-" . $randomStr . "." . $url_logo->extension();
            $url = $url_logo->storeAs($destination, $filename);
            $this->url_logo = "app/" . $url;
            $this->save();
        }
    }

    function handleDeleteLogo()
    {
        $url_logo = $this->url_logo;
        if ($url_logo) {
            $path = public_path($url_logo);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }
}
