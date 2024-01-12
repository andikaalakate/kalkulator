<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link href="style.css" rel="stylesheet">
</head>

<body class="body-form">
    <form action="" method="post" class="form">
        <h1 class="text-3xl text-center mb-8 font-bold">
            KALKULATOR
        </h1>
        <label for="angka1" class="block mb-2 text-lg font-semibold">Angka 1:</label>
        <input type="number" name="angka1" id="angka1" class="input" placeholder="Masukkan angka" required>
        <label for="angka2" class="block mb-2 text-lg font-semibold">Angka 2:</label>
        <input type="number" name="angka2" id="angka2" class="input" placeholder="Masukkan angka" required>
        <div class="flex justify-between">
            <button class="btn" type="submit" name="operator" value="+">+</button>
            <button class="btn" type="submit" name="operator" value="-">-</button>
            <button class="btn" type="submit" name="operator" value="*">*</button>
            <button class="btn" type="submit" name="operator" value="/">/</button>
        </div>
    </form>
    <?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['angka1']) && isset($_POST['angka2']) && isset($_POST['operator'])) {
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $operator = $_POST['operator'];

            if (is_numeric($angka1) && is_numeric($angka2)) {
                switch ($operator) {
                    case '+':
                        $result = $angka1 + $angka2;
                        break;
                    case '-':
                        $result = $angka1 - $angka2;
                        break;
                    case '*':
                        $result = $angka1 * $angka2;
                        break;
                    case '/':
                        if ($angka2 != 0) {
                            $result = $angka1 / $angka2;
                        } else {
                            $result = "Tidak bisa dibagi '0'";
                        }
                        break;
                    default:
                        $result = "Operasi salah.";
                }

                $_SESSION['hasil_kalkulasi'] = $result;
                header("Location: ./");
                exit;
            }
        }
    }
    if (isset($_SESSION['hasil_kalkulasi'])) {
        echo "
        <div class='hasil'>
            <h2 class='text-xl my-4 font-bold'>Hasil: {$_SESSION['hasil_kalkulasi']}</h2>
        </div>
        ";
        
        unset($_SESSION['hasil_kalkulasi']);
    }
    ?>
</body>

</html>