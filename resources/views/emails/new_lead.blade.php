<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #1a5276; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; }
        .info { background-color: #e8f4fc; padding: 15px; border-left: 4px solid #1a5276; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Lead Notification</h1>
        </div>
        <div class="content">
            <h2>New Contact Form Submission</h2>
            <div class="info">
                <p><strong>Name:</strong> {{ $contact->name }}</p>
                <p><strong>Email:</strong> {{ $contact->email }}</p>
                <p><strong>Phone:</strong> {{ $contact->phone ?? 'Not provided' }}</p>
                <p><strong>Service Interest:</strong> {{ $contact->service_interest ?? 'Not specified' }}</p>
                <p><strong>Preferred Contact Method:</strong> {{ $contact->preferred_contact_method ?? 'Email' }}</p>
            </div>
            <p><strong>Message:</strong></p>
            <p>{{ $contact->message }}</p>
            <p><a href="{{ route('admin.contacts.show', $contact->id) }}">View in Admin Panel</a></p>
        </div>
        <div class="footer">
            <p>FINANIC Business Consultants Admin System</p>
        </div>
    </div>
</body>
</html>
