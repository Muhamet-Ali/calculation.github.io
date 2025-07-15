<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المستوى الاول </title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/levelOne.css" />

</head>

<body>
    <div class="container">
        <?php
        session_start();

        // 1️⃣ Skoru başlat
        if (!isset($_SESSION["score"])) {
            $_SESSION["score"] = 0;
        }

        // 2️⃣ Soru sayısını başlat
        if (!isset($_SESSION["question"])) {
            $_SESSION["question"] = 1;
        }

        // 3️⃣ Başlama zamanı yoksa şimdi ata
        if (!isset($_SESSION["start_time"])) {
            $_SESSION["start_time"] = time();
        }

        // 4️⃣ Süre hesapla
        $start_time = $_SESSION["start_time"];
        $current_time = time();
        $elapsed = $current_time - $start_time;

        $remaining = 420 - $elapsed; // 7 dakika = 420 saniye
        
        // 5️⃣ Süre bittiyse skor ve soru sayısını sıfırla ve sonucu göster
        if ($remaining <= 0) {
            $_SESSION["score"] = 0;
            $_SESSION["question"] = 0;
            $_SESSION["start_time"] = NULL;
            header("Location: OneResult.php");
            exit;
        }

        // 6️⃣ Yeni soru üret
        $one = rand(1, 9);
        $two = rand(1, 9);
        $_SESSION["trueResult"] = $one + $two;
        ?>

        <div class="bir">
            <!-- Soru Formu -->
            <form action="oneCheck.php" method="POST">
                <div class="question"><?php echo "$one + $two = "; ?></div>
                <input type="number" name="result" class="form-control" required placeholder="الجواب؟">
                <input type="submit" class="btn btn-success" style="margin-top: 5px;">
                <input type="button" name="cancel" class="btn btn-danger cnl" value="Cancel" style="margin-top: 5px;">
            </form>

            <!-- Soru Bilgileri -->
            <p style="margin-top: 10px;">Soru: <?php echo $_SESSION["question"]; ?> / 100</p>
            <p>Skor: <?php echo $_SESSION["score"]; ?></p>

            <!-- Sayaç -->
            <p>الوقت المتبقي:
            <div id="time"></div>
            </p>
        </div>
    </div>

    <!-- Geri sayım -->
    <script>
        var remaining = <?php echo $remaining; ?>;

        function startTimer() {
            var timerDisplay = document.getElementById("time");

            var countdown = setInterval(function () {
                var minutes = Math.floor(remaining / 60);
                var seconds = remaining % 60;

                if (seconds < 10) seconds = "0" + seconds;

                timerDisplay.textContent = minutes + ":" + seconds;

                if (remaining <= 0) {
                    clearInterval(countdown);
                    window.location.href = "OneResult.php";
                }

                remaining--;
            }, 1000);
        }

        startTimer();

        document.querySelector(".cnl").addEventListener("click",function(){
            window.location.href="..index.html"
        });

    </script>
</body>


</html>