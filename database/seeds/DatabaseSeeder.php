<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    //Lorempixel's Categories: abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife','fashion', 'people', 'nature', 'sports', 'technics', 'transport'
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = factory(App\Company::class, 10)->create();


        $companies->each(function(App\Company $company) use ($companies){
            $users = factory(App\User::class)
                ->times(5)
                ->create([
                    'company_id' => $company->id,
                ]);

            $units = factory(App\Unit::class, random_int(2, 6))
            	->create([
            		'company_id' => $company->id,
            	]);

            $locations = factory(App\Location::class, random_int(2, 3))
            	->create([
            		'company_id' => $company->id,
            	]);

            $taxes = factory(App\Tax::class, random_int(2, 4))
                ->create([
                    'company_id' => $company->id,
                ]);

            $items = factory(App\Item::class, random_int(5, 50))
                ->create([
                    'company_id' => $company->id,
                    'location_id' => $company->locations->random(2)->first()->id,
                    'unit_id' => $company->units->random(2)->first()->id,
                    'tax_id' => $company->taxes->random(2)->first()->id,
                ]);

            $persons = factory(App\Person::class, random_int(30, 60))
                ->create([
                    'company_id' => $company->id,
                ]);

            $invoices = factory(App\Invoice::class, random_int(10, 20))
                ->create([
                    'person_id' => $company->persons->random(30)->first()->id,
                    'user_id' => $company->users->random(3)->first()->id,
                ]);
        });
    }
}
