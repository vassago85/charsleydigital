<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('org_name');
            $table->string('contact_name');
            $table->string('role_title')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('system_type');
            $table->text('problem_description');
            $table->boolean('users_admins')->default(false);
            $table->boolean('users_staff')->default(false);
            $table->boolean('users_members')->default(false);
            $table->boolean('users_public')->default(false);
            $table->string('users_other')->nullable();
            $table->unsignedInteger('active_users_est')->nullable();
            $table->unsignedInteger('monthly_transactions_est')->nullable();
            $table->string('storage_est')->nullable();
            $table->string('timeline');
            $table->string('budget_expectation')->nullable();
            $table->boolean('consent')->default(false);
            $table->string('source')->default('website');
            $table->string('status')->default('new');
            $table->date('follow_up_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
