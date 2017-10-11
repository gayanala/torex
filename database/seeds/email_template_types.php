<?php

use App\EmailTemplateTypes;
use Illuminate\Database\Seeder;


class email_template_types extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
        DB::table('email_template_types')->delete();

       EmailTemplateTypes::create(['id' => 1, 'template_type' => 'Business Registration(Admin)']);
       EmailTemplateTypes::create(['id' => 2, 'template_type' => 'Business Registration(User)']);
       EmailTemplateTypes::create(['id' => 3, 'template_type' => 'Donation Request Success']);;
       EmailTemplateTypes::create(['id' => 4, 'template_type' => 'Donation Request Denied']);
       EmailTemplateTypes::create(['id' => 5, 'template_type' => 'Forgot Password']);
     
   }
}