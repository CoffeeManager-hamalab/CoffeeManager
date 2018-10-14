<?php

namespace App\Console\Commands;

use \SplFileObject;
use Illuminate\Console\Command;
use App\Capsule;

class UpdateCapsules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-capsules {csv_path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $file = new SplFileObject($this->argument("csv_path")); 
        $file->setFlags(SplFileObject::READ_CSV); 
	foreach ($file as $line) {

            //終端の空行を除く処理　空行の場合に取れる値は後述
            if(!is_null($line[0])&&strcmp($line[0],'name')){
                $records[] = $line;
            }
	}
	foreach ($records as $capsuleinfo){	
	    $addcapsule = new Capsule;
	    $addcapsule->name = $capsuleinfo[0];
	    $addcapsule->description = $capsuleinfo[2];
	    $addcapsule->optimal_scale = $capsuleinfo[4];
	    $addcapsule->milk_scale = $capsuleinfo[5];
	    $addcapsule->price = ceil($capsuleinfo[3]/$capsuleinfo[1]);
            $addcapsule->created_at = date('Y-m-d H:i:s');
	    $addcapsule->updated_at = date('Y-m-d H:i:s');
	    $addcapsule->img_name = $capsuleinfo[6];
            $addcapsule->save(); 
        }
    }
}
