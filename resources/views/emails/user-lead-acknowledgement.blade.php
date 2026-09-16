<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank you for your enquiry</title>
  <style>
    body { margin: 0; padding: 0; background-color: #f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1e293b; }
    .wrapper { width: 100%; table-layout: fixed; background-color: #f1f5f9; padding: 40px 0; }
    .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05); }
    .header { background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); background-color: #0f172a; padding: 36px 32px; text-align: center; color: #ffffff; }
    .header h1 { margin: 0 0 8px; font-size: 21px; font-weight: 800; letter-spacing: 0.8px; color: #ffffff !important; text-transform: uppercase; }
    .header p { margin: 0; font-size: 13px; color: #c5a880 !important; letter-spacing: 1px; text-transform: uppercase; font-weight: 700; }
    .body { padding: 32px; }
    .lead-badge { display: inline-block; background-color: #e0f2fe; color: #0369a1; padding: 6px 14px; border-radius: 9999px; font-size: 12px; font-weight: 700; margin-bottom: 20px; }
    .greeting { font-size: 18px; font-weight: 700; color: #0f172a; margin-bottom: 12px; }
    .content-p { font-size: 14px; line-height: 1.65; color: #475569; margin: 0 0 18px; }
    .summary-card { background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; margin: 24px 0; }
    .summary-title { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #64748b; margin-bottom: 14px; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px; }
    .detail-table { width: 100%; border-collapse: collapse; }
    .detail-table td { padding: 8px 0; font-size: 13px; vertical-align: top; }
    .detail-label { color: #64748b; font-weight: 600; width: 40%; }
    .detail-value { color: #0f172a; font-weight: 600; width: 60%; }
    .notice-box { background-color: #fefce8; border-left: 4px solid #eab308; padding: 14px 18px; border-radius: 6px; margin: 20px 0; font-size: 13px; line-height: 1.55; color: #854d0e; }
    .footer { background-color: #0f172a; padding: 28px 32px; text-align: center; color: #64748b; font-size: 12px; line-height: 1.6; }
    .footer strong { color: #94a3b8; }
    .footer a { color: #38bdf8; text-decoration: none; }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container">
      
      <!-- Brand Header -->
      <div class="header" style="background-color: #0f172a; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 36px 32px; text-align: center; color: #ffffff;">
        <h1 style="margin: 0 0 8px; font-size: 21px; font-weight: 800; letter-spacing: 0.8px; color: #ffffff !important; text-align: center; text-transform: uppercase; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
          NAVAGRUHA INFRA DEVELOPERS PVT LTD.
        </h1>
        <p style="margin: 0; font-size: 13px; color: #c5a880 !important; letter-spacing: 1.2px; text-transform: uppercase; font-weight: 700; text-align: center; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
          {{ $enquiry->project ?: 'RRR Prekshitha Enclave, AIIMS Bibinagar' }}
        </p>
      </div>

      <!-- Main Body -->
      <div class="body">
        
        <div class="lead-badge">
          Reference Number: {{ $enquiry->lead_number ?: '#' . $enquiry->id }}
        </div>

        <div class="greeting">
          Dear {{ $enquiry->name }},
        </div>

        <p class="content-p">
          Thank you for reaching out to us regarding <strong>{{ $enquiry->project ?: 'RRR Prekshitha Enclave' }}</strong>. We have successfully received your enquiry.
        </p>

        <!-- Enquiry Details Summary -->
        <div class="summary-card">
          <div class="summary-title">Your Submission Summary</div>
          <table class="detail-table">
            <tr>
              <td class="detail-label">Submission Time (IST)</td>
              <td class="detail-value">{{ ($enquiry->created_at ? $enquiry->created_at->copy()->timezone('Asia/Kolkata') : now('Asia/Kolkata'))->format('d-m-Y, h:i A') }} IST</td>
            </tr>
            <tr>
              <td class="detail-label">Full Name</td>
              <td class="detail-value">{{ $enquiry->name }}</td>
            </tr>
            <tr>
              <td class="detail-label">Mobile Number</td>
              <td class="detail-value">{{ $enquiry->phone }}</td>
            </tr>
            @if(!empty($enquiry->email))
            <tr>
              <td class="detail-label">Email Address</td>
              <td class="detail-value">{{ $enquiry->email }}</td>
            </tr>
            @endif
            @if(!empty($enquiry->project))
            <tr>
              <td class="detail-label">Project</td>
              <td class="detail-value">{{ $enquiry->project }}</td>
            </tr>
            @endif
            @if(!empty($enquiry->preferred_visit_date))
            <tr>
              <td class="detail-label">Requested Visit Date</td>
              <td class="detail-value" style="color: #0284c7;">
                {{ $enquiry->preferred_visit_date->format('d-m-Y (l)') }}
              </td>
            </tr>
            @endif
            @if(!empty($enquiry->message))
            <tr>
              <td class="detail-label">Notes / Remarks</td>
              <td class="detail-value">{{ $enquiry->message }}</td>
            </tr>
            @endif
          </table>
        </div>

        <!-- Appointment Scheduling Notice -->
        <div class="notice-box">
          <strong>Important Information:</strong> 
          @if(!empty($enquiry->preferred_visit_date))
            You have indicated a preferred visit date for <strong>{{ $enquiry->preferred_visit_date->format('d-m-Y') }}</strong>. Please note that our property relations team will call you shortly on <strong>{{ $enquiry->phone }}</strong> to confirm the exact visit time slot and coordinate transportation arrangements if needed.
          @else
            Our property relations coordinator will call you shortly on <strong>{{ $enquiry->phone }}</strong> to assist you with layout brochures, pricing details, and schedule a convenient site visit.
          @endif
        </div>

        <p class="content-p">
          If you need immediate assistance or would like to speak directly with an advisor, feel free to call us or send a message on WhatsApp at <strong>+91 9617 699 699</strong>.
        </p>

        <p class="content-p" style="margin-bottom: 0; color: #334155; font-weight: 600;">
          Warm regards,<br>
          Customer Relations Team<br>
          <strong style="color: #0f172a;">Navagruha Infra Developers Pvt Ltd</strong>
        </p>

      </div>

      <!-- Footer -->
      <div class="footer" style="background-color: #0f172a; padding: 28px 32px; text-align: center; color: #94a3b8; font-size: 12px; line-height: 1.6;">
        <p style="margin: 0 0 12px; color: #ffffff; font-size: 14px; font-weight: 700; letter-spacing: 0.6px; text-transform: uppercase;">
          NAVAGRUHA INFRA DEVELOPERS PVT LTD.
        </p>

        <!-- Office Address -->
        <div style="margin: 0 0 16px; padding: 12px 16px; background-color: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 8px;">
          <p style="margin: 0 0 4px; color: #e2b774; font-weight: 700; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Office Address</p>
          <p style="margin: 0; color: #e2e8f0; font-size: 12px; line-height: 1.55;">
            Plot No. 109, Shashank Towers, 1st Floor, Uppal Bhagayath, Near Nagole Metro Station, Hyderabad, Telangana 500039.
          </p>
        </div>

        <p style="margin: 0; color: #94a3b8; font-size: 12px;">
          Phone: <a href="tel:+919617699699" style="color: #38bdf8; text-decoration: none; font-weight: 600;">+91 9617 699 699</a> &nbsp;|&nbsp; 
          Email: <a href="mailto:info@navagruha.com" style="color: #38bdf8; text-decoration: none; font-weight: 600;">info@navagruha.com</a> &nbsp;|&nbsp;
          Web: <a href="https://www.navagruha.com" style="color: #38bdf8; text-decoration: none; font-weight: 600;">www.navagruha.com</a>
        </p>
      </div>

    </div>
  </div>
</body>
</html>
