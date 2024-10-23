<?php

use App\Module2\Composite\DirectoryEntity;
use App\Module2\Composite\FileEntity;

$root = new DirectoryEntity("root");
$folder1 = new DirectoryEntity("folder1");
$file1 = new FileEntity("file1.txt", 150); // 150 KB
$file2 = new FileEntity("file2.txt", 120); // 120 KB

$folder1->add($file1);
$folder1->add($file2);
$root->add($folder1);

$folder2 = new DirectoryEntity("folder2");
$file3 = new FileEntity("file3.txt", 200);
$folder2->add($file3);
$root->add($folder2);

echo "Size of root directory: " . $root->getSize() . " KB\n";
echo "Contents of root directory:\n";
foreach ($root->listContent() as $item) {
    echo "- " . $item->getName() . " (" . $item->getSize() . " KB)\n";
}