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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FINANIC Business Consultants</h1>
        </div>
        <div class="content">
            <h2>Thank You for Contacting Us</h2>
            <p>Dear {{ $contact->name }},</p>
            <p>We have received your message and will get back to you shortly.</p>
            <p><strong>Your Message:</strong></p>
            <p><em>"{{ $contact->message }}"</em></p>
            <p>Our team will review your inquiry and respond within one business day.</p>
            <p>Best regards,<br>FINANIC Business Consultants Team</p>
        </div>
        <div class="footer">
            <p>FINANIC Business Consultants | Faisalabad, Pakistan</p>
            <p>Phone: +92-XXX-XXXXXXX | Email: info@finanic.com</p>
        </div>
    </div>
</body>
</html>
