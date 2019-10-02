<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			//person data
            $table->increments('id');
			$table->string('cpf', 11)->unique()->nullable();
			$table->string('name', 50);
			$table->string('phone', 11);
			$table->date('birth')->nullable();
			$table->char('gender', 1)->nullable();
			$table->text('notes')->nullable();

			//auth data
			$table->string('email', 80)->unique();
			$table->string('password', 254)->nullable();

			//permission
			$table->string('status')->default('ativo');
			$table->string('permission')->default('app.user');

			//token criado pelo laravel
			$table->rememberToken();

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {

		});

		Schema::drop('users');
	}
}
