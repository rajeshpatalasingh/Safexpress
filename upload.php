<!DOCTYPE html>
<html>
<head>
    <title>Upload Waybill Image</title>
    <style>
        body { font-family: Arial; margin: 50px; }
        .box { border: 1px solid #ccc; padding: 20px; width: 400px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Upload Waybill Image</h2>
        <form action="process.php" method="post" enctype="multipart/form-data">
            <label>Select Image (screenshot/photo):</label><br><br>
            <input type="file" name="waybill_image" accept="image/*" required><br><br>
            <button type="submit">Upload & Generate QR</button>
        </form>
    </div>
</body>
</html>