<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApiKeyController extends Controller
{
    public function regenerateApiKey()
    {
        $plainKey = Str::random(64);

        Auth::user()->update([
            'api_key' => hash('sha256', $plainKey),
        ]);

        return back()
            ->with('status', 'api-key-updated')
            ->with('plain-key', $plainKey);
    }
}
