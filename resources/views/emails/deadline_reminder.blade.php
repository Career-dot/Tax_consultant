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
        .deadline { background-color: #fff3cd; padding: 15px; border-left: 4px solid #ffc107; margin: 10px 0; }
        .urgent { background-color: #f8d7da; border-left-color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tax Deadline Reminder</h1>
        </div>
        <div class="content">
            <h2>Upcoming Tax Deadline</h2>
            <p>Dear {{ $subscription->name }},</p>
            <div class="deadline {{ $daysUntil <= 2 ? 'urgent' : '' }}">
                <p><strong>{{ $deadline->name }}</strong></p>
                <p>Due Date: {{ $deadline->due_date->format('F j, Y') }}</p>
                @if($daysUntil <= 0)
                    <p><strong>This deadline is TODAY!</strong></p>
                @elseif($daysUntil == 1)
                    <p><strong>Due TOMORROW!</strong></p>
                @else
                    <p>{{ $daysUntil }} days remaining</p>
                @endif
            </div>
            @if($deadline->description)
                <p>{{ $deadline->description }}</p>
            @endif
            <p>Please ensure all required documents and filings are prepared before the deadline.</p>
            <p>Best regards,<br>FINANIC Business Consultants Team</p>
        </div>
        <div class="footer">
            <p>FINANIC Business Consultants | Faisalabad, Pakistan</p>
            <p>Phone: +92-XXX-XXXXXXX | Email: info@finanic.com</p>
        </div>
    </div>
</body>
</html>
