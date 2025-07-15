<?php
session_start();
$showBtn;
if($_SESSION["score"]>=20){
    $showBtn= "true";
}
else{
    $showBtn= "false";
}
?>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

<div class="container">
    <div class="style">
        <h1>انتهى الاختبار!</h1>
        <p>النتيجة النهائية: <?php echo $_SESSION["score"]; ?> / 100</p>
        <p>إذا انتهى الوقت سيتم تصفير الأسئلة والنتيجة تلقائيًا.</p>
        <div class="buttons">
            <form action="oneReset.php" method="POST">
                <button type="submit" class="btn btn-success">ابدأ من جديد</button>
            </form>
            <form action="levelTwo.php" method="POST">
                <button type="submit" class="btn btn-danger two" style="text-align: center;">انتقل للمستوى الثاني</button>
            </form>
        </div>
    </div>
</div>

<style>
    .container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .style {
        width: 350px;
        background-color: #badffb;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        padding: 10px;
        border-radius: 10px;
        text-align: center;
    }

    .buttons {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }
    .buttons button{
        width: 300px;
        text-align: center;
    }
    .two{
        display: none;
        text-align: center;
    }
</style>

<script>
    if(<?php echo $showBtn ?>){
        document.querySelector(".two").style.display="block";
    }
</script>

