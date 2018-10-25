<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Dispute;
use Carbon\Carbon;

class DisburseEscrow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'disburse:escrow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disburse invoice amount to recipient if no dispute was created within 24hours of product key_entry';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $invoices =  Invoice::where('invoice_type', '!=', 'milestone')->whereNotNull('secret_key_updated_at')->where('is_disbursed', 0)->get();

        foreach($invoices as $invoice){

            $dateSecretKeyUpdatedDiff = Carbon::now()->diffInHours(Carbon::parse($invoice->secret_key_updated_at));


            if($dateSecretKeyUpdatedDiff >= 24){

                $dispute = Dispute::where('invoice_id', $invoice->id)->first();

                if($dispute){

                    $dateDisputeDiff = Carbon::parse($dispute->created_at)->diffInHours(Carbon::parse($invoice->secret_key_updated_at));

                    if($dateDisputeDiff <= 24 ){
                    //Send a mail that no dispurse was made   
                    }else{

                        $user = $invoice->sender;
                        $user->account_balance += $invoice->amount; 
                        $user->save();
                                            
                        //Update the is_disbursed to true
                        $invoice->is_disbursed = 1;
                        $invoice->save();
                        $this->info('disburse:escrow Command Run successfully!');
                    }

                }else{

                    //Take the invoice amount
                    $user = $invoice->sender;
                    $user->account_balance += $invoice->amount;
                    $user->save();
                                        
                    //Update the is_disbursed to true
                    $invoice->is_disbursed = 1;
                    $invoice->save();
                    $this->info('disburse:escrow Command Run successfully!');

                }

            }
    
        }
    }
}
