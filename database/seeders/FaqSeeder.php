<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        // Update de categorie naar Engels
        $category = FaqCategory::updateOrCreate(['id' => 1], ['name' => 'General']);

        // Update de vraag en het antwoord naar Engels
        Faq::updateOrCreate(
            ['id' => 1],
            [
                'question' => 'How can I log in?',
                'answer' => 'Use your email address and password to log in.',
                'faq_category_id' => $category->id,
            ]
        );
    }
}
