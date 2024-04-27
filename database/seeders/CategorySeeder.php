<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                /**
                 *          'Technology',
                 *         Health & Wellness
                 * Travel & Adventure
                 * Finance & Investing
                 * Art & Culture
                 * >'Science & Nature
                 * Food & Cooking
                 * Business & Entrepreneurship
                 * Sports & Fitness
                 * Education & Learning

                 *
                 */
                'name'=>'Technology',
                'slug'=>'technology',
                'title'=>'Technology News and Updates',
                'meta_title'=>'Latest in Technology: News, Trends, and Innovations',
                'meta_description'=>'Stay updated with the latest technology news, trends, and innovations from around the world.',
                'meta_keywords'=>'technology, tech news, innovation, trends, gadgets',
            ],
            [
                'name'=>'Health & Wellness',
                'slug'=>'health-wellness',
                'title'=>'Health and Wellness Tips',
                'meta_title'=>'Enhance Your Well-being: Health and Wellness Tips',
                'meta_description'=>'Discover tips and advice for improving your physical and mental well-being. Stay healthy and happy!',
                'meta_keywords'=>'health, wellness, fitness, mental health, nutrition',
            ],
            [
                'name'=>'Travel & Adventure',
                'slug'=>'travel-adventure',
                'title'=>'Explore the World: Travel and Adventure',
                'meta_title'=>'Embark on Adventures: Travel Tips and Experiences',
                'meta_description'=>'Get inspired to explore new destinations and embark on exciting adventures around the globe.',
                'meta_keywords'=>'travel, adventure, destinations, travel tips, experiences',
            ],
            [
                'name'=>'Finance & Investing',
                'slug'=>'finance-investing',
                'title'=>'Financial Insights and Investing Tips',
                'meta_title'=>'Navigate Financial Markets: Insights and Tips for Investors',
                'meta_description'=>'Learn about financial markets, investment strategies, and smart money management tips.',
                'meta_keywords'=>'finance, investing, stocks, investment strategies, personal finance',
            ],
            [
                'name'=>'Art & Culture',
                'slug'=>'art-culture',
                'title'=>'Appreciating Art and Culture',
                'meta_title'=>'Dive into Culture: Art, Music, and Literature',
                'meta_description'=>'Immerse yourself in the world of art, music, literature, and cultural expressions from diverse backgrounds.',
                'meta_keywords'=>'art, culture, literature, music, cultural expressions',
            ],
            [
                'name'=>'Science & Nature',
                'slug'=>'science-nature',
                'title'=>'Exploring Science and Nature',
                'meta_title'=>'Discover the Wonders of Science and Nature',
                'meta_description'=>'Explore the mysteries of science and the beauty of nature through fascinating discoveries and phenomena.',
                'meta_keywords'=>'science, nature, environment, wildlife, discoveries',
            ],
            [
                'name'=>'Food & Cooking',
                'slug'=>'food-cooking',
                'title'=>'Culinary Delights and Cooking Adventures',
                'meta_title'=>'Indulge in Culinary Delights: Recipes and Cooking Tips',
                'meta_description'=>'Delve into the world of gastronomy with mouthwatering recipes and cooking tips from culinary experts.',
                'meta_keywords'=>'food, cooking, recipes, gastronomy, culinary tips',
            ],
            [
                'name'=>'Business & Entrepreneurship',
                'slug'=>'business-entrepreneurship',
                'title'=>'Business Strategies and Entrepreneurial Insights',
                'meta_title'=>'Master Business and Entrepreneurship: Strategies and Insights',
                'meta_description'=>'Gain valuable insights into business strategies, entrepreneurship, and leadership skills for success.',
                'meta_keywords'=>'business, entrepreneurship, leadership, startups, business strategies',
            ],
            [
                'name'=>'Sports & Fitness',
                'slug'=>'sports-fitness',
                'title'=>'Sports News and Fitness Tips',
                'meta_title'=>'Stay Active and Informed: Sports News and Fitness Tips',
                'meta_description'=>'Stay updated with the latest sports news and get expert tips for maintaining an active lifestyle.',
                'meta_keywords'=>'sports, fitness, exercise, sports news, workout tips',
            ],
            [
                'name'=>'Education & Learning',
                'slug'=>'education-learning',
                'title'=>'Learning Resources and Educational Insights',
                'meta_title'=>'Unlock Your Potential: Learning Resources and Insights',
                'meta_description'=>'Explore educational resources and gain valuable insights into learning methodologies and skill development.',
                'meta_keywords'=>'education, learning, e-learning, skill development, educational resources',
            ],
            [
                'name' => 'Intimacy & Relationships',
                'slug' => 'intimacy-relationships',
                'title' => 'Intimacy & Relationships Articles',
                'meta_title' => 'Explore Intimacy & Relationships: Tips, Advice, and Discussions',
                'meta_description' => 'Discover articles offering tips, advice, and discussions on improving intimacy and relationships.',
                'meta_keywords' => 'intimacy, relationships, love, sexual health, tips, advice',
            ]
            
        ]);
        
    }
}
