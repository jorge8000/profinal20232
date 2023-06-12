<?php
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('NombreProyecto',100);
            $table->string('fuenteFondos',100);
            $table->decimal('MontoPlanificado',$precision = 8, $scale = 2);
            $table->decimal('MontoPatrocinado',$precision = 8, $scale = 2);
            $table->decimal('MontoFondosPropios',$precision = 8, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
