<?php

namespace App\Support\Dashboard;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Session-backed sample data for the customer dashboard. Every public method here
 * mirrors what an Eloquent repository would expose (applications(), documents(), ...)
 * so a future developer can swap this class for real queries without touching any
 * controller or view.
 */
class DemoDataStore
{
    public const STAGES = ['draft', 'submitted', 'under_review', 'documents_required', 'approved', 'completed'];

    protected string $key;

    public function __construct(protected User $user)
    {
        $this->key = 'dashboard_demo_'.$user->id;

        if (! session()->has($this->key)) {
            session([$this->key => $this->seed()]);
        }
    }

    public static function serviceMeta(): array
    {
        return [
            'personal-tax' => ['label' => 'Personal Tax Filing', 'icon' => 'pe-7s-user', 'description' => 'Annual income tax return filing with FBR IRIS.'],
            'business-registration' => ['label' => 'Business Registration', 'icon' => 'pe-7s-briefcase', 'description' => 'Sole proprietor, partnership, or company registration.'],
            'sales-tax' => ['label' => 'Sales Tax Registration', 'icon' => 'pe-7s-cash', 'description' => 'GST registration and sales tax compliance onboarding.'],
            'ntn' => ['label' => 'NTN Registration', 'icon' => 'pe-7s-id', 'description' => 'Get registered with FBR and become an active filer.'],
        ];
    }

    public static function stageLabel(string $stage): string
    {
        return match ($stage) {
            'draft' => 'Draft',
            'submitted' => 'Submitted',
            'under_review' => 'Under Review',
            'documents_required' => 'Documents Required',
            'approved' => 'Approved',
            'completed' => 'Completed',
            default => ucfirst(str_replace('_', ' ', $stage)),
        };
    }

    public static function stageProgress(string $stage): int
    {
        return match ($stage) {
            'draft' => 10,
            'submitted' => 30,
            'under_review' => 50,
            'documents_required' => 65,
            'approved' => 85,
            'completed' => 100,
            default => 0,
        };
    }

    // ---------------------------------------------------------------
    // Applications
    // ---------------------------------------------------------------

    public function applications(): array
    {
        return collect($this->data()['applications'])->sortByDesc('created_at')->values()->all();
    }

    public function application(int|string $id): ?array
    {
        return collect($this->data()['applications'])->firstWhere('id', (int) $id);
    }

    public function createApplication(string $service, array $attributes = []): array
    {
        $data = $this->data();
        $id = $data['next_ids']['applications']++;
        $meta = static::serviceMeta()[$service] ?? ['label' => 'Tax Filing'];

        $application = [
            'id' => $id,
            'service' => $service,
            'title' => $meta['label'],
            'reference' => 'APP-'.now()->format('Y').'-'.str_pad((string) $id, 4, '0', STR_PAD_LEFT),
            'status' => 'submitted',
            'timeline' => $this->buildTimeline('submitted'),
            'meta' => $attributes,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];

        $data['applications'][] = $application;
        $this->save($data);

        $this->pushNotification('application', 'Application submitted', "Your {$meta['label']} application {$application['reference']} has been received.", route('dashboard.applications.show', $application['id']));

        return $application;
    }

    protected function buildTimeline(string $currentStage): array
    {
        $position = array_search($currentStage, self::STAGES, true);

        return collect(self::STAGES)->map(function ($stage, $index) use ($position) {
            return [
                'key' => $stage,
                'label' => static::stageLabel($stage),
                'state' => $index < $position ? 'done' : ($index === $position ? 'current' : 'pending'),
                'date' => $index <= $position ? now()->subDays(($position - $index) * 2)->format('d M Y') : null,
            ];
        })->all();
    }

    // ---------------------------------------------------------------
    // Documents
    // ---------------------------------------------------------------

    public function documents(): array
    {
        return collect($this->data()['documents'])->sortByDesc('uploaded_at')->values()->all();
    }

    public function document(int|string $id): ?array
    {
        return collect($this->data()['documents'])->firstWhere('id', (int) $id);
    }

    public function storeDocument(UploadedFile $file, array $meta = []): array
    {
        $data = $this->data();
        $id = $data['next_ids']['documents']++;

        $path = $file->store('dashboard-uploads/'.$this->user->id, 'public');

        $document = [
            'id' => $id,
            'application_id' => $meta['application_id'] ?? null,
            'name' => $meta['name'] ?? $file->getClientOriginalName(),
            'type' => $meta['type'] ?? 'other',
            'status' => 'pending',
            'file_path' => $path,
            'file_url' => Storage::disk('public')->url($path),
            'size' => $file->getSize(),
            'uploaded_at' => now()->toDateTimeString(),
        ];

        $data['documents'][] = $document;
        $this->save($data);

        $this->pushNotification('document', 'Document uploaded', "\"{$document['name']}\" was uploaded and is pending review.", route('dashboard.documents'));

        return $document;
    }

    public function deleteDocument(int|string $id): void
    {
        $data = $this->data();
        $document = collect($data['documents'])->firstWhere('id', (int) $id);

        if ($document && $document['file_path'] && Storage::disk('public')->exists($document['file_path'])) {
            Storage::disk('public')->delete($document['file_path']);
        }

        $data['documents'] = collect($data['documents'])->reject(fn ($doc) => $doc['id'] === (int) $id)->values()->all();
        $this->save($data);
    }

    // ---------------------------------------------------------------
    // Payments & Invoices
    // ---------------------------------------------------------------

    public function payments(): array
    {
        return collect($this->data()['payments'])->sortByDesc('created_at')->values()->all();
    }

    public function payment(int|string $id): ?array
    {
        return collect($this->data()['payments'])->firstWhere('id', (int) $id);
    }

    public function markPaymentPaid(int|string $id): ?array
    {
        $data = $this->data();
        $index = collect($data['payments'])->search(fn ($payment) => $payment['id'] === (int) $id);

        if ($index === false) {
            return null;
        }

        $data['payments'][$index]['status'] = 'paid';
        $data['payments'][$index]['paid_at'] = now()->toDateTimeString();

        $invoiceId = $data['payments'][$index]['invoice_id'] ?? null;
        if ($invoiceId) {
            $invoiceIndex = collect($data['invoices'])->search(fn ($invoice) => $invoice['id'] === $invoiceId);
            if ($invoiceIndex !== false) {
                $data['invoices'][$invoiceIndex]['status'] = 'paid';
                $data['invoices'][$invoiceIndex]['paid_at'] = now()->toDateTimeString();
            }
        }

        $this->save($data);
        $this->pushNotification('payment', 'Payment received', "Payment of Rs {$data['payments'][$index]['amount']} for {$data['payments'][$index]['title']} was received.", route('dashboard.payments'));

        return $data['payments'][$index];
    }

    public function invoices(): array
    {
        return collect($this->data()['invoices'])->sortByDesc('issued_at')->values()->all();
    }

    public function invoice(int|string $id): ?array
    {
        return collect($this->data()['invoices'])->firstWhere('id', (int) $id);
    }

    // ---------------------------------------------------------------
    // Support tickets
    // ---------------------------------------------------------------

    public function tickets(): array
    {
        return collect($this->data()['tickets'])->sortByDesc('updated_at')->values()->all();
    }

    public function ticket(int|string $id): ?array
    {
        return collect($this->data()['tickets'])->firstWhere('id', (int) $id);
    }

    public function createTicket(array $attributes): array
    {
        $data = $this->data();
        $id = $data['next_ids']['tickets']++;

        $ticket = [
            'id' => $id,
            'reference' => 'TCK-'.now()->format('Y').'-'.str_pad((string) $id, 4, '0', STR_PAD_LEFT),
            'subject' => $attributes['subject'],
            'category' => $attributes['category'] ?? 'General',
            'priority' => $attributes['priority'] ?? 'Normal',
            'status' => 'open',
            'messages' => [
                ['from' => 'user', 'author' => $this->user->name, 'message' => $attributes['message'], 'at' => now()->toDateTimeString()],
            ],
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];

        $data['tickets'][] = $ticket;
        $this->save($data);

        $this->pushNotification('support', 'Ticket opened', "Support ticket {$ticket['reference']} has been created.", route('dashboard.support.show', $ticket['id']));

        return $ticket;
    }

    public function replyToTicket(int|string $id, string $message): ?array
    {
        $data = $this->data();
        $index = collect($data['tickets'])->search(fn ($ticket) => $ticket['id'] === (int) $id);

        if ($index === false) {
            return null;
        }

        $data['tickets'][$index]['messages'][] = [
            'from' => 'user',
            'author' => $this->user->name,
            'message' => $message,
            'at' => now()->toDateTimeString(),
        ];
        $data['tickets'][$index]['status'] = 'pending';
        $data['tickets'][$index]['messages'][] = [
            'from' => 'support',
            'author' => 'Support Team',
            'message' => 'Thanks for the update — a consultant will review this and respond within one business day.',
            'at' => now()->addMinute()->toDateTimeString(),
        ];
        $data['tickets'][$index]['updated_at'] = now()->toDateTimeString();

        $this->save($data);

        return $data['tickets'][$index];
    }

    // ---------------------------------------------------------------
    // Notifications
    // ---------------------------------------------------------------

    public function notifications(): array
    {
        return collect($this->data()['notifications'])->sortByDesc('created_at')->values()->all();
    }

    public function markNotificationRead(int|string $id): void
    {
        $data = $this->data();
        $data['notifications'] = collect($data['notifications'])->map(function ($notification) use ($id) {
            if ($notification['id'] === (int) $id) {
                $notification['read'] = true;
            }

            return $notification;
        })->all();
        $this->save($data);
    }

    public function markAllNotificationsRead(): void
    {
        $data = $this->data();
        $data['notifications'] = collect($data['notifications'])->map(function ($notification) {
            $notification['read'] = true;

            return $notification;
        })->all();
        $this->save($data);
    }

    protected function pushNotification(string $type, string $title, string $message, ?string $url = null): void
    {
        $data = $this->data();
        $id = $data['next_ids']['notifications']++;

        array_unshift($data['notifications'], [
            'id' => $id,
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'url' => $url,
            'read' => false,
            'created_at' => now()->toDateTimeString(),
        ]);

        $this->save($data);
    }

    // ---------------------------------------------------------------
    // Aggregates
    // ---------------------------------------------------------------

    public function stats(): array
    {
        $applications = $this->applications();
        $documents = $this->documents();
        $payments = $this->payments();
        $tickets = $this->tickets();
        $notifications = $this->notifications();

        return [
            'active_applications' => collect($applications)->whereNotIn('status', ['completed'])->count(),
            'completed_applications' => collect($applications)->where('status', 'completed')->count(),
            'pending_documents' => collect($documents)->where('status', 'pending')->count(),
            'pending_payments_count' => collect($payments)->where('status', 'pending')->count(),
            'pending_payments_total' => collect($payments)->where('status', 'pending')->sum('amount'),
            'open_tickets' => collect($tickets)->whereNotIn('status', ['closed'])->count(),
            'unread_notifications' => collect($notifications)->where('read', false)->count(),
            'profile_completion' => $this->profileCompletion(),
        ];
    }

    public function profileCompletion(): int
    {
        $fields = [$this->user->name, $this->user->email, $this->user->phone, $this->user->cnic, $this->user->address, $this->user->city, $this->user->avatar_path];
        $filled = collect($fields)->filter(fn ($value) => filled($value))->count();

        return (int) round(($filled / count($fields)) * 100);
    }

    // ---------------------------------------------------------------
    // Storage helpers
    // ---------------------------------------------------------------

    protected function data(): array
    {
        return session($this->key);
    }

    protected function save(array $data): void
    {
        session([$this->key => $data]);
    }

    protected function seed(): array
    {
        $now = now();

        $applications = [
            [
                'id' => 1,
                'service' => 'personal-tax',
                'title' => 'Personal Tax Filing',
                'reference' => 'APP-'.$now->format('Y').'-0001',
                'status' => 'completed',
                'timeline' => [],
                'meta' => ['tax_year' => $now->format('Y')],
                'created_at' => $now->copy()->subDays(40)->toDateTimeString(),
                'updated_at' => $now->copy()->subDays(30)->toDateTimeString(),
            ],
            [
                'id' => 2,
                'service' => 'ntn',
                'title' => 'NTN Registration',
                'reference' => 'APP-'.$now->format('Y').'-0002',
                'status' => 'approved',
                'timeline' => [],
                'meta' => [],
                'created_at' => $now->copy()->subDays(20)->toDateTimeString(),
                'updated_at' => $now->copy()->subDays(5)->toDateTimeString(),
            ],
            [
                'id' => 3,
                'service' => 'sales-tax',
                'title' => 'Sales Tax Registration',
                'reference' => 'APP-'.$now->format('Y').'-0003',
                'status' => 'documents_required',
                'timeline' => [],
                'meta' => [],
                'created_at' => $now->copy()->subDays(10)->toDateTimeString(),
                'updated_at' => $now->copy()->subDays(1)->toDateTimeString(),
            ],
            [
                'id' => 4,
                'service' => 'business-registration',
                'title' => 'Business Registration',
                'reference' => 'APP-'.$now->format('Y').'-0004',
                'status' => 'under_review',
                'timeline' => [],
                'meta' => [],
                'created_at' => $now->copy()->subDays(4)->toDateTimeString(),
                'updated_at' => $now->copy()->subHours(6)->toDateTimeString(),
            ],
        ];

        foreach ($applications as &$application) {
            $application['timeline'] = $this->buildTimeline($application['status']);
        }
        unset($application);

        $documents = [
            ['id' => 1, 'application_id' => 1, 'name' => 'CNIC Front & Back.pdf', 'type' => 'cnic', 'status' => 'verified', 'file_path' => null, 'file_url' => null, 'size' => 482304, 'uploaded_at' => $now->copy()->subDays(39)->toDateTimeString()],
            ['id' => 2, 'application_id' => 1, 'name' => 'Salary Certificate.pdf', 'type' => 'salary_slip', 'status' => 'verified', 'file_path' => null, 'file_url' => null, 'size' => 210044, 'uploaded_at' => $now->copy()->subDays(38)->toDateTimeString()],
            ['id' => 3, 'application_id' => 3, 'name' => 'Bank Statement - Jun.pdf', 'type' => 'bank_statement', 'status' => 'pending', 'file_path' => null, 'file_url' => null, 'size' => 664200, 'uploaded_at' => $now->copy()->subDays(2)->toDateTimeString()],
            ['id' => 4, 'application_id' => 4, 'name' => 'Business Incorporation Draft.pdf', 'type' => 'other', 'status' => 'rejected', 'file_path' => null, 'file_url' => null, 'size' => 331200, 'uploaded_at' => $now->copy()->subDays(3)->toDateTimeString()],
            ['id' => 5, 'application_id' => 2, 'name' => 'CNIC Copy.pdf', 'type' => 'cnic', 'status' => 'verified', 'file_path' => null, 'file_url' => null, 'size' => 402100, 'uploaded_at' => $now->copy()->subDays(19)->toDateTimeString()],
        ];

        $invoices = [
            ['id' => 1, 'number' => 'INV-'.$now->format('Y').'-0001', 'title' => 'Personal Tax Filing Fee', 'amount' => 2999, 'status' => 'paid', 'issued_at' => $now->copy()->subDays(38)->toDateTimeString(), 'paid_at' => $now->copy()->subDays(36)->toDateTimeString(), 'items' => [['label' => 'Personal Tax Filing - Standard', 'amount' => 2999]]],
            ['id' => 2, 'number' => 'INV-'.$now->format('Y').'-0002', 'title' => 'NTN Registration Fee', 'amount' => 1999, 'status' => 'paid', 'issued_at' => $now->copy()->subDays(18)->toDateTimeString(), 'paid_at' => $now->copy()->subDays(16)->toDateTimeString(), 'items' => [['label' => 'NTN Registration - FBR Filing', 'amount' => 1999]]],
            ['id' => 3, 'number' => 'INV-'.$now->format('Y').'-0003', 'title' => 'Sales Tax Registration Fee', 'amount' => 4999, 'status' => 'unpaid', 'issued_at' => $now->copy()->subDays(9)->toDateTimeString(), 'paid_at' => null, 'items' => [['label' => 'GST Registration', 'amount' => 3999], ['label' => 'Compliance Onboarding', 'amount' => 1000]]],
        ];

        $payments = [
            ['id' => 1, 'invoice_id' => 1, 'title' => 'Personal Tax Filing Fee', 'amount' => 2999, 'status' => 'paid', 'due_date' => $now->copy()->subDays(38)->format('Y-m-d'), 'paid_at' => $now->copy()->subDays(36)->toDateTimeString(), 'created_at' => $now->copy()->subDays(38)->toDateTimeString()],
            ['id' => 2, 'invoice_id' => 2, 'title' => 'NTN Registration Fee', 'amount' => 1999, 'status' => 'paid', 'due_date' => $now->copy()->subDays(18)->format('Y-m-d'), 'paid_at' => $now->copy()->subDays(16)->toDateTimeString(), 'created_at' => $now->copy()->subDays(18)->toDateTimeString()],
            ['id' => 3, 'invoice_id' => 3, 'title' => 'Sales Tax Registration Fee', 'amount' => 4999, 'status' => 'pending', 'due_date' => $now->copy()->addDays(5)->format('Y-m-d'), 'paid_at' => null, 'created_at' => $now->copy()->subDays(9)->toDateTimeString()],
        ];

        $tickets = [
            [
                'id' => 1,
                'reference' => 'TCK-'.$now->format('Y').'-0001',
                'subject' => 'Question about withholding tax credit',
                'category' => 'Tax Filing',
                'priority' => 'Normal',
                'status' => 'pending',
                'messages' => [
                    ['from' => 'user', 'author' => $this->user->name, 'message' => 'Where can I see the withholding tax credit applied on my return?', 'at' => $now->copy()->subDays(3)->toDateTimeString()],
                    ['from' => 'support', 'author' => 'Support Team', 'message' => 'Hi, it is listed under the Tax Credits section of your filed return summary. We will email a copy shortly.', 'at' => $now->copy()->subDays(2)->toDateTimeString()],
                ],
                'created_at' => $now->copy()->subDays(3)->toDateTimeString(),
                'updated_at' => $now->copy()->subDays(2)->toDateTimeString(),
            ],
            [
                'id' => 2,
                'reference' => 'TCK-'.$now->format('Y').'-0002',
                'subject' => 'Update business address on registration',
                'category' => 'Business Registration',
                'priority' => 'Low',
                'status' => 'closed',
                'messages' => [
                    ['from' => 'user', 'author' => $this->user->name, 'message' => 'I need to update my registered business address.', 'at' => $now->copy()->subDays(12)->toDateTimeString()],
                    ['from' => 'support', 'author' => 'Support Team', 'message' => 'Done — your business address has been updated and confirmed.', 'at' => $now->copy()->subDays(11)->toDateTimeString()],
                ],
                'created_at' => $now->copy()->subDays(12)->toDateTimeString(),
                'updated_at' => $now->copy()->subDays(11)->toDateTimeString(),
            ],
        ];

        $notifications = [
            ['id' => 1, 'type' => 'application', 'title' => 'Documents required', 'message' => 'Your Sales Tax Registration application needs one more document.', 'url' => null, 'read' => false, 'created_at' => $now->copy()->subHours(4)->toDateTimeString()],
            ['id' => 2, 'type' => 'payment', 'title' => 'Invoice due soon', 'message' => 'Invoice INV-'.$now->format('Y').'-0003 (Rs 4,999) is due in 5 days.', 'url' => null, 'read' => false, 'created_at' => $now->copy()->subHours(9)->toDateTimeString()],
            ['id' => 3, 'type' => 'support', 'title' => 'Ticket reply received', 'message' => 'Support replied to TCK-'.$now->format('Y').'-0001.', 'url' => null, 'read' => false, 'created_at' => $now->copy()->subDays(2)->toDateTimeString()],
            ['id' => 4, 'type' => 'application', 'title' => 'Application approved', 'message' => 'Your NTN Registration application was approved.', 'url' => null, 'read' => true, 'created_at' => $now->copy()->subDays(5)->toDateTimeString()],
            ['id' => 5, 'type' => 'document', 'title' => 'Document rejected', 'message' => 'Business Incorporation Draft.pdf needs to be re-uploaded.', 'url' => null, 'read' => true, 'created_at' => $now->copy()->subDays(3)->toDateTimeString()],
            ['id' => 6, 'type' => 'system', 'title' => 'Welcome to your dashboard', 'message' => 'Track filings, documents, and payments from one place.', 'url' => null, 'read' => true, 'created_at' => $now->copy()->subDays(40)->toDateTimeString()],
        ];

        return [
            'applications' => $applications,
            'documents' => $documents,
            'invoices' => $invoices,
            'payments' => $payments,
            'tickets' => $tickets,
            'notifications' => $notifications,
            'next_ids' => [
                'applications' => 5,
                'documents' => 6,
                'tickets' => 3,
                'notifications' => 7,
            ],
        ];
    }
}
