<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('reservas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('pacote_id')->constrained('pacotes')->onDelete('cascade');
        $table->date('data_reserva');      // data da viagem ou data da reserva, conforme necessidade
        $table->integer('qtd_pessoas')->default(1);
        $table->string('status')->default('pendente'); // pendente, confirmado, cancelado
        $table->timestamps();
    });
}
};
