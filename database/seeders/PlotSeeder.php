<?php

namespace Database\Seeders;

use App\Models\Plot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotSeeder extends Seeder
{
    /**
     * Run the database seeds for all 158 authentic plots of RRR Prekshitha Enclave.
     */
    public function run(): void
    {
        // Define base rates
        $rateCommercial = 16999.00;
        $rateCorner     = 15499.00;
        $rateVilla      = 14999.00;
        $rateEstate     = 15999.00;

        // Raw specification array for all 158 plots from the authentic layout drawing
        // Format: [plot_num, size, facing, road_width, dims, type, status]
        $rawPlots = [
            // --- EAST HIGHWAY & COMMERCIAL BLOCK (Plots 1 - 15) ---
            [1, 1058, 'East', 100, "109'6\" × 59'9\"", 'commercial', 'sold'],
            [2, 732,  'East', 100, "110'5\" × 60'0\"", 'commercial', 'available'],
            [3, 738,  'East', 100, "111'3\" × 60'0\"", 'commercial', 'reserved'],
            [4, 744,  'East', 100, "112'2\" × 60'0\"", 'corner',     'available'],
            [5, 829,  'East', 100, "113'9\" × 65'11\"", 'corner',     'available'],
            [6, 761,  'East', 100, "114'8\" × 60'0\"", 'commercial', 'sold'],
            [7, 767,  'East', 100, "115'7\" × 58'11\"", 'commercial', 'available'],
            [8, 566,  'West', 30,  "85'0\" × 60'0\"",  'commercial', 'available'],
            [9, 566,  'West', 30,  "85'0\" × 60'0\"",  'commercial', 'reserved'],
            [10, 623, 'West', 30,  "85'0\" × 66'0\"",  'corner',     'sold'],
            [11, 566, 'West', 30,  "85'0\" × 60'0\"",  'corner',     'available'],
            [12, 566, 'West', 30,  "85'0\" × 60'0\"",  'commercial', 'available'],
            [13, 566, 'West', 30,  "85'0\" × 60'0\"",  'commercial', 'sold'],
            [14, 566, 'West', 30,  "85'0\" × 60'0\"",  'commercial', 'available'],
            [15, 639, 'West', 30,  "85'0\" × 70'0\"",  'commercial', 'reserved'],

            // --- BLOCK 2 (Plots 16 - 51) ---
            // South sector: Plots 16 - 25 (East facing)
            [16, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [17, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [18, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'sold'],
            [19, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [20, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'reserved'],
            [21, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [22, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'sold'],
            [23, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [24, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [25, 244, 'East', 40, "55'0\" × 40'0\"", 'corner',  'available'],
            // North sector: Plots 26 - 33 (East facing)
            [26, 244, 'East', 40, "55'0\" × 40'0\"", 'corner',  'sold'],
            [27, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [28, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [29, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'reserved'],
            [30, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [31, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'sold'],
            [32, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [33, 183, 'East', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            // North sector: Plots 34 - 41 (West facing)
            [34, 199, 'West', 30, "55'0\" × 32'6\"", 'regular', 'available'],
            [35, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'sold'],
            [36, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [37, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [38, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'reserved'],
            [39, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [40, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'sold'],
            [41, 244, 'West', 40, "55'0\" × 40'0\"", 'corner',  'available'],
            // South sector: Plots 42 - 51 (West facing)
            [42, 244, 'West', 40, "55'0\" × 40'0\"", 'corner',  'available'],
            [43, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'sold'],
            [44, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [45, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [46, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'reserved'],
            [47, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [48, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [49, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'sold'],
            [50, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'available'],
            [51, 183, 'West', 30, "55'0\" × 30'0\"", 'regular', 'available'],

            // --- BLOCK 3 (Plots 52 - 87) ---
            // South sector: Plots 52 - 61 (East facing)
            [52, 159, 'East', 30, "45'10\" × 30'0\"", 'regular', 'available'],
            [53, 181, 'East', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [54, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'sold'],
            [55, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [56, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'reserved'],
            [57, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [58, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [59, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'sold'],
            [60, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [61, 244, 'East', 40, "55'0\" × 40'0\"",  'corner',  'available'],
            // North sector: Plots 62 - 69 (East facing)
            [62, 244, 'East', 40, "55'0\" × 40'0\"",  'corner',  'available'],
            [63, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'sold'],
            [64, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [65, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [66, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'reserved'],
            [67, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [68, 183, 'East', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [69, 223, 'East', 30, "55'0\" × 36'6\"",  'regular', 'sold'],
            // North sector: Plots 70 - 77 (West facing)
            [70, 240, 'West', 30, "55'0\" × 39'4\"",  'regular', 'available'],
            [71, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [72, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'sold'],
            [73, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [74, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [75, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'reserved'],
            [76, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [77, 244, 'West', 40, "55'0\" × 40'0\"",  'corner',  'available'],
            // South sector: Plots 78 - 86 (West facing)
            [78, 244, 'West', 40, "55'0\" × 40'0\"",  'corner',  'sold'],
            [79, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [80, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [81, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'reserved'],
            [82, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [83, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'sold'],
            [84, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [85, 183, 'West', 30, "55'0\" × 30'0\"",  'regular', 'available'],
            [86, 177, 'West', 30, "55'0\" × 29'0\"",  'regular', 'available'],

            // --- BLOCK 4 (Plots 87 - 120) ---
            // South sector: Plots 87 - 95 (East facing)
            [87, 200, 'East', 30, "50'0\" × 36'0\"", 'regular', 'available'],
            [88, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [89, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [90, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [91, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'reserved'],
            [92, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [93, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [94, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [95, 222, 'East', 40, "50'0\" × 40'0\"", 'corner',  'available'],
            // North sector: Plots 96 - 103 (East facing)
            [96, 222,  'East', 40, "50'0\" × 40'0\"", 'corner',  'available'],
            [97, 166,  'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [98, 166,  'East', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [99, 166,  'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [100, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [101, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'reserved'],
            [102, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [103, 242, 'East', 30, "50'0\" × 43'6\"", 'regular', 'available'],
            // North sector: Plots 104 - 111 (West facing)
            [104, 258, 'West', 30, "50'0\" × 46'6\"", 'regular', 'available'],
            [105, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [106, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [107, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [108, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'reserved'],
            [109, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [110, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [111, 222, 'West', 40, "50'0\" × 40'0\"", 'corner',  'sold'],
            // South sector: Plots 112 - 120 (West facing)
            [112, 222, 'West', 40, "50'0\" × 40'0\"", 'corner',  'available'],
            [113, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [114, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [115, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [116, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'reserved'],
            [117, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [118, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [119, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [120, 226, 'West', 30, "50'0\" × 40'9\"", 'regular', 'available'],

            // --- BLOCK 5 (Plots 121 - 150) ---
            // South sector: Plots 121 - 129 (East facing)
            [121, 268, 'East', 30, "50'0\" × 48'5\"", 'regular', 'available'],
            [122, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [123, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [124, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [125, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'reserved'],
            [126, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [127, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [128, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [129, 222, 'East', 40, "50'0\" × 40'0\"", 'corner',  'available'],
            // North sector: Plots 130 - 134 (East facing)
            [130, 222, 'East', 40, "50'0\" × 47'2\"", 'corner',  'available'],
            [131, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [132, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [133, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [134, 166, 'East', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            // North Estate plots 135 & 136
            [135, 439, 'North', 30, "89'4\" × 47'11\"", 'estate', 'available'],
            [136, 545, 'North', 30, "89'4\" × 55'0\"",  'estate', 'reserved'],
            // North sector: Plots 137 - 141 (West facing)
            [137, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [138, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [139, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [140, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [141, 222, 'West', 40, "50'0\" × 47'2\"", 'corner',  'available'],
            // South sector: Plots 142 - 150 (West facing)
            [142, 222, 'West', 40, "50'0\" × 40'0\"", 'corner',  'sold'],
            [143, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [144, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [145, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'reserved'],
            [146, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [147, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [148, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'sold'],
            [149, 166, 'West', 30, "50'0\" × 30'0\"", 'regular', 'available'],
            [150, 295, 'West', 30, "50'0\" × 53'2\"", 'regular', 'available'],

            // --- BLOCK 6 (West Executive & Civic, Plots 151 - 158) ---
            [151, 187, 'North', 30, "52'0\" × 34'9\"", 'regular', 'available'], // Next to Park-3
            [152, 173, 'East',  30, "52'0\" × 30'0\"", 'regular', 'available'],
            [153, 173, 'East',  30, "52'0\" × 30'0\"", 'regular', 'sold'],
            [154, 300, 'East',  30, "52'0\" × 52'0\"", 'corner',  'available'],
            [155, 348, 'East',  30, "44'0\" × 65'0\"", 'regular', 'available'],
            [156, 348, 'East',  30, "44'0\" × 71'2\"", 'regular', 'reserved'],
            [157, 347, 'North', 30, "41'4\" × 44'0\"", 'regular', 'available'],
            [158, 348, 'North', 30, "44'0\" × 44'0\"", 'regular', 'available'],
        ];

        // Wipe old placeholder plots cleanly
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Plot::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $insertBatch = [];
        $now = now();

        foreach ($rawPlots as $item) {
            $num       = (int) $item[0];
            $size      = (float) $item[1];
            $facing    = $item[2];
            $roadWidth = (int) $item[3];
            $dims      = $item[4];
            $type      = $item[5];
            $status    = $item[6];

            // Select rate per sq yard
            if ($type === 'commercial') {
                $rate = $rateCommercial;
            } elseif ($type === 'corner') {
                $rate = $rateCorner;
            } elseif ($type === 'estate') {
                $rate = $rateEstate;
            } else {
                $rate = $rateVilla;
            }

            $totalPrice = round($size * $rate, 2);
            $plotNumber = 'Plot #' . str_pad($num, 3, '0', STR_PAD_LEFT);

            $title = round($size) . ' Sq. Yds ' . $facing . ' Facing ' . ucfirst($type) . ' Plot';

            $notes = match($type) {
                'commercial' => "Prime commercial plot with {$roadWidth}ft road frontage. Ideal for healthcare clinic, bank branch, or retail showroom.",
                'corner'     => "Corner plot facing {$roadWidth}ft wide CC road with double frontage and excellent cross-ventilation.",
                'estate'     => "Grand luxury estate villa parcel with maximum privacy, wide frontage, and direct avenue access.",
                default      => "Premium residential villa plot facing {$roadWidth}ft CC road with 100% Vaastu compliance and complete underground utility infrastructure.",
            };

            $insertBatch[] = [
                'plot_number'         => $plotNumber,
                'title'               => $title,
                'plot_type'           => $type,
                'size_sq_yards'       => $size,
                'price_per_sq_yard'   => $rate,
                'total_price'         => $totalPrice,
                'facing'              => $facing,
                'road_width_ft'       => $roadWidth,
                'boundary_dimensions' => $dims,
                'status'              => $status,
                'is_vaastu_compliant' => 1,
                'notes'               => $notes,
                'image'               => 'venture/photos/0' . (($num % 8) + 1) . '.jpg',
                'created_at'          => $now,
                'updated_at'          => $now,
            ];
        }

        // Insert all 158 authentic plots
        Plot::insert($insertBatch);

        echo "Seeded " . count($insertBatch) . " authentic plots successfully into database!\n";
    }
}
