<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contact_enquiries', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_enquiries', 'lead_number')) {
                $table->string('lead_number', 50)->nullable()->unique()->after('id');
            }
            if (!Schema::hasColumn('contact_enquiries', 'project')) {
                $table->string('project', 150)->nullable()->default('RRR Prekshitha Enclave')->after('preferred_visit_date');
            }
            if (!Schema::hasColumn('contact_enquiries', 'landing_page')) {
                $table->string('landing_page', 255)->nullable()->default('/landing2/')->after('project');
            }
            if (!Schema::hasColumn('contact_enquiries', 'source')) {
                $table->string('source', 100)->nullable()->default('Website')->after('landing_page');
            }
            if (!Schema::hasColumn('contact_enquiries', 'utm_source')) {
                $table->string('utm_source', 100)->nullable()->after('source');
            }
            if (!Schema::hasColumn('contact_enquiries', 'utm_medium')) {
                $table->string('utm_medium', 100)->nullable()->after('utm_source');
            }
            if (!Schema::hasColumn('contact_enquiries', 'utm_campaign')) {
                $table->string('utm_campaign', 100)->nullable()->after('utm_medium');
            }
            if (!Schema::hasColumn('contact_enquiries', 'referrer')) {
                $table->string('referrer', 500)->nullable()->after('utm_campaign');
            }
        });

        // Backfill existing rows with LEAD-00001, LEAD-00002 etc.
        $existing = DB::table('contact_enquiries')->whereNull('lead_number')->get();
        foreach ($existing as $row) {
            DB::table('contact_enquiries')
                ->where('id', $row->id)
                ->update([
                    'lead_number' => 'LEAD-' . str_pad($row->id, 5, '0', STR_PAD_LEFT),
                    'project' => $row->project ?: 'RRR Prekshitha Enclave',
                    'landing_page' => $row->landing_page ?: '/landing2/',
                    'source' => $row->source ?: 'Website',
                ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_enquiries', function (Blueprint $table) {
            $columns = [
                'lead_number', 'project', 'landing_page', 'source',
                'utm_source', 'utm_medium', 'utm_campaign', 'referrer'
            ];
            foreach ($columns as $col) {
                if (Schema::hasColumn('contact_enquiries', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
