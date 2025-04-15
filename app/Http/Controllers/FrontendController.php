<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
// use App\Modules\Committee\Models\CommitteeType;
use Illuminate\Support\Facades\DB;
use App\Modules\Event\Models\Event;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Modules\HomePage\Models\HomePage;
use App\Modules\Committee\Models\Committee;
use App\Modules\Instructor\Models\Instructor;

class FrontendController extends Controller
{

    public function home()
    {
        try {
            $homePage = HomePage::first();
            $data = $homePage ? $homePage->toArray() : [];
    
            // Decode JSON fields
            $jsonFields = [
                'banner_subtitle',
                'banner_title',
                'banner_image',
                'banner_price_off',
                'banner_grid_subject',
                'banner_grid_title',
                'banner_grid_image',
                'section_label',
                'section_title',
                'section_subtitle',
                'menu_slider_item_image',
                'menu_slider_item_title',
                'menu_slider_item_subtitle',
                'events_section_label',
                'events_section_title',
                'events_section_subtitle',
                'events_item_image',
                'photo_gallery',
                'menu_list'
            ];
    
            foreach ($jsonFields as $field) {
                $data[$field] = isset($data[$field]) ? json_decode($data[$field], true) : [];
            }
            return view('frontend.pages.home', compact('homePage', 'data'));
        } catch (Exception $e) {
            Log::error("Error occurred in FrontendController@home ({$e->getFile()}:{$e->getLine()}): {$e->getMessage()}");
            return view('frontend.index', ['error' => 'Unable to retrieve frontend data.']);
        }
    }


    public function reservation (Request $request){
        // ...
    }
}
