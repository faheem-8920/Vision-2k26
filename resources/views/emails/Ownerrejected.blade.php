<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Owner Application Rejected</title>
</head>

<body style="margin:0;padding:30px;background:#f4f4f4;font-family:Arial,Helvetica,sans-serif;">

<table align="center" width="650" cellpadding="0" cellspacing="0"
    style="background:#ffffff;border-radius:18px;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,.12);">

    <!-- Header -->
    <tr>
        <td align="center"
            style="background:linear-gradient(135deg,#d90429,#ef233c);padding:40px;">

            <div style="width:90px;height:90px;background:#ffffff;border-radius:50%;line-height:90px;font-size:42px;">
                ❌
            </div>

            <h1 style="color:#ffffff;margin:20px 0 10px;">
                Application Not Approved
            </h1>

            <p style="margin:0;color:#ffe5e5;font-size:18px;">
                Update Regarding Your Owner Application
            </p>

        </td>
    </tr>

    <!-- Greeting -->
    <tr>
        <td style="padding:40px;">

            <h2 style="margin-top:0;color:#d90429;">
                Hello, {{ $user->name }}
            </h2>

            <p style="font-size:16px;line-height:30px;color:#555;">
                Thank you for your interest in becoming an <strong>Owner</strong>
                on <strong>Rentify</strong>. After carefully reviewing your
                application, we're sorry to inform you that it has
                <strong style="color:#d90429;">not been approved</strong> at this time.
            </p>

        </td>
    </tr>

    <!-- Status -->
    <tr>
        <td style="padding:0 40px 30px;">

            <table width="100%" cellpadding="15"
                style="border:1px solid #f1d5d5;border-radius:12px;background:#fff8f8;">

                <tr>
                    <td colspan="2"
                        style="background:#d90429;color:#ffffff;font-size:18px;font-weight:bold;">
                        Application Status
                    </td>
                </tr>

                <tr>
                    <td width="35%"><strong>❌ Status</strong></td>
                    <td style="color:#d90429;font-weight:bold;">Rejected</td>
                </tr>

                <tr style="background:#ffffff;">
                    <td><strong>👤 Applicant</strong></td>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <td><strong>📅 Review Date</strong></td>
                    <td>{{ now()->format('F d, Y') }}</td>
                </tr>

            </table>

        </td>
    </tr>

    <!-- Reasons -->
    <tr>
        <td style="padding:0 40px 30px;">

            <table width="100%"
                style="background:#fff5f5;border-left:5px solid #d90429;border-radius:8px;">

                <tr>
                    <td style="padding:20px;">

                        <h3 style="margin-top:0;color:#d90429;">
                            ℹ️ Possible Reasons
                        </h3>

                        <p style="margin-bottom:0;color:#555;line-height:28px;">
                            Your application may not have been approved due to one
                            or more of the following:
                        </p>

                        <ul style="color:#555;line-height:28px;padding-left:20px;margin-bottom:0;">
                            <li>Incomplete or incorrect information.</li>
                            <li>Verification could not be completed.</li>
                            <li>Required documents were missing.</li>
                            <li>The application did not meet Rentify's owner requirements.</li>
                        </ul>

                    </td>
                </tr>

            </table>

        </td>
    </tr>

    <!-- Next Steps -->
    <tr>
        <td align="center" style="padding:0 40px 40px;">

            <div style="background:#f8fafc;border:1px dashed #d90429;border-radius:10px;padding:20px;">

                <h3 style="margin-top:0;color:#d90429;">
                    🔄 What You Can Do Next
                </h3>

                <p style="margin:0;color:#666;line-height:28px;">
                    You are welcome to review your profile, update any missing or
                    incorrect information, and submit a new owner application in
                    the future if you meet the platform requirements.
                </p>

            </div>

        </td>
    </tr>

    <!-- Encouragement -->
    <tr>
        <td align="center" style="padding:0 40px 40px;">

            <div style="background:#fff8f8;border:1px solid #ffd6d6;border-radius:10px;padding:20px;">

                <h3 style="margin-top:0;color:#d90429;">
                    ❤️ Thank You
                </h3>

                <p style="margin:0;color:#666;line-height:28px;">
                    We appreciate your interest in joining the Rentify Owner
                    Community and encourage you to apply again after addressing
                    the above requirements.
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