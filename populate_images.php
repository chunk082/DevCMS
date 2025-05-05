<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=login', 'root', '');

// Path to the directory containing images
$imageDir = '/Users/Richard/Sites/login/public/swf/dcr/hof_furni/icons';

// Get all image files from the directory
$images = scandir($imageDir);

foreach ($images as $image) {
    if ($image === '.' || $image === '..') {
        continue;
    }

    // Extract catalog name (remove _icon.png from the filename)
    $catalogName = pathinfo($image, PATHINFO_FILENAME);
    $catalogName = str_replace('_icon', '', $catalogName);

    // Insert into the database
    $stmt = $pdo->prepare('INSERT INTO catalog_item_images (catalog_name, image_name) VALUES (:catalog_name, :image_name)');
    $stmt->execute([
        ':catalog_name' => $catalogName,
        ':image_name' => $image,
    ]);
}

echo "Images have been populated successfully.";
