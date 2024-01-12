<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link href="style.css" rel="stylesheet">
    <script>
        const validateForm = () => {
            var angka1 = document.getElementById('angka1').value;
            var angka2 = document.getElementById('angka2').value;
            if (isNaN(angka1) || isNaN(angka2)) {
                alert('Angka 1 dan Angka 2 harus berupa angka.');
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="bg-gray-300 min-h-screen flex flex-col items-center justify-center bg-[url('background-2.webp')] bg-cover bg-center">
    <form action="index.php" method="post"
        class="w-full max-w-md p-8 rounded-lg bg-white bg-opacity-50 backdrop-blur-sm shadow-lg">
        <h1 class="text-3xl text-center mb-8 font-bold">
            KALKULATOR
        </h1>
        <label for="angka1" class="block mb-2 text-lg font-semibold">Angka 1:</label>
        <input type="number" name="angka1" id="angka1" class="w-full bg-gray-100 p-2 rounded-md mb-4"
            placeholder="Masukkan angka" required>
        <label for="angka2" class="block mb-2 text-lg font-semibold">Angka 2:</label>
        <input type="number" name="angka2" id="angka2" class="w-full bg-gray-100 p-2 rounded-md mb-4"
            placeholder="Masukkan angka" required>
        <div class="flex justify-between">
            <button
                class="w-1/4 bg-blue-500 mx-2 py-2 rounded-lg text-xl text-white transition duration-500 hover:bg-blue-700"
                type="submit" name="operator" value="+">+</button>
            <button
                class="w-1/4 bg-blue-500 mx-2 py-2 rounded-lg text-xl text-white transition duration-500 hover:bg-blue-700"
                type="submit" name="operator" value="-">-</button>
            <button
                class="w-1/4 bg-blue-500 mx-2 py-2 rounded-lg text-xl text-white transition duration-500 hover:bg-blue-700"
                type="submit" name="operator" value="*">*</button>
            <button
                class="w-1/4 bg-blue-500 mx-2 py-2 rounded-lg text-xl text-white transition duration-500 hover:bg-blue-700"
                type="submit" name="operator" value="/">/</button>
        </div>
    </form>
    <?php
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
                            $result = "Error: Division by zero";
                        }
                        break;
                    default:
                        $result = "Invalid operator";
                }
                echo "
                <div class='w-md mx-auto my-4 p-4 rounded-lg bg-white bg-opacity-50 backdrop-blur-sm border-2 shadow-lg'>
                    <h2 class='text-xl my-4 font-bold'>Hasil: $result</h2>
                </div>
                ";
            }
        }
    }
    ?>
</body>

</html>