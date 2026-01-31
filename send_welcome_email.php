<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // تأكد من تثبيت PHPMailer عبر Composer

// بيانات المستخدم بعد التسجيل
$user_email = "testuser@example.com"; // ضع إيميل المستلم هنا
$user_name  = "اسم المستخدم";         // اسم المستخدم (اختياري)

// محتوى الرسالة
$email_subject = "مرحبًا بك في منصة Morafik 🎉";
$email_body = "
مرحبًا بك في منصة Morafik 👋<br><br>
يسعدنا انضمامك إلينا، ونتمنى لك تجربة مميزة ومثمرة.<br>
تم إنشاء حسابك بنجاح ✅، ويمكنك الآن الاستفادة من جميع خدمات وميزات المنصة بكل سهولة.<br>
إذا احتجت إلى أي مساعدة أو كان لديك أي استفسار، فريق Morafik جاهز لدعمك في أي وقت.<br><br>
نتمنى لك رحلة موفّقة معنا 🌟
";

try {
    $mail = new PHPMailer(true);

    // إعدادات SMTP
    $mail->isSMTP();
    $mail->Host       = 'mail.privateemail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'contact@morafik.online';
    $mail->Password   = 'abobob123'; // كلمة المرور كما طلبت
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // المرسل والمستلم
    $mail->setFrom('contact@morafik.online', 'Morafik');
    $mail->addAddress($user_email, $user_name);

    // المحتوى
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $email_subject;
    $mail->Body    = $email_body;

    $mail->send();
    echo "تم إرسال الرسالة بنجاح!";
} catch (Exception $e) {
    echo "حدث خطأ أثناء إرسال الرسالة: {$mail->ErrorInfo}";
}
