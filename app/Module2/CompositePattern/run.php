<?php

require_once './vendor/autoload.php';

use App\Module2\CompositePattern\DirectoryEntity;
use App\Module2\CompositePattern\FileEntity;

$root = new DirectoryEntity("root");
$folder1 = new DirectoryEntity("folder one");
$file1 = new FileEntity("file one.txt", 150);
$file2 = new FileEntity("file two.json", 120);

$folder1->add($file1);
$folder1->add($file2);
$root->add($folder1);

$folder2 = new DirectoryEntity("folder two");
$file3 = new FileEntity("file3.xml", 200);
$folder2->add($file3);
$root->add($folder2);