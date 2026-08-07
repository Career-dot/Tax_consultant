<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;
use App\Models\Service;

class DummyNotificationsSeeder extends Seeder
{
    public function run(): void
    {
        $client = User::where('email', 'client@test.com')->first();
        if (!$client) {
            return;
        }

        $services = Service::all();
        if ($services->isEmpty()) {
            return;
        }

        $notifications = [
            [
                'title' => 'Welcome to FINANIC!',
                'message' => 'Thank you for selecting our services. Our team will contact you shortly to discuss your requirements.',
                'type' => 'welcome',
            ],
            [
                'title' => 'Document Required',
                'message' => 'Please upload your CNIC and bank statements to proceed with your tax filing.',
                'type' => 'reminder',
            ],
            [
                'title' => 'Service Update',
                'message' => 'Your income tax return preparation has been initiated. We will review your documents shortly.',
                'type' => 'update',
            ],
            [
                'title' => 'Deadline Reminder',
                'message' => 'Your sales tax return for this month is due on the 18th. Please ensure all documents are submitted.',
                'type' => 'reminder',
            ],
            [
                'title' => 'Document Received',
                'message' => 'We have received your bank statements. Our team will review them within 2-3 business days.',
                'type' => 'success',
            ],
            [
                'title' => 'Filing Completed',
                'message' => 'Your withholding tax statement has been successfully filed with FBR.',
                'type' => 'success',
            ],
        ];

        foreach ($notifications as $index => $notif) {
            Notification::create([
                'user_id' => $client->id,
                'service_id' => $services->random()->id,
                'title' => $notif['title'],
                'message' => $notif['message'],
                'type' => $notif['type'],
                'is_read' => $index > 2,
                'created_at' => now()->subDays(rand(0, 7)),
                'updated_at' => now()->subDays(rand(0, 7)),
            ]);
        }
    }
}
