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
        .success-box { background: #d1fae5; border: 1px solid #86efac; border-radius: 8px; padding: 20px; text-align: center; margin: 20px 0; }
        .success-box .checkmark { font-size: 48px; color: #0f7a4e; }
        .doc-info { background: #fff; border-radius: 8px; padding: 15px; margin: 15px 0; border-left: 4px solid #0f7a4e; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; background: #fff; border-radius: 0 0 10px 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Document Approved</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            
            <div class="success-box">
                <div class="checkmark">&#10004;</div>
                <h3 style="margin: 10px 0 5px; color: #0f7a4e;">Document Approved!</h3>
            </div>

            <p>Great news! Your document has been reviewed and <strong>approved</strong> by our team.</p>

            <div class="doc-info">
                <p style="margin: 0;"><strong>Document:</strong> {{ $document->name }}</p>
                @if($document->service)
                    <p style="margin: 5px 0 0;"><strong>Service:</strong> {{ $document->service->name }}</p>
                @endif
            </div>

            <p>Your document is now verified and on file. You can continue with the next steps in your tax filing process.</p>

            <p>View your documents in your <a href="{{ route('dashboard.index') }}">portal dashboard</a>.</p>
            
            <p>Best regards,<br><strong>FINANIC Business Consultants Team</strong></p>
        </div>
        <div class="footer">
            <p>FINANIC Business Consultants | Faisalabad, Pakistan</p>
        </div>
    </div>
</body>
</html>
