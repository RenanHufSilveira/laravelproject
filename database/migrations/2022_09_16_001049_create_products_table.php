<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->integer('quantity');
            $table->text('description');
            $table->boolean('enabled', true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

/*
php artisan make:migration create_products_table
php artisan migrate:status
php artisan migrate
php artisan migrate:refresh

php artisan make:migration add_category_to_products_table - Adiciona coluna sem deletar a tabela
php artisan migrate:rollback - Delete alterações feitas tabelas
php artisan migrate:reset -  Rollback de todas as migrações
php artisan migrate:refresh - Rollback da migração e executar migrate novamente
php artisan migrate:fresh - Deleta todas as tabelas do banco e executar migrate novamente
*/