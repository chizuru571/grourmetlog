<?php

namespace App\Http\Controllers;

use App\Models\Gourmet;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvDownloadController extends Controller
{
    public function downloadCsv()
    {
        $gourmet = Gourmet::all();
        $csvHeader = ['id', 'shop_name', 'name_katakana','category_id','review','food_picture','map_url','tel','comment','created_at', 'updated_at'];
        $csvData = $gourmet->toArray();

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="category.csv"',
        ]);

        return $response;
    }
}
