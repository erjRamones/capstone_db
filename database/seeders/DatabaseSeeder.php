<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
use App\Models\User_Account;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

use App\Models\Barangay; #Done
use App\Models\Branch; #Done
use App\Models\City; #Done
use App\Models\Civil_Status; #Done
use App\Models\Spouse;  #Done
use App\Models\Gender_Map; #Done
use App\Models\Country; #Done
use App\Models\Province; #Done
use App\Models\Credit_Status; #Done
use App\Models\Personality_Status_Map; #Done
use App\Models\User_Account_Status; #Done
use App\Models\Document_Map; #Done
use App\Models\Document_Permission_Map; #Done
use App\Models\Name_Type; #Done
use App\Models\Customer_Group; #Done
use App\Models\Personality;

class DatabaseSeeder extends Seeder
{
    private $c;
    private $f;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

       $this->c = 500;
        $this->f = 1;

        for($i = 0; $i < 100; $i++)
        {
            Personality::create([
                'datetime_registered'=>now(),
                'family_name'=>$faker->name(),
                'middle_name'=>$faker->name(),
                'first_name'=>$faker->name(),
                'description'=>$faker->sentence(6),
                'birthday'=>now(),
                'civil_status'=>$faker->sentence(6),
                'gender_code'=>$faker->numberBetween(1,2),
                'house_street'=>$faker->address(),
                'purok_zone'=>$faker->state(),
                'postal_code'=> $faker->postcode(),
                'telephone_no'=>$faker->phoneNumber(),
                'email_address'=>$faker->email(),
                'cellphone_no'=> $faker->phoneNumber(),
                'name_type_code'=>$faker->numberBetween(1,2),
                'personality_status_code'=>1,
                'branch_id'=>$faker->numberBetween(1,10),
                'barangay_id'=>$faker->numberBetween(1,10),
                'city_id'=>$faker->numberBetween(1,10),
                'country_id'=>$faker->numberBetween(1,10),
                'province_id'=>$faker->numberBetween(1,10),
                'spouse_id'=>$faker->numberBetween(1,10),
                'credit_status_id'=>$faker->numberBetween(1,10),
            ]);
        }

        $modelTypes = [
            'barangay',
            'branch',
            'city',
            'civil_status',
            'spouse',
            'gender_map',
            'country',
            'province',
            'credit_status',
            'personality_status_map',
            'user_account_status',
            'document_map',
            'document_permission_map',
            'name_type',
            'customer_group'
        ];

        while ($this->c > 0) {
            echo "1"; echo $this->f+1;
            $modeltype = $faker->randomElement($modelTypes);
            $description = $faker->sentence(10);
            echo $modeltype;

            switch ($modeltype) {
                case 'barangay':
                    Barangay::createEntry($description);
                    break;
                case 'branch':
                    Branch::createEntry($description);
                    break;
                case 'city':
                    City::createEntry($description);
                    break;
                case 'civil_status':
                    Civil_Status::createEntry($description);
                    break;
                case 'spouse':
                    Spouse::createEntry($description);
                    break;
                case 'gender_map':
                    Gender_Map::createEntry($description);
                    break;
                case 'country':
                    Country::createEntry($description);
                    break;
                case 'province':
                    Province::createEntry($description);
                    break;
                case 'credit_status':
                    Credit_Status::createEntry($description);
                    break;
                case 'personality_status_map':
                    Personality_Status_Map::createEntry($description);
                    break;
                case 'user_account_status':
                    User_Account_Status::createEntry($description);
                    break;
                case 'document_map':
                    Document_Map::createEntry($description);
                    break;
                case 'document_permission_map':
                    Document_Permission_Map::createEntry($description);
                    break;
                case 'name_type':
                    Name_Type::createEntry($description);
                    break;
                case 'customer_group':
                    Customer_Group::createEntry($description);
                    break;
                default:
                    throw new \InvalidArgumentException("Unknown model type: $modeltype");
            }

            $this->c--;
            $this->f++;
        }

        Employee::create([
            'sss_no' => $faker->randomDigit(),
            'phic_no' => $faker->randomDigit(),
            'tin_no' => $faker->randomDigit(),
            'datetime_hired' => $faker->date(),
            'datetime_resigned' => $faker->date(),
            'personality_id' => $faker->numberBetween(1,100),
        ]);

        User_Account_Status::create([
            'description' => $faker->name(['Active', 'Not Active']),
        ]);


        User_Account::create([
            'last_name' => 'Sasas',
            'first_name' => 'Sasas',
            'middle_name' => 'Sasas',
            'email' => 'Sasas@email.com',
            'password' => Hash::make('password'),
            'employee_id' => $faker->numberBetween(1,100),
            'status_id' => 1,
        ]);
    }
}
