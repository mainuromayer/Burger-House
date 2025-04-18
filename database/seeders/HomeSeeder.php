<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Modules\HomePage\Models\HomePage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeSeeder extends Seeder
{
    public function run(): void
    {
        HomePage::create([
            'logo' => '/assets-2/img/logo.png',
            'call_delivery_number' => '+4 450 68 7474',
            'banner_subtitle' => json_encode([
                'It is a good time for the great taste of burgers',
                'It is a good time for the great taste of burgers',
                'It is a good time for the great taste of burgers'
            ]),
            'banner_title' => json_encode(['Special Burger 1', 'Special Burger 2', 'Special Burger 3']),
            'banner_image' => json_encode([
                '/assets-2/img/banner/625x490.jpg',
                'assets-2/img/banner/625x490.jpg',
                'assets-2/img/banner/625x490.jpg'
            ]),
            'banner_price_off' => json_encode(['20', '30', '40']),
            'banner_grid_subject' => json_encode(['Try it today', 'Try it today', 'Try it today']),
            'banner_grid_title' => json_encode(['Most popular banner', 'More fun more taste', 'Fresh & Chili']),
            'banner_grid_image' => json_encode([
                '/assets-2/img/banner-grid/555x180.jpg',
                '/assets-2/img/banner-grid/555x180.jpg',
                '/assets-2/img/banner-grid/555x180.jpg'
            ]),
            'section_label' => json_encode([
                'Always Tasty Burger', 'Always Tasty Burger', 'Always Tasty', 'Always', 'Reservation'
            ]),
            'section_title' => json_encode([
                'Choose & Enjoy', 'Choose & Enjoy', 'Choose & Enjoy', 'Choose & Enjoy', 'Book Your Table', 'Book Your Table'
            ]),
            'section_subtitle' => json_encode([
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ]),
            'menu_slider_item_image' => json_encode([
                '/assets-2/img/menu-slider/410x270.jpg',
                '/assets-2/img/menu-slider/410x270.jpg',
                '/assets-2/img/menu-slider/410x270.jpg',
                '/assets-2/img/menu-slider/410x270.jpg',
                '/assets-2/img/menu-slider/410x270.jpg',
                '/assets-2/img/menu-slider/410x270.jpg'
            ]),
            'menu_slider_item_title' => json_encode([
                'Hamburger1', 'Hamburger2', 'Hamburger3', 'Hamburger4', 'Hamburger5', 'Hamburger6'
            ]),
            'menu_slider_item_subtitle' => json_encode([
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do'
            ]),
            'events_section_label' => json_encode([
                'Always Tasty Burger', 'Always Tasty Burger', 'Always Tasty', 'Always', 'Reservation'
            ]),
            'events_section_title' => json_encode([
                'Choose & Enjoy', 'Choose & Enjoy', 'Choose & Enjoy', 'Choose & Enjoy', 'Book Your Table', 'Book Your Table'
            ]),
            'events_section_subtitle' => json_encode([
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ]),
            'events_item_image' => json_encode([
                '/assets-2/img/events/575x445.jpg',
                '/assets-2/img/events/575x445.jpg',
                '/assets-2/img/events/575x445.jpg',
                '/assets-2/img/events/575x445.jpg',
                '/assets-2/img/events/575x445.jpg'
            ]),
            'photo_gallery' => json_encode([
                '/assets-2/img/gallery/placeholder-1280x853.png',
                '/assets-2/img/gallery/placeholder-1280x853.png',
                '/assets-2/img/gallery/placeholder-1280x853.png',
                '/assets-2/img/gallery/placeholder-1280x853.png',
                '/assets-2/img/gallery/placeholder-1280x853.png',
                '/assets-2/img/gallery/placeholder-1280x853.png',
                '/assets-2/img/gallery/placeholder-1280x853.png',
                '/assets-2/img/gallery/placeholder-1280x853.png'
            ]),
            'footer_background' => '/assets-2/img/1350x540.jpg',
            'footer_logo' => 'assets-2/img/logo-footer.png',
            'footer_desc' => 'Your trusted platform for quality services.',
            'footer_copyright' => '© Burger House 2025. All rights reserved.',
            'location' => '123 Burger Street, Food City, USA',
            'email' => 'contact@burgerhouse.com',
            'instagram' => 'https://instagram.com/',
            'facebook' => 'https://facebook.com/',
            'twitter' => 'https://twitter.com/',
            'whatsapp' => '+1234567890',
            'menu_list' => json_encode(['header', 'menu', 'events', 'reservation', 'gallery', 'contact']),
        ]);
    }
}
