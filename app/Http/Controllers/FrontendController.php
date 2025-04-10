<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
// use App\Modules\Committee\Models\CommitteeType;
use Illuminate\Support\Facades\DB;
use App\Modules\Event\Models\Event;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Modules\Committee\Models\Committee;
use App\Modules\Instructor\Models\Instructor;

class FrontendController extends Controller
{

    public function home()
    {
        try {
            return view('frontend.pages.home');
        } catch (Exception $e) {
            Log::error("Error occurred in FrontendController@home ({$e->getFile()}:{$e->getLine()}): {$e->getMessage()}");
            return view('frontend.index', ['error' => 'Unable to retrieve frontend data.']);
        }
    }

}
