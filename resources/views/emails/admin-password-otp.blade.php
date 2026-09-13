<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Password Change Verification Code</title>
  <style>
    body { margin: 0; padding: 0; background-color: #060d06; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1e293b; }
    .wrapper { width: 100%; table-layout: fixed; background-color: #060d06; padding: 40px 0; }
    .container { max-width: 580px; margin: 0 auto; background-color: #ffffff; border-radius: 18px; overflow: hidden; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4); border: 1px solid rgba(255, 255, 255, 0.1); }
    .header { background: linear-gradient(135deg, #0d1721 0%, #060d06 100%); padding: 36px 32px 30px; text-align: center; border-bottom: 3px solid #71b644; }
    .logo-text { font-size: 20px; font-weight: 800; color: #ffffff; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 4px; font-family: 'Cinzel', serif, Georgia; }
    .tagline { font-size: 11px; color: #71b644; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 18px; }
    .security-badge { display: inline-block; background-color: rgba(234, 179, 8, 0.15); border: 1px solid rgba(234, 179, 8, 0.4); color: #ca8a04; padding: 5px 14px; border-radius: 9999px; font-size: 11px; font-weight: 800; letter-spacing: 0.5px; text-transform: uppercase; }
    .body { padding: 36px 32px; }
    .greeting { font-size: 16px; font-weight: 700; color: #0f172a; margin-bottom: 12px; }
    .instructions { font-size: 14px; color: #475569; line-height: 1.6; margin-bottom: 26px; }
    .otp-card { background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border: 2px dashed #cbd5e1; border-radius: 16px; padding: 26px; text-align: center; margin: 24px 0; }
    .otp-label { font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 10px; }
    .otp-code { font-size: 40px; font-weight: 900; color: #0f172a; letter-spacing: 12px; margin-right: -12px; font-family: 'SF Mono', Consolas, Monaco, monospace; text-shadow: 0 1px 2px rgba(0,0,0,0.05); }
    .otp-expiry { font-size: 12px; color: #dc2626; font-weight: 700; margin-top: 10px; }
    .meta-table { width: 100%; border-collapse: collapse; margin-top: 26px; background-color: #f8fafc; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; }
    .meta-table td { padding: 10px 16px; font-size: 12.5px; border-bottom: 1px solid #f1f5f9; }
    .meta-label { color: #64748b; font-weight: 600; width: 40%; }
    .meta-value { color: #0f172a; font-weight: 700; width: 60%; }
    .security-notice { background-color: #fffbeb; border: 1px solid #fde68a; border-radius: 12px; padding: 14px 18px; margin-top: 24px; font-size: 12px; color: #92400e; line-height: 1.5; }
    .footer { background-color: #f8fafc; border-top: 1px solid #e2e8f0; padding: 22px 32px; text-align: center; font-size: 11.5px; color: #94a3b8; line-height: 1.5; }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container">
      
      <!-- Brand & Security Header -->
      <div class="header">
        <div class="logo-text">NAVAGRUHA</div>
        <div class="tagline">REDEFINING REALITY</div>
        <div class="security-badge">🔒 Admin Security Verification</div>
      </div>

      <!-- Main Body -->
      <div class="body">
        <div class="greeting">Hello Administrator,</div>
        <p class="instructions">
          A request was initiated to update the administrator account password on the <strong>Navagruha Admin Portal</strong>. Please use the following 4-digit One-Time Password (OTP) to complete the verification:
        </p>

        <!-- Prominent OTP Code Card -->
        <div class="otp-card">
          <div class="otp-label">Your 4-Digit Verification Code</div>
          <div class="otp-code">{{ $otp }}</div>
          <div class="otp-expiry">⏱ Valid for {{ $expiresInMinutes }} minutes only</div>
        </div>

        <!-- Request Details Table -->
        <table class="meta-table">
          <tr>
            <td class="meta-label">Admin Account</td>
            <td class="meta-value">{{ $user->name }} ({{ $user->email }})</td>
          </tr>
          <tr>
            <td class="meta-label">Requested At</td>
            <td class="meta-value">{{ $requestedAt }}</td>
          </tr>
          <tr>
            <td class="meta-label">IP Address</td>
            <td class="meta-value">{{ $ipAddress }}</td>
          </tr>
        </table>

        <!-- Security Advisory Notice -->
        <div class="security-notice">
          <strong>Security Notice:</strong> If you did not initiate this password change request, please ignore this email and verify your account credentials immediately. Do not share this code with anyone.
        </div>
      </div>

      <!-- Footer -->
      <div class="footer">
        &copy; {{ date('Y') }} Navagruha Infra Developers. All rights reserved.<br>
        This is an automated security notification generated by the Navagruha Management Portal.
      </div>

    </div>
  </div>
</body>
</html>
