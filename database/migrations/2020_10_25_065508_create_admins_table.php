<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('admins')->nullable();
            $table->string('blogcategories')->nullable();
            $table->string('blogs')->nullable();
            $table->string('brands')->nullable();
            $table->string('cartsettings')->nullable();
            $table->string('categories')->nullable();
            $table->string('categorypages')->nullable();
            $table->string('colors')->nullable();
            $table->string('coupons')->nullable();
            $table->string('header_advertises')->nullable();
            $table->string('orders')->nullable();
            $table->string('order_details')->nullable();
            $table->string('posts')->nullable();
            $table->string('products')->nullable();
            $table->string('seo')->nullable();
            $table->string('shipping')->nullable();
            $table->string('sizes')->nullable();
            $table->string('sliders')->nullable();
            $table->string('subcategories')->nullable();
            $table->string('subcatpages')->nullable();
            $table->string('subscribers')->nullable();
            $table->string('tags')->nullable();
            $table->string('users')->nullable();
            $table->string('websettings')->nullable();
            $table->string('wishlists')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
