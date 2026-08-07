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
        .btn { display: inline-block; padding: 12px 30px; background: #0f7a4e; color: #fff !important; text-decoration: none; border-radius: 8px; font-weight: bold; margin: 15px 0; }
        .btn:hover { background: #084b31; }
        .steps { background: #fff; border-radius: 8px; padding: 20px; margin: 20px 0; }
        .steps li { margin-bottom: 10px; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; background: #fff; border-radius: 0 0 10px 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to FINANIC!</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            <p>Welcome to <strong>FINANIC Business Consultants</strong>! Your account has been created successfully.</p>
            <p>You're now part of thousands of Pakistanis who trust us with their tax compliance. Here's what you can do next:</p>
            
            <div class="steps">
                <ol>
                    <li><strong>Make Payment</strong> - Upload your payment screenshot for verification</li>
                    <li><strong>Upload Documents</strong> - Submit your required tax documents</li>
                    <li><strong>Track Progress</strong> - Monitor your filing status in real-time</li>
                </ol>
            </div>

            <p style="text-align: center; margin: 30px 0;">
                <a href="{{ route('portal.dashboard') }}" class="btn">Get Started Now</a>
            </p>

            <p>If you have any questions, feel free to reach out to us at <a href="mailto:info@finanic.com">info@finanic.com</a>.</p>
            
            <p>Best regards,<br><strong>FINANIC Business Consultants Team</strong></p>
        </div>
        <div class="footer">
            <p>FINANIC Business Consultants | Faisalabad, Pakistan</p>
            <p>Phone: +92-XXX-XXXXXXX | Email: info@finanic.com</p>
        </div>
    </div>
</body>
</html>
