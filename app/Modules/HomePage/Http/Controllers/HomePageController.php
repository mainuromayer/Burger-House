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

        // File storage path
        $yearMonth = "uploads/" . date("Y") . "/" . date("m") . "/";
        $path_with_dir = config('app.upload_doc_path') . $yearMonth;

        if (!file_exists($path_with_dir)) {
            mkdir($path_with_dir, 0777, true);
        }

        // Helper for saving base64 image
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

        // Handle logo
        if ($path = $handleBase64Image($request->logo_base64, 'logo')) {
            $homePage->logo = $path;
            $dataChanged = true;
        }

        // Handle footer logo
        if ($path = $handleBase64Image($request->footer_logo_base64, 'footer_logo')) {
            $homePage->footer_logo = $path;
            $dataChanged = true;
        }

        // Fields containing SINGLE base64 image, stored as JSON string
        $imageFields = [
            'banner_image',
            'banner_grid_image',
            'menu_slider_item_image',
            'events_item_image',
            'photo_gallery'
        ];

        foreach ($imageFields as $field) {
            if ($request->has($field)) {
                $base64 = $request->$field;
                if ($path = $handleBase64Image($base64, $field)) {
                    $homePage->$field = json_encode($path);  // ← stored as JSON string
                    $dataChanged = true;
                }
            }
        }

        // Handle photo_gallery (array of base64 strings), store as JSON array
        if ($request->has('photo_gallery') && is_array($request->photo_gallery)) {
            $paths = [];
            foreach ($request->photo_gallery as $base64Img) {
                if ($path = $handleBase64Image($base64Img, 'gallery')) {
                    $paths[] = $path;
                }
            }
            if (!empty($paths)) {
                $homePage->photo_gallery = json_encode($paths); // ← JSON array
                $dataChanged = true;
            }
        }

        // Other non-image fields
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
