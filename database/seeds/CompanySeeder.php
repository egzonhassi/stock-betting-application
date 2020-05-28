<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = [
            "Apple" => "aapl",
            "Starbucks" => "sbux",
            "Nike" => "NKE",
            "Sony" => "SNE",
            "Google" => "GOOG"
        ];

        foreach ($company as $key => $value) {
            $company = new App\Company;
            $company->name = $key;
            $company->symbol = $value;
            $company->save();
        }
    }
}
