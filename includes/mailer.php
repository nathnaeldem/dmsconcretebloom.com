<?php
/**
 * Branded HTML email helper using PHP mail().
 */
if (!isset($site_name)) {
  require_once __DIR__ . '/config.php';
}

function bloom_mail_escape(string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function bloom_build_email_html(string $title, array $rows, string $footerNote = ''): string {
  global $site_name, $site_service_area;

  $rowHtml = '';
  foreach ($rows as $label => $value) {
    if ($value === '' || $value === null) continue;
    $rowHtml .= '
      <tr>
        <td style="padding:10px 0;border-bottom:1px solid #e8ddd0;color:#6b6258;font-size:13px;width:34%;vertical-align:top;">'
      . bloom_mail_escape((string) $label) . '</td>
        <td style="padding:10px 0;border-bottom:1px solid #e8ddd0;color:#2a241c;font-size:14px;font-weight:600;">'
      . nl2br(bloom_mail_escape((string) $value)) . '</td>
      </tr>';
  }

  $year = date('Y');
  $brand = bloom_mail_escape($site_name ?? 'DMS Concrete Bloom');
  $area = bloom_mail_escape($site_service_area ?? 'Dallas & North Texas');
  $note = $footerNote !== '' ? '<p style="margin:18px 0 0;color:#6b6258;font-size:13px;line-height:1.5;">' . bloom_mail_escape($footerNote) . '</p>' : '';

  return '<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
<body style="margin:0;padding:0;background:#faf6f0;font-family:Arial,Helvetica,sans-serif;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#faf6f0;padding:28px 12px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:620px;background:#ffffff;border-radius:18px;overflow:hidden;border:1px solid #e8ddd0;">
          <tr>
            <td style="background:linear-gradient(90deg,#002324 0%,#096179 45%,#00c3ff 100%);padding:26px 28px;color:#ffffff;">
              <div style="font-size:12px;letter-spacing:0.14em;text-transform:uppercase;opacity:0.85;font-weight:700;">' . $brand . '</div>
              <div style="font-size:24px;font-weight:700;margin-top:8px;line-height:1.25;">' . bloom_mail_escape($title) . '</div>
              <div style="font-size:13px;margin-top:8px;opacity:0.9;">Where concrete becomes art · ' . $area . '</div>
            </td>
          </tr>
          <tr>
            <td style="padding:26px 28px;">
              <p style="margin:0 0 18px;color:#2a241c;font-size:15px;line-height:1.55;">A new website submission is ready for follow-up.</p>
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0">' . $rowHtml . '</table>
              ' . $note . '
            </td>
          </tr>
          <tr>
            <td style="background:#f0e8dc;padding:16px 28px;color:#6b6258;font-size:12px;">
              © ' . $year . ' ' . $brand . '. Handcrafted concrete art pots.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>';
}

function bloom_send_mail(string $to, string $subject, string $htmlBody, string $replyTo = ''): bool {
  global $site_email, $site_name;

  $fromEmail = $site_email ?: 'info@dmsconcretepot.com';
  $fromName = $site_name ?: 'DMS Concrete Bloom';

  $headers = [];
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=UTF-8';
  $headers[] = 'From: ' . sprintf('%s <%s>', $fromName, $fromEmail);
  $headers[] = 'X-Mailer: PHP/' . phpversion();
  if ($replyTo !== '' && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
    $headers[] = 'Reply-To: ' . $replyTo;
  }

  $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
  return @mail($to, $encodedSubject, $htmlBody, implode("\r\n", $headers));
}
