<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Type;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('tasks', function (Blueprint $table) {
            // default to other type
            $table->foreignId('type_id')->default(8)->constrained();
        });

        $types = ['Homework', 'Exam', 'Essay', 'Lab', 'Project', 'Presentation', 'Errand', 'Other'];

        foreach ($types as $type) {
            // $role = new Role();
            // $role->slug = $slug;
            // $role->name = $name;
            // $role->save();
            Type::create([
                'name' => $type,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
