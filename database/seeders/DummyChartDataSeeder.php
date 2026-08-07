<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\NotificationsLog;
use App\Models\PlannerSubscription;

class DummyChartDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->createContacts();
        $this->createNotificationsLog();
        $this->createPlannerSubscriptions();
    }

    private function createContacts(): void
    {
        $services = ['Income Tax Services', 'Sales Tax Services', 'Withholding Tax Services', 'Tax Litigation', 'Corporate Services'];
        $statuses = ['pending', 'contacted', 'resolved'];
        $names = [
            'Ahmed Khan', 'Fatima Ali', 'Hassan Raza', 'Ayesha Malik', 'Omar Siddiqui',
            'Zainab Bibi', 'Ali Raza', 'Sara Hussain', 'Bilal Ahmed', 'Nadia Parveen',
            'Usman Ghani', 'Mariam Noor', 'Faisal Khan', 'Hira Shah', 'Imran Sheikh',
            'Sana Tariq', 'Waqas Javed', 'Rabia Aslam', 'Danish Rehman', 'Amber Malik',
            'Kamran Ali', 'Farah Naz', 'Tariq Mehmood', 'Asma Riaz', 'Babar Azam',
            'Sidra Qureshi', 'Nasir Mahmood', 'Rukhsana Begum', 'Zeeshan Iqbal', 'Bushra Bibi'
        ];

        // Create contacts spread over last 6 months
        for ($month = 5; $month >= 0; $month--) {
            $count = rand(5, 15); // 5-15 contacts per month
            for ($i = 0; $i < $count; $i++) {
                $date = now()->subMonths($month)->subDays(rand(0, 29));
                Contact::create([
                    'name' => $names[array_rand($names)],
                    'email' => strtolower(str_replace(' ', '.', $names[array_rand($names)])) . '@example.com',
                    'phone' => '+92-3' . rand(10, 99) . '-' . rand(1000000, 9999999),
                    'service_interest' => $services[array_rand($services)],
                    'preferred_contact_method' => rand(0, 1) ? 'email' : 'phone',
                    'message' => 'Inquiry about ' . $services[array_rand($services)] . ' services.',
                    'status' => $statuses[array_rand($statuses)],
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }

    private function createNotificationsLog(): void
    {
        $types = ['deadline_reminder', 'contact_acknowledgement', 'lead_notification', 'broadcast', 'portal_otp'];
        $channels = ['email', 'sms'];
        $statuses = ['sent', 'sent', 'sent', 'failed', 'queued']; // weighted towards sent

        // Create notifications spread over last 6 months
        for ($month = 5; $month >= 0; $month--) {
            $count = rand(10, 30); // 10-30 notifications per month
            for ($i = 0; $i < $count; $i++) {
                $date = now()->subMonths($month)->subDays(rand(0, 29));
                $status = $statuses[array_rand($statuses)];
                NotificationsLog::create([
                    'type' => $types[array_rand($types)],
                    'channel' => $channels[array_rand($channels)],
                    'recipient' => 'user' . rand(1, 50) . '@example.com',
                    'subject' => 'Tax Reminder - ' . now()->subMonths($month)->format('F Y'),
                    'message' => 'This is a reminder about your upcoming tax deadline.',
                    'status' => $status,
                    'error_message' => $status === 'failed' ? 'Connection timeout' : null,
                    'sent_at' => $status === 'sent' ? $date : null,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }

    private function createPlannerSubscriptions(): void
    {
        $taxpayerTypes = ['salaried_individual', 'business_individual', 'aop', 'company'];
        $names = [
            'Ahmed Khan', 'Fatima Ali', 'Hassan Raza', 'Ayesha Malik', 'Omar Siddiqui',
            'Zainab Bibi', 'Ali Raza', 'Sara Hussain', 'Bilal Ahmed', 'Nadia Parveen',
            'Usman Ghani', 'Mariam Noor', 'Faisal Khan', 'Hira Shah', 'Imran Sheikh'
        ];
        $sectors = ['Manufacturing', 'Trading', 'Services', 'IT', 'Healthcare', null];

        // Create subscriptions spread over last 6 months
        for ($month = 5; $month >= 0; $month--) {
            $count = rand(3, 8); // 3-8 subscriptions per month
            for ($i = 0; $i < $count; $i++) {
                $date = now()->subMonths($month)->subDays(rand(0, 29));
                $name = $names[array_rand($names)];
                PlannerSubscription::create([
                    'user_id' => null, // anonymous planner users
                    'name' => $name,
                    'email' => strtolower(str_replace(' ', '.', $name)) . '@example.com',
                    'phone' => '+92-3' . rand(10, 99) . '-' . rand(1000000, 9999999),
                    'taxpayer_type' => $taxpayerTypes[array_rand($taxpayerTypes)],
                    'has_sales_tax' => rand(0, 1),
                    'has_withholding_agent' => rand(0, 1),
                    'sector' => $sectors[array_rand($sectors)],
                    'email_reminders' => true,
                    'sms_reminders' => rand(0, 1),
                    'session_token' => bin2hex(random_bytes(32)),
                    'is_active' => true,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }
}
