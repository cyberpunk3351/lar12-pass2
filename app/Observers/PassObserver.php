<?php

namespace App\Observers;

use App\Models\Pass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PassObserver
{
    public function creating(Pass $model) {
        $this->user_id = Auth::user()->id;
        // $this->private ? 0 : 1;
    }
}
