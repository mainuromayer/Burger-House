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
    
        // File path
        $yearMonth = "uploads/" . date("Y") . "/" . date("m") . "/";
        $path_with_dir = config('app.upload_doc_path') . $yearMonth;
    
        if (!file_exists($path_with_dir)) {
            mkdir($path_with_dir, 0777, true);
        }
    
        // Handle base64 image
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
            'footer_background' => 'footer_background_base64',
        ];
    
        foreach ($singleImageFields as $field => $inputKey) {
            if ($request->has($inputKey)) {
                if ($path = $handleBase64Image($request->$inputKey, $field)) {
                    $homePage->$field = $path;
                    $dataChanged = true;
                }
            }
        }
    
        // === TEXT / NON-IMAGE FIELDS ===
        $fields = [
            'call_delivery_number',
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
            'footer_copyright',
            'location',
            'email',
            'instagram',
            'facebook',
            'twitter',
            'whatsapp',
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
    
        // === MULTIPLE IMAGE FIELDS ===
    
        // BANNER GRID IMAGES
        if ($request->has('banner_grid_image_base64')) {
            $gridImages = [];
            foreach ($request->banner_grid_image_base64 as $index => $base64) {
                $gridImages[] = !empty($base64)
                    ? $handleBase64Image($base64, 'banner_grid')
                    : ($request->banner_grid_image[$index] ?? null);
            }
    
            $encoded = json_encode($gridImages);
            if ($homePage->banner_grid_image !== $encoded) {
                $homePage->banner_grid_image = $encoded;
                $dataChanged = true;
            }
        }
    
        // BANNER IMAGES
        if ($request->has('banner_image_base64')) {
            $menuImages = [];
            foreach ($request->banner_image_base64 as $index => $base64) {
                $menuImages[] = !empty($base64)
                    ? $handleBase64Image($base64, 'menu_slider')
                    : ($request->banner_image[$index] ?? null);
            }
    
            $encoded = json_encode($menuImages);
            if ($homePage->banner_image !== $encoded) {
                $homePage->banner_image = $encoded;
                $dataChanged = true;
            }
        }
    
        // BANNER GRID IMAGES
        if ($request->has('banner_grid_base64')) {
            $menuImages = [];
            foreach ($request->banner_grid_base64 as $index => $base64) {
                $menuImages[] = !empty($base64)
                    ? $handleBase64Image($base64, 'banner_grid')
                    : ($request->banner_grid[$index] ?? null);
            }
    
            $encoded = json_encode($menuImages);
            if ($homePage->banner_grid !== $encoded) {
                $homePage->banner_grid = $encoded;
                $dataChanged = true;
            }
        }

        // MENU SLIDER ITEM IMAGES
        if ($request->has('menu_slider_item_image_base64')) {
            $menuImages = [];
            foreach ($request->menu_slider_item_image_base64 as $index => $base64) {
                $menuImages[] = !empty($base64)
                    ? $handleBase64Image($base64, 'menu_slider')
                    : ($request->menu_slider_item_image[$index] ?? null);
            }
    
            $encoded = json_encode($menuImages);
            if ($homePage->menu_slider_item_image !== $encoded) {
                $homePage->menu_slider_item_image = $encoded;
                $dataChanged = true;
            }
        }
    
        // EVENTS ITEM IMAGES
        if ($request->has('events_item_image_base64')) {
            $eventImages = [];
            foreach ($request->events_item_image_base64 as $index => $base64) {
                $eventImages[] = !empty($base64)
                    ? $handleBase64Image($base64, 'event')
                    : ($request->events_item_image[$index] ?? null);
            }
    
            $encoded = json_encode($eventImages);
            if ($homePage->events_item_image !== $encoded) {
                $homePage->events_item_image = $encoded;
                $dataChanged = true;
            }
        }
    
        // PHOTO GALLERY IMAGES
        if ($request->has('photo_gallery_base64')) {
            $galleryImages = [];
            foreach ($request->photo_gallery_base64 as $index => $base64) {
                $galleryImages[] = !empty($base64)
                    ? $handleBase64Image($base64, 'gallery')
                    : ($request->photo_gallery[$index] ?? null);
            }
    
            $encoded = json_encode($galleryImages);
            if ($homePage->photo_gallery !== $encoded) {
                $homePage->photo_gallery = $encoded;
                $dataChanged = true;
            }
        }
    
        // === SAVE IF CHANGES ===
        if ($dataChanged) {
            $homePage->save();
            return back()->with('success', 'Home page updated successfully.');
        } else {
            return back()->with('info', 'No changes detected.');
        }
    }
    




}
