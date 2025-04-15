<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('call_delivery_number');

            $table->json('banner_subtitle')->nullable();
            $table->json('banner_title')->nullable();
            $table->json('banner_image')->nullable();
            $table->json('banner_price_off')->nullable();

            $table->json('banner_grid_subject')->nullable();
            $table->json('banner_grid_title')->nullable();
            $table->json('banner_grid_image')->nullable();

            $table->json('section_label')->nullable();
            $table->json('section_title')->nullable();
            $table->json('section_subtitle')->nullable();

            $table->json('menu_slider_item_image')->nullable();
            $table->json('menu_slider_item_title')->nullable();
            $table->json('menu_slider_item_subtitle')->nullable();

            
            $table->json('events_section_label')->nullable();
            $table->json('events_section_title')->nullable();
            $table->json('events_section_subtitle')->nullable();
            $table->json('events_item_image')->nullable();

            $table->json('photo_gallery')->nullable();
            
            $table->string('footer_background');
            $table->string('footer_logo');
            $table->text('footer_desc');
            $table->string('footer_copyright');

            $table->string('location')->nullable();
            $table->string('email')->nullable();

            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();

            $table->json('menu_list')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
