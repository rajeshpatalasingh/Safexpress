<?php
require 'phpqrcode/qrlib.php';

if ($_FILES['waybill_image']['error'] == 0) {
    $imgPath = 'uploads/' . basename($_FILES['waybill_image']['name']);
    move_uploaded_file($_FILES['waybill_image']['tmp_name'], $imgPath);

    // Dummy extracted text example
    $extracted = '501270081546 / 2\n100029541007 / 2\n503209410959 / 2\n100029786490 / 1';

    preg_match_all('/(\d{10,})\s*\/\s*(\d+)/', $extracted, $matches, PREG_SET_ORDER);

    $finalCodes = [];
    foreach ($matches as $m) {
        $waybill = $m[1];
        $pkgCount = intval($m[2]);
        for ($i = 1; $i <= $pkgCount; $i++) {
            $finalCodes[] = $waybill . sprintf("%04d", $i);
        }
    }

    echo "<h2>Generated QR Codes</h2>";
    foreach ($finalCodes as $code) {
        $fileName = 'qrcodes/' . $code . '.png';
        QRcode::png($code, $fileName, QR_ECLEVEL_L, 4);
        echo "<div style='display:inline-block;text-align:center;margin:10px;'>";
        echo "<img src='$fileName' alt='QR' style='width:120px;height:120px;'><br>$code";
        echo "</div>";
    }
} else {
    echo "Image upload failed.";
}
?>