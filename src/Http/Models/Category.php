<?php 

namespace Src\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Src\Http\Models\Game;

class Category extends Model {
    protected $table = 'categories';

    public function games() {
        return $this->hasMany(Game::class);
    }
}