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
        .reject-box { background: #fee2e2; border: 1px solid #fca5a5; border-radius: 8px; padding: 20px; text-align: center; margin: 20px 0; }
        .reject-box .crossmark { font-size: 48px; color: #dc2626; }
        .doc-info { background: #fff; border-radius: 8px; padding: 15px; margin: 15px 0; border-left: 4px solid #0f7a4e; }
        .reject-info { background: #fff; border-radius: 8px; padding: 15px; margin: 15px 0; border-left: 4px solid #dc2626; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; background: #fff; border-radius: 0 0 10px 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Document {{ ucfirst($status) }}</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $document->user->name }},</h2>

            @if($status === 'approved')
                <div class="success-box">
                    <div class="checkmark">&#10004;</div>
                    <h3 style="margin: 10px 0 5px; color: #0f7a4e;">Document Approved!</h3>
                </div>
                <p>Great news! Your document has been reviewed and <strong>approved</strong> by our team.</p>
            @else
                <div class="reject-box">
                    <div class="crossmark">&#10008;</div>
                    <h3 style="margin: 10px 0 5px; color: #dc2626;">Document Requires Revision</h3>
                </div>
                <p>Your document has been reviewed and requires revision before it can be approved.</p>
            @endif

            <div class="{{ $status === 'approved' ? 'doc-info' : 'reject-info' }}">
                <p style="margin: 0;"><strong>Document:</strong> {{ $document->name }}</p>
                @if($document->service)
                    <p style="margin: 5px 0 0;"><strong>Service:</strong> {{ $document->service->name }}</p>
                @endif
                @if($status === 'rejected' && $rejectionReason)
                    <p style="margin: 5px 0 0;"><strong>Reason:</strong> {{ $rejectionReason }}</p>
                @endif
            </div>

            @if($status === 'approved')
                <p>Your document is now verified and on file. You can continue with the next steps in your tax filing process.</p>
            @else
                <p>Please review the feedback above, make the necessary changes, and re-upload your document.</p>
            @endif

            <p style="text-align: center; margin: 30px 0;">
                <a href="{{ route('dashboard.index') }}" style="display: inline-block; padding: 12px 30px; background: #0f7a4e; color: #fff; text-decoration: none; border-radius: 8px; font-weight: bold;">Go to Dashboard</a>
            </p>

            <p>Best regards,<br><strong>FINANIC Business Consultants Team</strong></p>
        </div>
        <div class="footer">
            <p>FINANIC Business Consultants | Faisalabad, Pakistan</p>
        </div>
    </div>
</body>
</html>
