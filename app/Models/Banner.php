<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';
    protected $primaryKey = 'id';

    protected $fillable = [
        'url_banner',
        'name'
    ];

    function handleUploadImg()
    {
        $this->handleDeleteImg();
        if (request()->hasFile('url_banner')) {
            $url_banner = request()->file('url_banner');
            $destination = "banner/img";
            $randomStr = Str::random(5);
            $filename = time() . "-" . $randomStr . "." . $url_banner->extension();
            $url = $url_banner->storeAs($destination, $filename);
            $this->url_banner = "app/" . $url;
            $this->save();
        }
    }

    function handleDeleteImg()
    {
        $url_banner = $this->url_banner;
        if ($url_banner) {
            $path = public_path($url_banner);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }
}
