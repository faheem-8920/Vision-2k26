<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to Rentify</title>
</head>

<body style="margin:0;padding:30px;background:#f3f4f6;font-family:Arial,Helvetica,sans-serif;">

<table align="center" cellpadding="0" cellspacing="0" width="650"
    style="background:#ffffff;border-radius:18px;overflow:hidden;box-shadow:0 12px 35px rgba(0,0,0,.12);">

    <!-- Header -->
    <tr>
        <td align="center"
            style="background:linear-gradient(135deg,#d90429,#ef233c);padding:45px 30px;">

            <div style="width:90px;height:90px;background:#ffffff;border-radius:50%;line-height:90px;font-size:40px;">
                🏠
            </div>

            <h1 style="color:#ffffff;margin:25px 0 10px;font-size:34px;">
                Welcome to Rentify
            </h1>

            <p style="color:#ffeaea;font-size:18px;margin:0;">
                Pakistan's Trusted Rental Marketplace
            </p>

        </td>
    </tr>

    <!-- Greeting -->
    <tr>
        <td style="padding:45px 45px 20px;">

            <h2 style="color:#d90429;font-size:28px;margin:0 0 20px;">
                Hello, {{ $user->name }} 👋
            </h2>

            <p style="font-size:17px;color:#555;line-height:32px;margin:0;">
                Thank you for joining <strong>Rentify</strong>. Your account has been created successfully.
                We're excited to have you as part of our growing community where renting and earning has never been easier.
            </p>

        </td>
    </tr>

    <!-- Feature Cards -->
    <tr>
        <td style="padding:20px 45px;">

            <table width="100%" cellspacing="0" cellpadding="12">

                <tr>

                    <td width="50%"
                        style="background:#fff5f5;border:1px solid #ffd4d4;border-radius:12px;padding:18px;">
                        <h3 style="margin:0;color:#d90429;">📦 Rent Items</h3>
                        <p style="margin-top:10px;color:#666;line-height:24px;">
                            Browse hundreds of quality rental items across multiple categories.
                        </p>
                    </td>

                    <td width="20"></td>

                    <td width="50%"
                        style="background:#fff5f5;border:1px solid #ffd4d4;border-radius:12px;padding:18px;">
                        <h3 style="margin:0;color:#d90429;">💰 Earn Money</h3>
                        <p style="margin-top:10px;color:#666;line-height:24px;">
                            Become an owner and start earning by listing your own items.
                        </p>
                    </td>

                </tr>

                <tr><td height="18"></td></tr>

                <tr>

                    <td
                        style="background:#fff5f5;border:1px solid #ffd4d4;border-radius:12px;padding:18px;">
                        <h3 style="margin:0;color:#d90429;">🔒 Secure Bookings</h3>
                        <p style="margin-top:10px;color:#666;line-height:24px;">
                            Request rentals with confidence through our secure booking process.
                        </p>
                    </td>

                    <td></td>

                    <td
                        style="background:#fff5f5;border:1px solid #ffd4d4;border-radius:12px;padding:18px;">
                        <h3 style="margin:0;color:#d90429;">⭐ Trusted Community</h3>
                        <p style="margin-top:10px;color:#666;line-height:24px;">
                            Connect with verified owners and renters from your city.
                        </p>
                    </td>

                </tr>

            </table>

        </td>
    </tr>

    <!-- CTA -->
    <tr>
        <td align="center" style="padding:30px 45px;">

            <a href="{{ url('/') }}"
                style="background:#d90429;color:#ffffff;text-decoration:none;padding:16px 38px;border-radius:8px;font-size:17px;font-weight:bold;display:inline-block;">
                Explore Rentify
            </a>

        </td>
    </tr>

    <!-- Quote -->
    <tr>
        <td style="padding:10px 45px 35px;">

            <table width="100%"
                style="background:#fafafa;border-left:5px solid #d90429;border-radius:8px;">
                <tr>
                    <td style="padding:20px;">

                        <h3 style="margin-top:0;color:#d90429;">
                            🚀 Start Your Journey
                        </h3>

                        <p style="margin-bottom:0;color:#666;line-height:28px;">
                            Whether you're looking to rent an item or earn money by renting out your own,
                            Rentify provides a safe, simple, and reliable platform to make it happen.
                        </p>

                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td align="center"
            style="background:#1f2937;padding:35px;color:#d1d5db;">

            <h2 style="color:#ffffff;margin:0;">
                Rentify
            </h2>

            <p style="margin:12px 0;font-size:15px;">
                Connecting Owners & Renters with Confidence.
            </p>

            <hr style="border:none;border-top:1px solid #374151;width:80%;margin:25px auto;">

            <p style="font-size:13px;margin:0;">
                © {{ date('Y') }} Rentify. All Rights Reserved.
            </p>

        </td>
    </tr>

</table>

</body>
</html>