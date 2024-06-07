<?php
    require '../vendor/autoload.php';
    $url = (\KTPay\Helpers\KTPayHelper::isHttps() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KTPay - KuveytTürk VPOS</title>
</head>
<body>
    <div>
        <p><strong>Satış Url:</strong> <?php echo $url . 'payment.php'; ?></p>
        <p><strong>Taksitli Satış Url:</strong> <?php echo $url . 'payment_installment.php'; ?></p>
        <p><strong>Başarılı Callback Url:</strong> <?php echo $url . 'success.php'; ?></p>
        <p><strong>Başarısız Callback Url:</strong> <?php echo $url . 'fail.php'; ?></p>
        <p><strong>Provizyon Url:</strong> <?php echo $url . 'provision.php'; ?></p>
        <p><strong>İptal, İade ve Kısmi İade Url:</strong> <?php echo $url . 'sale_reversal.php'; ?></p>
        <p><strong>İşlem Sorgulama Url:</strong> <?php echo $url . 'get_transaction.php'; ?></p>
        <p><strong>İşlem Listeleme Url:</strong> <?php echo $url . 'get_transactions.php'; ?></p>
    </div>
</body>
</html>