<?php

namespace App\Modules\HomePage\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Modules\HomePage\Models\HomePage;
use Illuminate\Support\Arr;


class HomePageController extends Controller
{
    // Show homepage content
    public function index(): View
    {
        $homePage = HomePage::first();
        return view('HomePage::index', compact('homePage'));
    }

    // Update homepage content
    public function store(Request $request)
    {
        $homePage = HomePage::first() ?? new HomePage();
    
        $original = $homePage->getAttributes();
    
        $fields = [
            'logo',
            'call_delivery_number',
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
            'events_item_image',
            'fancybox',
            'footer_logo',
            'footer_desc',
            'footer_contact_text',
            'footer_copyright',
            'instagram',
            'facebook',
            'twitter',
            'whatsapp',
            'popup_title_upper',
            'map',
            'menu_list',
        ];
    
        $dataChanged = false;
    
        foreach ($fields as $field) {
            $newValue = $request->has($field) ? $request->$field : $homePage->$field;
    
            if (is_array($newValue)) {
                $newValue = json_encode($newValue);
            }
    
            if ($homePage->$field !== $newValue) {
                $homePage->$field = $newValue;
                $dataChanged = true;
            }
        }
    
        if ($dataChanged) {
            $homePage->save();
            return back()->with('success', 'Home page content updated successfully.');
        } else {
            return back()->with('info', 'No changes detected.');
        }
    }
}
