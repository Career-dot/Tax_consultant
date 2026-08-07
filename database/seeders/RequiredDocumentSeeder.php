<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\RequiredDocument;

class RequiredDocumentSeeder extends Seeder
{
    public function run(): void
    {
        $serviceDocs = [
            'Income Tax' => [
                ['name' => 'CNIC copy', 'description' => 'Front and back copy of CNIC', 'sort_order' => 1],
                ['name' => 'Active mobile number', 'description' => 'Valid mobile number for contact', 'sort_order' => 2],
                ['name' => 'Email address', 'description' => 'Active email address', 'sort_order' => 3],
                ['name' => 'Bank account details & statement', 'description' => 'Bank account details and 12 months statement', 'sort_order' => 4],
                ['name' => 'Salary slip / salary certificate', 'description' => 'If employed - salary slip or certificate from employer', 'sort_order' => 5],
                ['name' => 'Business income record', 'description' => 'If self-employed - business income records', 'sort_order' => 6],
                ['name' => 'Property details', 'description' => 'If owning property - property documents', 'sort_order' => 7],
                ['name' => 'Vehicle details', 'description' => 'If owning vehicle - vehicle registration documents', 'sort_order' => 8],
                ['name' => 'Investment details', 'description' => 'Shares, mutual funds, etc. if applicable', 'sort_order' => 9],
                ['name' => 'Tax deduction certificates', 'description' => 'Withholding tax certificates if available', 'sort_order' => 10],
                ['name' => 'FBR IRIS account', 'description' => 'FBR IRIS login or CNIC for registration', 'sort_order' => 11],
            ],
            'Sales Tax' => [
                ['name' => 'CNIC copy', 'description' => 'Front and back copy of CNIC', 'sort_order' => 1],
                ['name' => 'Active mobile number', 'description' => 'Valid mobile number for contact', 'sort_order' => 2],
                ['name' => 'Email address', 'description' => 'Active email address', 'sort_order' => 3],
                ['name' => 'Business name & address', 'description' => 'Registered business name and address', 'sort_order' => 4],
                ['name' => 'NTN certificate', 'description' => 'National Tax Number certificate', 'sort_order' => 5],
                ['name' => 'Bank account details (business)', 'description' => 'Business bank account details', 'sort_order' => 6],
                ['name' => 'Business registration proof', 'description' => 'SECP/Firm/AOP registration if applicable', 'sort_order' => 7],
                ['name' => 'Rent agreement / property ownership proof', 'description' => 'Proof of business premises', 'sort_order' => 8],
                ['name' => 'Latest electricity/gas bill', 'description' => 'Recent utility bill for address verification', 'sort_order' => 9],
                ['name' => 'Purchase & sales invoices/records', 'description' => 'Purchase and sales invoices', 'sort_order' => 10],
                ['name' => 'FBR IRIS account', 'description' => 'FBR IRIS login credentials', 'sort_order' => 11],
            ],
            'Withholding Tax' => [
                ['name' => 'CNIC / NTN', 'description' => 'CNIC or National Tax Number', 'sort_order' => 1],
                ['name' => 'FBR IRIS account', 'description' => 'FBR IRIS login credentials', 'sort_order' => 2],
                ['name' => 'Business/company details', 'description' => 'Business or company information', 'sort_order' => 3],
                ['name' => 'Tax deduction certificates', 'description' => 'Withholding tax deduction certificates', 'sort_order' => 4],
                ['name' => 'Supplier/employee/contractor invoices', 'description' => 'Relevant invoices for withholding', 'sort_order' => 5],
                ['name' => 'Payment vouchers & bank details', 'description' => 'Payment vouchers and bank statements', 'sort_order' => 6],
                ['name' => 'CPR (Computerized Payment Receipt)', 'description' => 'If tax has been deposited', 'sort_order' => 7],
                ['name' => 'Monthly/annual withholding tax record', 'description' => 'Withholding tax calculation records', 'sort_order' => 8],
            ],
            'Tax Litigation' => [
                ['name' => 'CNIC / NTN', 'description' => 'CNIC or National Tax Number', 'sort_order' => 1],
                ['name' => 'FBR notices or tax orders', 'description' => 'All FBR notices and assessment orders', 'sort_order' => 2],
                ['name' => 'Tax returns & wealth statements', 'description' => 'Previously filed tax returns', 'sort_order' => 3],
                ['name' => 'Supporting invoices/documents', 'description' => 'Relevant supporting documents', 'sort_order' => 4],
                ['name' => 'Bank statements', 'description' => 'Bank statements if relevant to case', 'sort_order' => 5],
                ['name' => 'Previous correspondence with FBR', 'description' => 'All previous communications with FBR', 'sort_order' => 6],
                ['name' => 'Authorization / Power of Attorney', 'description' => 'If tax consultant will represent you', 'sort_order' => 7],
                ['name' => 'Case-related evidence & records', 'description' => 'Any evidence related to the case', 'sort_order' => 8],
            ],
            'Corporate' => [
                ['name' => 'CNIC of owner/directors', 'description' => 'CNIC copies of all directors', 'sort_order' => 1],
                ['name' => 'Company registration documents', 'description' => 'SECP/Firm registration documents', 'sort_order' => 2],
                ['name' => 'NTN & Sales Tax Registration (STRN)', 'description' => 'NTN and STRN certificates if applicable', 'sort_order' => 3],
                ['name' => 'Business bank account details', 'description' => 'Corporate bank account details', 'sort_order' => 4],
                ['name' => 'Financial statements / accounts', 'description' => 'Audited financial statements', 'sort_order' => 5],
                ['name' => 'Tax returns & previous tax records', 'description' => 'Previously filed corporate tax returns', 'sort_order' => 6],
                ['name' => 'Business contracts/agreements', 'description' => 'Relevant business contracts', 'sort_order' => 7],
                ['name' => 'Retainer agreement / authorization letter', 'description' => 'Signed retainer agreement', 'sort_order' => 8],
            ],
        ];

        $services = Service::all();

        foreach ($services as $service) {
            $matched = false;
            foreach ($serviceDocs as $keyword => $docs) {
                if (str_contains($service->name, $keyword)) {
                    foreach ($docs as $doc) {
                        RequiredDocument::updateOrCreate(
                            [
                                'service_id' => $service->id,
                                'name' => $doc['name'],
                            ],
                            [
                                'description' => $doc['description'],
                                'sort_order' => $doc['sort_order'],
                                'is_active' => true,
                            ]
                        );
                    }
                    $matched = true;
                    break;
                }
            }
            // NTN Registration uses same docs as Sales Tax
            if (!$matched && (str_contains($service->name, 'NTN') || str_contains($service->name, 'Registration'))) {
                foreach ($serviceDocs['Sales Tax'] as $doc) {
                    RequiredDocument::updateOrCreate(
                        [
                            'service_id' => $service->id,
                            'name' => $doc['name'],
                        ],
                        [
                            'description' => $doc['description'],
                            'sort_order' => $doc['sort_order'],
                            'is_active' => true,
                        ]
                    );
                }
            }
        }
    }
}
