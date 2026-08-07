<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #dc3545, #a71d2a); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { padding: 30px; background: #f9f9f9; }
        .content h2 { color: #dc3545; margin-top: 0; }
        .error-box { background: #fde8e8; border: 1px solid #f5c6c6; border-radius: 8px; padding: 20px; text-align: center; margin: 20px 0; }
        .error-box .crossmark { font-size: 48px; color: #dc3545; }
        .doc-info { background: #fff; border-radius: 8px; padding: 15px; margin: 15px 0; border-left: 4px solid #dc3545; }
        .reason-box { background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px; padding: 15px; margin: 15px 0; }
        .reason-box strong { color: #dc3545; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; background: #fff; border-radius: 0 0 10px 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Document Requires Revision</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            
            <div class="error-box">
                <div class="crossmark">&#10008;</div>
                <h3 style="margin: 10px 0 5px; color: #dc3545;">Document Not Accepted</h3>
            </div>

            <p>Your document has been reviewed and requires revision. Please review the feedback below and re-upload the corrected document.</p>

            <div class="doc-info">
                <p style="margin: 0;"><strong>Document:</strong> {{ $document->name }}</p>
                @if($document->service)
                    <p style="margin: 5px 0 0;"><strong>Service:</strong> {{ $document->service->name }}</p>
                @endif
            </div>

            @if($document->rejection_reason)
                <div class="reason-box">
                    <strong>Reason for Rejection:</strong>
                    <p style="margin: 5px 0 0;">{{ $document->rejection_reason }}</p>
                </div>
            @endif

            <p><strong>What to do next:</strong></p>
            <ol>
                <li>Review the rejection reason above</li>
                <li>Prepare the corrected document</li>
                <li>Log in to your portal and re-upload the document</li>
            </ol>

            <p>You can re-upload your document from your <a href="{{ route('portal.dashboard') }}">portal dashboard</a>.</p>
            
            <p>If you have questions, please contact us at <a href="mailto:info@finanic.com">info@finanic.com</a>.</p>
            
            <p>Best regards,<br><strong>FINANIC Business Consultants Team</strong></p>
        </div>
        <div class="footer">
            <p>FINANIC Business Consultants | Faisalabad, Pakistan</p>
        </div>
    </div>
</body>
</html>
