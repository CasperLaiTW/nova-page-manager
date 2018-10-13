<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrixMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('nova_pending_trix_attachments')) {
			Schema::create('nova_pending_trix_attachments', function (Blueprint $table) {
				$table->increments('id');
				$table->string('draft_id')->index();
				$table->string('attachment');
				$table->string('disk');
				$table->timestamps();
			});
		}
		if (!Schema::hasTable('nova_trix_attachments')) {
			Schema::create('nova_trix_attachments', function (Blueprint $table) {
				$table->increments('id');
				$table->string('attachable_type');
				$table->unsignedInteger('attachable_id');
				$table->string('attachment');
				$table->string('disk');
				$table->string('url')->index();
				$table->timestamps();
				$table->index(['attachable_type', 'attachable_id']);
			});
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}