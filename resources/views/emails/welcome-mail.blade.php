<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Website</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f8f9fa; margin: 0; padding: 0;">
    <table width="100%" style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <thead>
            <tr style="background-color: #007bff; color: #ffffff; text-align: center;">
                <th style="padding: 20px;">
                    <h1>Welcome, {{ $user->name }}!</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 20px; text-align: left; color: #333333;">
                    <p>Hi {{ $user->name }},</p>
                    <p>Thank you for registering with us! We’re excited to have you on board. Our platform is designed to help you get the best experience, and we’re here to assist you every step of the way.</p>
                    <p>Here are your details:</p>
                    <ul style="line-height: 1.8;">
                        <li><strong>Name:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                    </ul>
                    <p>If you have any questions, feel free to reach out to our support team at <a href="mailto:support@example.com">support@example.com</a>.</p>
                    <p>We hope you enjoy your journey with us!</p>
                    <p>Best regards,<br>Team {{ config('app.name') }}</p>
                </td>
            </tr>
            <tr>
                <td style="padding: 20px; background-color: #f1f1f1; text-align: center; font-size: 12px; color: #666;">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
