<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Booking Confirmed - SMJTZ Safari</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

</head>

<body style="margin:0; padding:0; background:#ffffff; font-family:'DM Sans', -apple-system, system-ui, sans-serif;">

<!-- MAIN WRAPPER -->
<table width="100%" cellspacing="0" cellpadding="0" style="background:#ffffff;">
<tr>
<td>

<!-- CONTENT WRAPPER -->
<table width="100%" cellspacing="0" cellpadding="0" style="background:#ffffff;">

  <!-- HEADER WITH LOGO -->
  <tr>
    <td align="center" style="padding:60px 20px 40px; background:linear-gradient(180deg, #fafafa 0%, #ffffff 100%);">
      <img src="https://smjtz.com/images/logo.png"
           alt="SMJTZ Safari"
           style="height:85px; display:block;"/>
    </td>
  </tr>

  <!-- STATUS BADGE -->
  <tr>
    <td align="center" style="padding:0 20px 40px;">
      <div style="display:inline-flex; align-items:center; gap:10px; background:#ecfdf5; border:2px solid #6ee7b7; padding:12px 28px; border-radius:100px;">
        <span style="font-size:18px;">✓</span>
        <span style="font-size:15px; font-weight:700; color:#047857; letter-spacing:1px;">BOOKING CONFIRMED</span>
      </div>
    </td>
  </tr>

  <!-- TITLE -->
  <tr>
    <td align="center" style="padding:0 20px 20px;">
      <h1 style="font-family:'Playfair Display', serif; font-size:48px; color:#1a1a1a; font-weight:700; margin:0; line-height:1.1;">
        Your Safari Awaits
      </h1>
    </td>
  </tr>

  <!-- SUBTEXT -->
  <tr>
    <td align="center" style="padding:0 20px 50px;">
      <p style="color:#737373; font-size:18px; line-height:1.6; margin:0; max-width:500px;">
        An extraordinary journey through Tanzania’s wilderness has been reserved exclusively for you.
      </p>
    </td>
  </tr>

  <!-- PERSONAL GREETING -->
  <tr>
    <td style="padding:0 20px 50px;">
      <table width="100%" cellspacing="0" cellpadding="0" style="max-width:700px; margin:auto;">
        <tr>
          <td>
            <div style="font-size:14px; color:#a3a3a3; margin-bottom:10px; text-transform:uppercase; letter-spacing:1.5px; font-weight:600;">
              Dear
            </div>
            <h2 style="font-family:'Playfair Display', serif; font-size:36px; color:#720026; margin:0; font-weight:700; letter-spacing:-0.5px;">
              {{ $booking->full_name }}
            </h2>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  <!-- BOOKING DETAILS -->
  <tr>
    <td style="padding:0 20px 60px;">
      <table width="100%" cellspacing="0" cellpadding="0" style="max-width:700px; margin:auto;">

        <tr>
          <td>

            <!-- HEADER -->
            <div style="border-bottom:3px solid #720026; padding-bottom:18px; margin-bottom:35px;">
              <h3 style="font-size:16px; color:#1a1a1a; margin:0; text-transform:uppercase; letter-spacing:2px; font-weight:700;">
                Booking Details
              </h3>
            </div>

            <!-- DETAIL BLOCKS -->
            <table width="100%" cellspacing="0" cellpadding="0">

              <!-- PACKAGE -->
              <tr>
                <td style="padding-bottom:30px;">
                  <div style="font-size:13px;color:#a3a3a3;text-transform:uppercase;letter-spacing:1.2px;margin-bottom:8px;font-weight:600;">
                    Safari Package
                  </div>
                  <div style="font-size:20px;color:#1a1a1a;font-weight:700;">
                    {{ $booking->package }}
                  </div>
                </td>
              </tr>

              <!-- DATES -->
              <tr>
                <td style="padding-bottom:30px;">
                  <div style="font-size:13px;color:#a3a3a3;text-transform:uppercase;letter-spacing:1.2px;margin-bottom:8px;font-weight:600;">
                    Travel Period
                  </div>
                  <div style="font-size:20px;color:#1a1a1a;font-weight:700;">
                    {{ \Carbon\Carbon::parse($booking->start_date)->format('M d, Y') }}
                    <span style="color:#720026; margin:0 8px;">→</span>
                    {{ \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') }}
                  </div>
                </td>
              </tr>

              <!-- PARTY -->
              <tr>
                <td style="padding-bottom:35px;">
                  <div style="font-size:13px;color:#a3a3a3;text-transform:uppercase;letter-spacing:1.2px;margin-bottom:15px;font-weight:600;">
                    Party Composition
                  </div>

                  <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>

                      <!-- Adults -->
                      <td style="width:32%; padding:24px; background:#fafafa; border-radius:16px; text-align:center; border:2px solid #f0f0f0;">
                        <div style="font-size:14px; color:#737373; margin-bottom:8px; text-transform:uppercase; letter-spacing:1px; font-weight:600;">
                          Adults
                        </div>
                        <div style="font-size:36px;font-family:'Playfair Display',serif;color:#720026;font-weight:700;">
                          {{ $booking->adults }}
                        </div>
                      </td>

                      <td style="width:2%;"></td>

                      <!-- Children -->
                      <td style="width:32%; padding:24px; background:#fafafa; border-radius:16px; text-align:center; border:2px solid #f0f0f0;">
                        <div style="font-size:14px;color:#737373;margin-bottom:8px;text-transform:uppercase;letter-spacing:1px;font-weight:600;">
                          Children
                        </div>
                        <div style="font-size:36px;font-family:'Playfair Display',serif;color:#720026;font-weight:700;">
                          {{ $booking->children_ages ? count(explode(',', $booking->children_ages)) : 0 }}
                        </div>
                      </td>

                      <td style="width:2%;"></td>

                      <!-- Others (always 0 if not used) -->
                      <td style="width:32%; padding:24px; background:#fafafa; border-radius:16px; text-align:center; border:2px solid #f0f0f0;">
                        <div style="font-size:14px;color:#737373;margin-bottom:8px;text-transform:uppercase;letter-spacing:1px;font-weight:600;">
                          Others
                        </div>
                        <div style="font-size:36px;font-family:'Playfair Display',serif;color:#720026;font-weight:700;">
                          0
                        </div>
                      </td>

                    </tr>
                  </table>
                </td>
              </tr>

              <!-- ACCOMMODATION -->
              <tr>
                <td style="padding-bottom:30px;">
                  <div style="font-size:13px; color:#a3a3a3; text-transform:uppercase; margin-bottom:8px; font-weight:600;">
                    Accommodation Level
                  </div>
                  <div style="font-size:20px; color:#1a1a1a; font-weight:700;">
                    {{ ucfirst(str_replace('-', ' ', $booking->accommodation_level)) }}
                  </div>
                </td>
              </tr>

              <!-- ARRIVAL -->
              <tr>
                <td style="padding-bottom:30px;">
                  <div style="font-size:13px;color:#a3a3a3;text-transform:uppercase;margin-bottom:8px;font-weight:600;">
                    Arrival Details
                  </div>
                  <div style="font-size:20px;color:#1a1a1a;font-weight:700;">
                    {{ \Carbon\Carbon::parse($booking->arrival_date_time)->format('M d, Y \a\t g:i A') }}
                  </div>
                  <div style="font-size:17px;color:#737373;margin-top:5px;font-weight:500;">
                    via {{ $booking->arrival_method }}
                  </div>
                </td>
              </tr>

              <!-- FLIGHT NUMBER -->
              @if($booking->flight_number)
              <tr>
                <td style="padding-bottom:30px;">
                  <div style="font-size:13px;color:#a3a3a3;text-transform:uppercase;margin-bottom:8px;font-weight:600;">
                    Flight Number
                  </div>
                  <div style="font-size:20px;color:#1a1a1a;font-weight:700;">
                    {{ $booking->flight_number }}
                  </div>
                </td>
              </tr>
              @endif

            </table>
          </td>
        </tr>

      </table>
    </td>
  </tr>

  <!-- NEXT STEPS -->
  <tr>
    <td style="padding:0 20px 60px;">
      <table width="100%" cellspacing="0" cellpadding="0" style="max-width:700px; margin:auto;">
        <tr>
          <td>
            <div style="background:#720026; padding:40px; border-radius:20px; text-align:center;">
              <div style="font-size:14px; color:#fca5a5; text-transform:uppercase; letter-spacing:1.5px; margin-bottom:15px; font-weight:700;">What Happens Next</div>
              <p style="font-size:18px; color:#ffffff; line-height:1.7; margin:0; max-width:500px; margin:auto;">
                Our safari concierge team will contact you within
                <strong style="color:#fca5a5;">24 hours</strong>
                to confirm all details and assist with any special arrangements.
              </p>
            </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  <!-- WHATSAPP BUTTON -->
  <tr>
    <td align="center" style="padding:0 20px 70px;">
      <a href="https://wa.me/255768123456"
        style="display:inline-flex; align-items:center; gap:12px; background:#25d366; padding:20px 50px; border-radius:16px; color:#ffffff; text-decoration:none; font-size:18px; font-weight:700; box-shadow:0 12px 40px rgba(37,211,102,0.3);">
        <span style="font-size:24px;">💬</span>
        <span>Chat with Us on WhatsApp</span>
      </a>
    </td>
  </tr>

  <!-- IMPORTANT INFO -->
  <tr>
    <td style="padding:50px 20px; background:#fafafa;">
      <table width="100%" cellspacing="0" cellpadding="0" style="max-width:700px; margin:auto;">
        <tr>
          <td>
            <div style="font-size:14px; color:#525252; text-transform:uppercase; letter-spacing:1.5px; margin-bottom:25px; font-weight:700;">
              Important Information
            </div>

            <table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td style="padding:16px 0; border-bottom:2px solid #e5e5e5;">
                  <div style="font-size:17px; color:#1a1a1a; font-weight:500;">
                    Final payment due <strong style="color:#720026;">30 days</strong> before departure
                  </div>
                </td>
              </tr>

              <tr>
                <td style="padding:16px 0; border-bottom:2px solid #e5e5e5;">
                  <div style="font-size:17px; color:#1a1a1a; font-weight:500;">
                    Deposits are non-refundable but transferable to future dates
                  </div>
                </td>
              </tr>

              <tr>
                <td style="padding:16px 0; border-bottom:2px solid #e5e5e5;">
                  <div style="font-size:17px; color:#1a1a1a; font-weight:500;">
                    All park fees and conservation charges included
                  </div>
                </td>
              </tr>

              <tr>
                <td style="padding:16px 0;">
                  <div style="font-size:17px; color:#1a1a1a; line-height:1.6; font-weight:500;">
                    Review our <a href="https://smjtz.com/terms" style="color:#720026; font-weight:700; text-decoration:none;">Terms & Conditions</a>
                    and
                    <a href="https://smjtz.com/privacy" style="color:#720026; font-weight:700; text-decoration:none;">Privacy Policy</a>
                  </div>
                </td>
              </tr>

            </table>

          </td>
        </tr>
      </table>
    </td>
  </tr>

  <!-- FOOTER -->
  <tr>
    <td align="center" style="padding:60px 20px; background:#1a1a1a;">
      <div style="font-size:22px; font-weight:700; color:#ffffff; margin-bottom:10px; font-family:'Playfair Display', serif;">
        Safari Majesty Journeys Tanzania
      </div>
      <div style="font-size:16px; color:#a3a3a3; margin-bottom:22px; line-height:1.6;">
        Dar es Salaam · Arusha · Zanzibar
      </div>
      <div style="font-size:16px; line-height:2.2;">
        <a href="mailto:info@smjtz.com" style="color:#a3a3a3; text-decoration:none;">info@smjtz.com</a>
        <span style="color:#525252; margin:0 15px;">·</span>
        <a href="https://smjtz.com" style="color:#a3a3a3; text-decoration:none;">smjtz.com</a>
      </div>
      <div style="font-size:14px; color:#525252; margin-top:25px;">
        © {{ date('Y') }} SMJTZ Safari. All rights reserved.
      </div>
    </td>
  </tr>

</table>
<!-- END CONTENT -->

</td>
</tr>
</table>

</body>
</html>
