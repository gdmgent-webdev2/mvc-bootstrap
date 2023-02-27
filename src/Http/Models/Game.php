<?php 

namespace Src\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {
    protected $table = 'games';

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
}