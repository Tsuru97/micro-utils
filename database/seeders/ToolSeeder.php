<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Tool;
use App\Models\SeoMeta;
use Illuminate\Support\Facades\File;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [];
        $dataDirectory = database_path('seeders/data/categories');

        if (File::exists($dataDirectory)) {
            $files = File::allFiles($dataDirectory);
            foreach ($files as $file) {
                if ($file->getExtension() === 'php') {
                    $categories[] = require $file->getRealPath();
                }
            }
        }

        foreach ($categories as $categoryData) {
            $toolsData = $categoryData['tools'] ?? [];
            unset($categoryData['tools']);

            $category = Category::updateOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );

            foreach ($toolsData as $toolData) {
                $seoData = $toolData['seo'] ?? null;
                unset($toolData['seo']);

                $toolData['category_id'] = $category->id;

                $tool = Tool::updateOrCreate(
                    ['slug' => $toolData['slug']],
                    $toolData
                );

                if ($seoData) {
                    $seoData['tool_id'] = $tool->id;
                    SeoMeta::updateOrCreate(
                        ['tool_id' => $tool->id],
                        $seoData
                    );
                }
            }
        }
    }
}
