<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')->nullable()->after('id')->constrained('categories')->nullOnDelete();
            }
            if (!Schema::hasColumn('products', 'sku')) {
                $table->string('sku')->nullable()->after('name');
            }
            if (!Schema::hasColumn('products', 'sale_price')) {
                $table->decimal('sale_price', 10, 2)->nullable()->after('price');
            }
            if (!Schema::hasColumn('products', 'description')) {
                $table->text('description')->nullable()->after('stock');
            }
            if (!Schema::hasColumn('products', 'image')) {
                $table->string('image')->nullable()->after('description');
            }
            if (!Schema::hasColumn('products', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('image');
            }
            if (!Schema::hasColumn('products', 'is_delete')) {
                $table->boolean('is_delete')->default(false)->after('is_active');
            }
        });

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('ALTER TABLE products ADD CONSTRAINT products_price_check CHECK (price >= 0)');
            DB::statement('ALTER TABLE products ADD CONSTRAINT products_sale_price_check CHECK (sale_price IS NULL OR sale_price >= 0)');
            DB::statement('ALTER TABLE products ADD CONSTRAINT products_stock_check CHECK (stock >= 0)');
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('ALTER TABLE products DROP CONSTRAINT IF EXISTS products_price_check');
            DB::statement('ALTER TABLE products DROP CONSTRAINT IF EXISTS products_sale_price_check');
            DB::statement('ALTER TABLE products DROP CONSTRAINT IF EXISTS products_stock_check');
        }

        Schema::table('products', function (Blueprint $table) {
            $columns = ['category_id', 'sku', 'sale_price', 'description', 'image', 'is_active', 'is_delete'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
