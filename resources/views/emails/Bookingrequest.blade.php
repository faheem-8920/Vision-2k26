<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Booking Request</title>
</head>

<body style="margin:0;padding:30px;background:#f4f4f4;font-family:Arial,Helvetica,sans-serif;">

<table align="center" width="650" cellpadding="0" cellspacing="0"
    style="background:#ffffff;border-radius:18px;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,.12);">

    <!-- Header -->
    <tr>
        <td align="center"
            style="background:linear-gradient(135deg,#d90429,#ef233c);padding:40px;">

            <div style="width:90px;height:90px;background:#ffffff;border-radius:50%;line-height:90px;font-size:42px;">
                📩
            </div>

            <h1 style="color:#ffffff;margin:20px 0 10px;">
                New Booking Request
            </h1>

            <p style="margin:0;color:#ffe5e5;font-size:18px;">
                A customer wants to rent your item
            </p>

        </td>
    </tr>

    <!-- Greeting -->
    <tr>
        <td style="padding:40px;">

            <h2 style="margin-top:0;color:#d90429;">
                Hello, {{ $booking->item->user->name }} 👋
            </h2>

            <p style="font-size:16px;line-height:30px;color:#555;">
                Great news! You have received a new booking request on
                <strong>Rentify</strong>. Review the request details below and
                decide whether you'd like to approve or decline it.
            </p>

        </td>
    </tr>

    <!-- Booking Details -->
    <tr>
        <td style="padding:0 40px 30px;">

            <table width="100%" cellpadding="15"
                style="border:1px solid #f1d5d5;border-radius:12px;background:#fff8f8;">

                <tr>
                    <td colspan="2"
                        style="background:#d90429;color:#ffffff;font-size:18px;font-weight:bold;">
                        Booking Details
                    </td>
                </tr>

                <tr>
                    <td width="35%"><strong>📦 Item</strong></td>
                    <td>{{ $booking->item->title }}</td>
                </tr>

                <tr style="background:#ffffff;">
                    <td><strong>👤 Renter</strong></td>
                    <td>{{ $booking->user->name }}</td>
                </tr>

                <tr>
                    <td><strong>📧 Email</strong></td>
                    <td>{{ $booking->user->email }}</td>
                </tr>

                <tr style="background:#ffffff;">
                    <td><strong>📅 Rental Start</strong></td>
                    <td>{{ $booking->start_date }}</td>
                </tr>

                <tr>
                    <td><strong>📅 Rental End</strong></td>
                    <td>{{ $booking->end_date }}</td>
                </tr>

            </table>

        </td>
    </tr>

    <!-- Action Required -->
    <tr>
        <td style="padding:0 40px 30px;">

            <table width="100%"
                style="background:#fff5f5;border-left:5px solid #d90429;border-radius:8px;">

                <tr>
                    <td style="padding:20px;">

                        <h3 style="margin-top:0;color:#d90429;">
                            ⚡ Action Required
                        </h3>

                        <p style="margin-bottom:0;color:#555;line-height:28px;">
                            Please log in to your <strong>Owner Dashboard</strong> to
                            review this booking request. You can approve or reject the
                            request based on your item's availability.
                        </p>

                    </td>
                </tr>

            </table>

        </td>
    </tr>

    <!-- Reminder -->
    <tr>
        <td align="center" style="padding:0 40px 40px;">

            <div style="background:#f8fafc;border:1px dashed #d90429;border-radius:10px;padding:20px;">

                <h3 style="margin-top:0;color:#d90429;">
                    ⏳ Respond Promptly
                </h3>

                <p style="margin:0;color:#666;line-height:28px;">
                    Responding quickly helps provide a better experience for renters
                    and increases trust on the Rentify platform.
                </p>

            </div>

        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td align="center"
            style="background:#1f2937;padding:35px;color:#d1d5db;">

            <h2 style="margin:0;color:#ffffff;">
                Rentify
            </h2>

            <p style="margin:10px 0;">
                Connecting Owners & Renters
            </p>

            <hr style="border:none;border-top:1px solid #374151;width:80%;margin:20px auto;">

            <p style="font-size:13px;margin:0;">
                © {{ date('Y') }} Rentify. All Rights Reserved.
            </p>

        </td>
    </tr>

</table>

</body>
</html>