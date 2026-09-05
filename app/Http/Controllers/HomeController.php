<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the public real estate homepage.
     */
    public function index()
    {
        $isUnlocked = session('prices_unlocked', false);

        $plotModels = Plot::available()->take(4)->get();
        if ($plotModels->isEmpty()) {
            $plotModels = Plot::take(4)->get();
        }

        $plots = $plotModels->map(function ($plot) use ($isUnlocked) {
            $data = [
                'id' => (string) $plot->id,
                'number' => $plot->plot_number,
                'title' => $plot->title ?? ($plot->plot_number . ', ' . round($plot->size_sq_yards) . ' Sq. Yds'),
                'size_sq_yards' => (float) $plot->size_sq_yards,
                'area' => $plot->area,
                'dimensions' => $plot->boundary_dimensions ?? "36'0\" × 45'0\"",
                'facing' => $plot->facing ?? 'East',
                'road_width' => $plot->road_width,
                'status' => strtolower($plot->status ?? 'available'),
                'is_vaastu_compliant' => (bool) ($plot->is_vaastu_compliant ?? true),
                'image' => $plot->image_url,
                'is_price_unlocked' => $isUnlocked,
            ];

            if ($isUnlocked) {
                $data['price'] = $plot->formatted_price;
                $data['exact_price'] = $plot->formatted_exact_price;
                $data['price_per_sq_yard'] = (float) $plot->price_per_sq_yard;
            }

            return $data;
        })->all();

        return view('home', compact('plots', 'isUnlocked'));
    }
}
