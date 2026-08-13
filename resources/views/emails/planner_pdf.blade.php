<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tax Compliance Calendar - FINANIC</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; margin: 40px; color: #333; }
        h1 { color: #1a5276; font-size: 24px; border-bottom: 2px solid #1a5276; padding-bottom: 10px; }
        h2 { color: #2c3e50; font-size: 18px; margin-top: 30px; }
        .header { text-align: center; margin-bottom: 30px; }
        .header p { color: #666; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #1a5276; color: white; padding: 12px 8px; text-align: left; font-size: 13px; }
        td { padding: 10px 8px; border-bottom: 1px solid #eee; font-size: 13px; }
        tr:nth-child(even) { background: #f8f9fa; }
        .urgent { color: #dc3545; font-weight: bold; }
        .warning { color: #ffc107; font-weight: bold; }
        .footer { margin-top: 40px; text-align: center; font-size: 11px; color: #999; border-top: 1px solid #eee; padding-top: 15px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>FINANIC Business Consultants</h1>
        <p>Tax Compliance Calendar</p>
        <p>Generated: {{ now()->format('F j, Y') }}</p>
        @if(isset($subscription))
        <p>Subscriber: {{ $subscription->name }} | Type: {{ ucwords(str_replace('_', ' ', $subscription->taxpayer_type)) }}</p>
        @endif
    </div>

    @if($deadlines->count())
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Due Date</th>
                <th>Deadline</th>
                <th>Days Left</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deadlines as $index => $deadline)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $deadline->due_date->format('M j, Y') }}</td>
                <td>{{ $deadline->name }}</td>
                <td class="{{ $deadline->due_date->diffInDays(now()) <= 2 ? 'urgent' : ($deadline->due_date->diffInDays(now()) <= 7 ? 'warning' : '') }}">
                    {{ $deadline->due_date->diffInDays(now()) }} days
                </td>
                <td>{{ $deadline->description ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No upcoming deadlines found.</p>
    @endif

    <div class="footer">
        <p>FINANIC Business Consultants | Faisalabad, Punjab, Pakistan</p>
        <p>This calendar is for informational purposes. Always verify deadlines with FBR.</p>
    </div>
</body>
</html>
