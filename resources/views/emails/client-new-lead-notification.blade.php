<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Website Lead Notification</title>
  <style>
    body { margin: 0; padding: 0; background-color: #0f172a; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1e293b; }
    .wrapper { width: 100%; table-layout: fixed; background-color: #0f172a; padding: 40px 0; }
    .container { max-width: 620px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2); }
    .header { background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); padding: 32px; border-bottom: 4px solid #3b82f6; }
    .tag { display: inline-block; background-color: #dbeafe; color: #1d4ed8; padding: 5px 12px; border-radius: 9999px; font-size: 11px; font-weight: 800; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 12px; }
    .header h1 { margin: 0 0 6px; font-size: 22px; font-weight: 800; color: #ffffff; }
    .header p { margin: 0; font-size: 13px; color: #94a3b8; }
    .body { padding: 32px; }
    .lead-badge { display: inline-block; background-color: #f1f5f9; border: 1px solid #cbd5e1; color: #0f172a; padding: 6px 14px; border-radius: 8px; font-size: 14px; font-weight: 800; font-family: monospace; margin-bottom: 24px; }
    .action-bar { display: flex; gap: 12px; margin: 20px 0; flex-wrap: wrap; }
    .btn-action { display: inline-block; padding: 10px 18px; border-radius: 8px; font-size: 13px; font-weight: 700; text-decoration: none; }
    .btn-call { background-color: #0284c7; color: #ffffff; }
    .btn-whatsapp { background-color: #16a34a; color: #ffffff; }
    .btn-admin { background-color: #0f172a; color: #ffffff; display: block; text-align: center; padding: 14px 24px; border-radius: 10px; font-size: 14px; font-weight: 800; text-decoration: none; margin-top: 24px; }
    .table-section { width: 100%; border-collapse: collapse; margin-bottom: 20px; background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; }
    .table-section th { background-color: #f1f5f9; padding: 12px 18px; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: #475569; text-align: left; border-bottom: 1px solid #e2e8f0; }
    .table-section td { padding: 10px 18px; font-size: 13px; border-bottom: 1px solid #f1f5f9; }
    .td-label { width: 35%; color: #64748b; font-weight: 600; }
    .td-val { width: 65%; color: #0f172a; font-weight: 700; }
    .footer { background-color: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 32px; text-align: center; font-size: 12px; color: #64748b; }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container">
      
      <!-- Alert Header -->
      <div class="header">
        <div class="tag">New Website Lead Received</div>
        <h1>{{ $enquiry->name }}</h1>
        <p>Project: <strong>{{ $enquiry->project ?: 'RRR Prekshitha Enclave' }}</strong> • Received on {{ $enquiry->created_at ? $enquiry->created_at->format('d M Y, h:i A') : date('d M Y, h:i A') }}</p>
      </div>

      <!-- Content -->
      <div class="body">
        
        <div class="lead-badge">
          Lead Number: {{ $enquiry->lead_number ?: '#' . $enquiry->id }}
        </div>

        <!-- Fast Action Buttons -->
        <table width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 24px;">
          <tr>
            <td style="padding-right: 8px;">
              <a href="tel:{{ $enquiry->phone }}" class="btn-action btn-call" style="display: block; text-align: center;">
                📞 Call {{ $enquiry->phone }}
              </a>
            </td>
            @php $cleanPhone = preg_replace('/[^0-9]/', '', $enquiry->phone); @endphp
            <td style="padding-left: 8px;">
              <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="btn-action btn-whatsapp" style="display: block; text-align: center;">
                💬 Open in WhatsApp
              </a>
            </td>
          </tr>
        </table>

        <!-- Lead Contact Information -->
        <table class="table-section">
          <tr>
            <th colspan="2">Customer Contact Information</th>
          </tr>
          <tr>
            <td class="td-label">Full Name</td>
            <td class="td-val">{{ $enquiry->name }}</td>
          </tr>
          <tr>
            <td class="td-label">Mobile Number</td>
            <td class="td-val">
              <a href="tel:{{ $enquiry->phone }}" style="color: #0284c7; text-decoration: none;">{{ $enquiry->phone }}</a>
            </td>
          </tr>
          <tr>
            <td class="td-label">Email Address</td>
            <td class="td-val">
              @if(!empty($enquiry->email))
                <a href="mailto:{{ $enquiry->email }}" style="color: #0284c7; text-decoration: none;">{{ $enquiry->email }}</a>
              @else
                <span style="color: #94a3b8; font-weight: normal;">Not provided</span>
              @endif
            </td>
          </tr>
          @if(!empty($enquiry->preferred_visit_date))
          <tr>
            <td class="td-label">Requested Visit Date</td>
            <td class="td-val" style="color: #7c3aed;">
              {{ $enquiry->preferred_visit_date->format('l, d F Y') }}
            </td>
          </tr>
          @endif
          @if(!empty($enquiry->message))
          <tr>
            <td class="td-label">Customer Message</td>
            <td class="td-val" style="font-weight: normal; color: #334155;">{{ $enquiry->message }}</td>
          </tr>
          @endif
        </table>

        <!-- Attribution & Source Data -->
        <table class="table-section">
          <tr>
            <th colspan="2">Lead Attribution & Source Details</th>
          </tr>
          <tr>
            <td class="td-label">Project</td>
            <td class="td-val">{{ $enquiry->project ?: 'RRR Prekshitha Enclave' }}</td>
          </tr>
          <tr>
            <td class="td-label">Lead Source</td>
            <td class="td-val">{{ str_ireplace('Landing Page 2', 'Landing page', $enquiry->source ?: 'Landing page') }}</td>
          </tr>
          <tr>
            <td class="td-label">Landing Page</td>
            <td class="td-val" style="font-family: monospace; font-size: 12px;">{{ str_ireplace('/landing2/', '/', $enquiry->landing_page ?: '/') }}</td>
          </tr>
          @if(!empty($enquiry->utm_source))
          <tr>
            <td class="td-label">UTM Source</td>
            <td class="td-val">{{ $enquiry->utm_source }}</td>
          </tr>
          @endif
          @if(!empty($enquiry->utm_medium))
          <tr>
            <td class="td-label">UTM Medium</td>
            <td class="td-val">{{ $enquiry->utm_medium }}</td>
          </tr>
          @endif
          @if(!empty($enquiry->utm_campaign))
          <tr>
            <td class="td-label">UTM Campaign</td>
            <td class="td-val">{{ $enquiry->utm_campaign }}</td>
          </tr>
          @endif
          @if(!empty($enquiry->referrer))
          <tr>
            <td class="td-label">Referrer</td>
            <td class="td-val" style="word-break: break-all; font-weight: normal; font-size: 11px;">{{ $enquiry->referrer }}</td>
          </tr>
          @endif
        </table>

        <!-- View Lead in CRM Button -->
        <a href="{{ $adminLeadUrl }}" class="btn-admin" target="_blank">
          View Lead in Admin CRM Portal &rarr;
        </a>

      </div>

      <!-- Footer -->
      <div class="footer">
        Navagruha Real Estate CRM System • Automated Lead Alert
      </div>

    </div>
  </div>
</body>
</html>
