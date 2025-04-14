<?php

namespace App\Modules\HomePage\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Libraries\ImageProcessing;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Modules\HomePage\Models\HomePage;


class HomePageController extends Controller
{
    // Show homepage content
    public function index(): View
    {
        $homePage = HomePage::first();
        $data = $homePage ? $homePage->toArray() : [];

        return view('HomePage::index', compact('homePage', 'data'));
    }

    // Update homepage content
    public function store(Request $request)
    {
        $homePage = HomePage::first() ?? new HomePage();
        $dataChanged = false;
    
        // Define upload directory
        $yearMonth = "uploads/" . date("Y") . "/" . date("m") . "/";
        $path_with_dir = config('app.upload_doc_path') . $yearMonth;
    
        if (!file_exists($path_with_dir)) {
            mkdir($path_with_dir, 0777, true);
        }
    
        // Base64 image processing helper
        $handleBase64Image = function ($base64, $prefix = 'img') use ($path_with_dir, $yearMonth) {
            if (!empty($base64) && is_string($base64) && str_contains($base64, ',')) {
                [, $imageData] = explode(',', $base64, 2);
                $resized = base64_encode(ImageProcessing::resizeBase64Image($imageData, 300, 300));
                $decodedImage = base64_decode($resized);
                $imgName = time() . '_' . $prefix . '_' . uniqid() . '.jpeg';
                file_put_contents($path_with_dir . $imgName, $decodedImage);
                return $yearMonth . $imgName;
            }
            return null;
        };
    
        // === SINGLE IMAGE FIELDS ===
        $singleImageFields = [
            'logo' => 'logo_base64',
            'footer_logo' => 'footer_logo_base64',
        ];
    
        foreach ($singleImageFields as $field => $inputKey) {
            if ($request->has($inputKey)) {
                if ($path = $handleBase64Image($request->$inputKey, $field)) {
                    $homePage->$field = $path;
                    $dataChanged = true;
                }
            }
        }
    
        // === MULTI IMAGE FIELDS AS JSON ARRAYS ===
        $multiImageFields = [
            'banner_image' => 'banner_image_base64',
            'banner_grid_image' => 'banner_grid_image_base64',
            'menu_slider_item_image' => 'menu_slider_item_image_base64',
            'events_item_image' => 'events_item_image_base64',
            'photo_gallery' => 'photo_gallery_base64',
        ];
    
        foreach ($multiImageFields as $field => $inputKey) {
            if ($request->has($inputKey) && is_array($request->$inputKey)) {
                $newPaths = [];
    
                foreach ($request->$inputKey as $base64Img) {
                    if ($path = $handleBase64Image($base64Img, $field)) {
                        $newPaths[] = $path;
                    }
                }
    
                if (!empty($newPaths)) {
                    $existingPaths = $homePage->$field ? json_decode($homePage->$field, true) : [];
                    $mergedPaths = array_merge($existingPaths, $newPaths);
                    $homePage->$field = json_encode($mergedPaths);
                    $dataChanged = true;
                }
            }
        }
    
        // === TEXT FIELDS & JSON TEXT ===
        $fields = [
            'call_delivery_number',
            'banner_subtitle',
            'banner_title',
            'banner_price_off',
            'banner_grid_subject',
            'banner_grid_title',
            'section_label',
            'section_title',
            'section_subtitle',
            'menu_slider_item_title',
            'menu_slider_item_subtitle',
            'events_section_label',
            'events_section_title',
            'events_section_subtitle',
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
    
        foreach ($fields as $field) {
            if ($request->has($field)) {
                $newValue = $request->$field;
    
                if (is_array($newValue)) {
                    $newValue = json_encode($newValue);
                }
    
                if ($homePage->$field !== $newValue) {
                    $homePage->$field = $newValue;
                    $dataChanged = true;
                }
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
