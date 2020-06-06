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
            "Google" => "GOOG",
            "Facebook" => "FB",
            "Amazon" => "AMZN",
            "Walmart" => "WMT",
            "Ebay" => "EBAY",
            "Alibaba" => "BABA",
            "Coca Cola" => "KO",
            "Pepsi" => "PEP",
            "Microsoft" => "MSFT",
            "Dell" => "DELL",
            "IBM" => "IBM",
            "Mastercard" => "MA",
            "Best Buy" => "BBY",
            "Lenovo" => "LNVGY",
            "Nvidia" => "NVDA",
            "Twitter" => "TWTR",
            "Boeing" => "BA",
            "Samsung Electronics" => "SSNLF",
            "AT&T" => "T",
            "Mercedes" => "DDAIF",
            "BMW" => "BAMXF"
        ];

        foreach ($company as $key => $value) {
            $company = new App\Company;
            $company->name = $key;
            $company->symbol = $value;
            $company->save();
        }
    }
}
