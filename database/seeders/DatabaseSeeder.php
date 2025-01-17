<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

         // Seeder voor Profielen
         DB::table('users')->updateOrInsert(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'Admin',
                'email' => 'admin@ehb.be',
                'password' => Hash::make('Password!321'),
                'usertype' => 'admin',
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'testuser@example.com'],
            [
                'name' => 'TestUser',
                'email' => 'testuser@example.com',
                'password' => Hash::make('TestPassword123'),
                'usertype' => 'user',
            ]
        );

        // Seeder voor FAQ Categories
        DB::table('faq_categories')->insert([
            [
                'name' => 'General',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'About Us',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Last products',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder voor Faqs
        DB::table('faqs')->insert([
            [
                'question' => 'What is this platform?',
                'answer' => 'This platform provides information and services for our users.',
                'faq_category_id' => 1, // General
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Who are we?',
                'answer' => 'We are a team dedicated to providing the best user experience.',
                'faq_category_id' => 2, // About Us
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        // Seeder voor Nieuws (News)
        DB::table('news')->insert([
            [
                'title' => 'New Features Released',
                'description' => 'We are excited to announce new features.',
                'image' => 'images/REF101-NYL-CTLG.jpg', 
                'publish_date' => now()->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder voor Nieuws Reacties (News Comments)
        DB::table('news_comments')->insert([
            [
                'news_id' => 1,
                'user_id' => 2,
                'content' => 'This is amazing news!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder voor Berichten (Messages)
        DB::table('messages')->insert([
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'body' => 'Hello user! How are you?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder voor Contactberichten (Contact Messages)
        DB::table('contact_messages')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone' => '1234567890',
                'message' => 'I have a question about your services.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder voor Reacties (Comments)
        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'profile_id' => 2,
                'body' => 'Great profile!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
