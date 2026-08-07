<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #0f7a4e, #084b31); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { padding: 30px; background: #f9f9f9; }
        .content h2 { color: #0f7a4e; margin-top: 0; }
        .info-box { background: #fff; border-left: 4px solid #0f7a4e; padding: 15px; margin: 20px 0; border-radius: 0 8px 8px 0; }
        .info-box p { margin: 5px 0; }
        .btn { display: inline-block; padding: 12px 30px; background: #0f7a4e; color: #fff !important; text-decoration: none; border-radius: 8px; font-weight: bold; margin: 15px 0; }
        .btn:hover { background: #084b31; }
        .warning { background: #fef3c7; border: 1px solid #fcd34d; padding: 15px; border-radius: 8px; margin: 20px 0; }
        .warning p { margin: 5px 0; color: #92400e; font-size: 13px; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; background: #fff; border-radius: 0 0 10px 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Login Notification</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            <p>We noticed a new login to your <strong>FINANIC Business Consultants</strong> account.</p>

            <div class="info-box">
                <p><strong>Login Details:</strong></p>
                <p>Email: {{ $user->email }}</p>
                <p>Time: {{ now()->format('F j, Y \a\t g:i A') }}</p>
                <p>IP Address: {{ request()->ip() }}</p>
            </div>

            <p style="text-align: center; margin: 30px 0;">
                <a href="{{ route('portal.dashboard') }}" class="btn">Go to Dashboard</a>
            </p>

            <div class="warning">
                <p><strong>Wasn't you?</strong></p>
                <p>If you did not perform this login, please change your password immediately and contact our support team.</p>
            </div>

            <p>Best regards,<br><strong>FINANIC Business Consultants Team</strong></p>
        </div>
        <div class="footer">
            <p>FINANIC Business Consultants | Faisalabad, Pakistan</p>
            <p>Phone: +92-XXX-XXXXXXX | Email: info@finanic.com</p>
        </div>
    </div>
</body>
</html>
