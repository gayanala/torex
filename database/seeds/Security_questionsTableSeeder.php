<?php

use App\Security_question;
use Illuminate\Database\Seeder;

class Security_questionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('security_questions')->delete();

        Security_question::create(['id' => 1, 'question' => 'What was the name of your elementary / primary school?']);
        Security_question::create(['id' => 2, 'question' => 'In what city or town does your nearest sibling live?']);
        Security_question::create(['id' => 3, 'question' => 'What is your pet’s name?']);
        Security_question::create(['id' => 4, 'question' => 'In what year was your father born?']);
        Security_question::create(['id' => 5, 'question' => 'What was the house number and street name you lived in as a child?']);
        Security_question::create(['id' => 6, 'question' => 'What were the last four digits of your childhood telephone number?']);
        Security_question::create(['id' => 7, 'question' => 'What primary school did you attend?']);
        Security_question::create(['id' => 8, 'question' => 'In what town or city was your first full time job?']);
        Security_question::create(['id' => 9, 'question' => 'In what town or city did you meet your spouse/partner?']);
        Security_question::create(['id' => 10, 'question' => 'What is the middle name of your oldest child?']);
        Security_question::create(['id' => 11, 'question' => 'What are the last five digits of your driver\'s licence number?']);
        Security_question::create(['id' => 12, 'question' => 'What is your grandmother\'s (on your mother\'s side) maiden name?']);
        Security_question::create(['id' => 13, 'question' => 'What is your spouse or partner\'s mother\'s maiden name?']);
        Security_question::create(['id' => 14, 'question' => 'In what town or city did your mother and father meet?']);
        Security_question::create(['id' => 15, 'question' => 'hat time of the day were you born? (hh:mm)']);
        Security_question::create(['id' => 16, 'question' => 'What time of the day was your first child born? (hh:mm)']);

    }
    protected $table = 'security_questions';
}
