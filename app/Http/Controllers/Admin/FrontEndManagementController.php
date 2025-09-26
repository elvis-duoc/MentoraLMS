<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend;
use Illuminate\Http\Request;
use File;

class FrontEndManagementController extends Controller
{
    public function index()
    {
        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);

        return view('admin.frontend-management.index', compact('sections'));
    }

    public function section($key)
    {
        $lang_code = request('lang_code', 'en');

        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);

        if (!isset($sections[$key])) {
            abort(404, "Section not found for key: $key");
        }

        $section = $sections[$key];
        $contentType = isset($section['content']) ? 'content' : (isset($section['element']) ? 'element' : null);

        if (!$contentType) {
            abort(404, "Content or Element not found for section: $key");
        }

        $dataKeys = $key . '.' . $contentType;
        $content = $section[$contentType];

        // Get frontend data
        $frontend = Frontend::where('data_keys', $dataKeys)->first();

        if ($lang_code === 'en') {
            // For English, get data directly from data_values
            $dataValues = $frontend ? $frontend->data_values : [];
        } else {
            if ($frontend) {
                // Get translations array
                $translations = json_decode($frontend->data_translations, true) ?? [];

                // Find translation for current language
                $translation = collect($translations)->first(function ($item) use ($lang_code) {
                    return $item['language_code'] === $lang_code;
                });

                if ($translation) {
                    // Use existing translation
                    $dataValues = $translation['values'];

                    // Save updated translations
                    $frontend->data_translations = json_encode($translations);
                    $frontend->save();
                } else {
                    // Create new translation entry with data_values

                    $dataValues = $frontend->data_values;
                    // Data Translation $key
                    // Exclude images from translations
                    unset($dataValues['images']);

                    // Add new language entry to translations
                    $translations[] = [
                        'language_code' => $lang_code,
                        'values' => $frontend->data_values
                    ];

                    // Save updated translations
                    $frontend->data_translations = json_encode($translations);
                    $frontend->save();
                }
            } else {
                $dataValues = [];
            }
        }

        // Count images
        $imageCount = isset($content['images']) ? count($content['images']) : 0;

        $page_title = $section['name'] ?? trans('translate.Frontend Management');


        return view('admin.frontend-management.edit', compact('page_title','key', 'content', 'dataValues', 'frontend', 'contentType', 'imageCount', 'lang_code'));
    }

    public function store(Request $request, $key, $id = null)
    {

        // Get and validate language code first
        $lang_code = $request->get('lang_code');

        if (!$lang_code) {
            return back()->with('error', 'Language code is required');
        }

        // Load the settings JSON file
        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);

        // Check if the section exists in the JSON file
        if (!isset($sections[$key])) {
            abort(404, "Section not found for key: $key");
        }

        $section = $sections[$key];
        $contentType = isset($section['content']) ? 'content' : (isset($section['element']) ? 'element' : null);

        if (!$contentType) {
            abort(404, "Content or Element not found for section: $key");
        }

        $dataKeys = $key . '.' . $contentType;
        $data = $request->except(['_token', '_method', 'type','lang_code']);
        $frontend = $id ? Frontend::findOrFail($id) : new Frontend();

        // Get existing translations or initialize empty array
        $translations = json_decode($frontend->data_translations, true) ?? [];

        // Separate text data from images
        $textData = [];
        $imageData = [];

        // Handle image uploads - only process images for default language (en)
        if ($lang_code === 'en' && isset($section[$contentType]['images'])) {
            foreach ($section[$contentType]['images'] as $imageKey => $imageDetails) {
                if ($request->hasFile($imageKey)) {
                    $image = $request->file($imageKey);
                    $imageName = time() . '_' . $imageKey . '.' . $image->getClientOriginalExtension();
                    $oldFile = $frontend->data_values['images'][$imageKey] ?? null;

                    if ($oldFile && File::exists(public_path($oldFile))) {
                        unlink(public_path($oldFile));
                    }

                    $image->move(public_path('uploads/website-images'), $imageName);
                    $imageData[$imageKey] = 'uploads/website-images/' . $imageName;
                } elseif (isset($frontend->data_values['images'][$imageKey])) {
                    $imageData[$imageKey] = $frontend->data_values['images'][$imageKey];
                }
            }
        }

        // Separate text data from the request
        foreach ($data as $key => $value) {
            if ($key !== 'images') {
                $textData[$key] = $value;
            }
        }

        // Log language code and data for debugging
        \Log::info('Updating content for language: ' . $lang_code);
        \Log::info('Text Data:', $textData);

        // Handle data updates based on language
        if ($lang_code === 'en') {
            // For English, update both data_values and translations
            $finalData = $textData;
            if (!empty($imageData)) {
                $finalData['images'] = $imageData;
            } elseif (isset($frontend->data_values['images'])) {
                $finalData['images'] = $frontend->data_values['images'];
            }

            $frontend->data_values = $finalData;

            // Update or add English translation
            $translationExists = false;
            foreach ($translations as $key => $translation) {
                if ($translation['language_code'] === 'en') {
                    $translations[$key]['values'] = $textData;
                    $translationExists = true;
                    break;
                }
            }

            if (!$translationExists) {
                $translations[] = [
                    'language_code' => 'en',
                    'values' => $textData
                ];
            }
        } else {
            // For non-English languages, only update translations
            $translationExists = false;

            foreach ($translations as $key => $translation) {
                if ($translation['language_code'] === $lang_code) {
                    $translations[$key]['values'] = $textData;
                    $translationExists = true;
                    \Log::info('Updating existing translation for: ' . $lang_code);
                    break;
                }
            }

            if (!$translationExists) {
                $translations[] = [
                    'language_code' => $lang_code,
                    'values' => $textData
                ];
                \Log::info('Creating new translation for: ' . $lang_code);
            }

            // Handle new records without English data
            if (empty($frontend->data_values)) {
                $frontend->data_values = [
                    'images' => $imageData
                ];

                // Add default English translation if not exists
                $hasEnglishTranslation = false;
                foreach ($translations as $translation) {
                    if ($translation['language_code'] === 'en') {
                        $hasEnglishTranslation = true;
                        break;
                    }
                }

                if (!$hasEnglishTranslation) {
                    $translations[] = [
                        'language_code' => 'en',
                        'values' => []
                    ];
                }
            }
        }

        // Set data_keys if it's a new record
        if (!$frontend->data_keys) {
            $frontend->data_keys = $dataKeys;
        }

        // Save the updated translations
        $frontend->data_translations = json_encode($translations);

        // Log final translations for verification
        \Log::info('Final translations:', ['translations' => $translations]);

        $frontend->save();

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }}
