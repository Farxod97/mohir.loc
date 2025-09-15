<?php
    $host = "localhost";   // MySQL server manzili
    $dbname = "mohirdev"; // Baza nomi
    $username = "root";    // MySQL foydalanuvchi nomi
    $password = "";        // MySQL parol (bo‘sh bo‘lishi mumkin)
    
    try {
        // DSN (Data Source Name)
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    
        // PDO obyektini yaratish
        $pdo = new PDO($dsn, $username, $password);
    
        // Error rejimini Exceptionga o‘rnatish
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch (PDOException $e) {
        echo "❌ Ulanishda xatolik: " . $e->getMessage();die();
    }
?>