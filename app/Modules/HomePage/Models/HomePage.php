<?php

namespace App\Modules\HomePage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $table = 'home_pages';

    protected $fillable = [
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
        'events_section_label',
        'events_section_title',
        'events_section_subtitle',
        'events_item_image',
        'photo_gallery',
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

    
    

}
