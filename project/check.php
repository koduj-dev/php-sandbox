<?php

// Funkce pro kontrolu bílých znaků před a za PHP tagy
function checkWhitespaceInFiles($directory) {
    // Rekurzivní procházení adresářů
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    // Prochází všechny soubory .php
    foreach ($files as $file) {
        if ($file->isFile() 
            && $file->getExtension() === 'php' 
            && !preg_match('(blade.php)', $file->getFileName()) // nechceme procházet blade šablony
            && !preg_match('(vendor|storage)', $file->getPathName()) // nechceme řešit soubory ve vendor/storage
        ) {
            $filePath = $file->getRealPath();
            $content = file_get_contents($filePath);

            // Kontrola, zda soubor nezačíná bílým znakem před <?php
            if (preg_match('/^\s/', $content)) {
                echo "Nežádoucí bílé znaky před <?php v souboru: $filePath\n";
            }

            // Kontrola, zda soubor nezačíná s <?php
            if (strpos($content, '<?php') !== 0) {
                echo "Soubor nezačíná správně s <?php: $filePath\n";
            }
        }
    }
}

// Spustíme kontrolu na všech PHP souborech v kořenovém adresáři
checkWhitespaceInFiles(__DIR__);
