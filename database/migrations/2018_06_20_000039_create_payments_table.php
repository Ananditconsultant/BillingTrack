<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'payments';

    /**
     * Run the migrations.
     * @table payments
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('payment_method_id')->nullable()->default(null);
            $table->date('paid_at');
            $table->text('note');
            $table->decimal('amount', 20, 4)->default('0.0000');

            $table->index(["invoice_id"], 'payments_invoice_id_index');

            $table->index(["payment_method_id"], 'payments_payment_method_id_index');
            $table->nullableTimestamps();
            $table->softDeletes();


            $table->foreign('invoice_id', 'payments_invoice_id_index')
                ->references('id')->on('invoices')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('payment_method_id', 'payments_payment_method_id_index')
                ->references('id')->on('payment_methods')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
