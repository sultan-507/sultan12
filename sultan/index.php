<?php
include './inc/db.php';
include './inc/form.php';
include './inc/select.php';
?>

<?php include_once './parts/header.php'; ?>
    <!--- بداية الكونتينر -->
    <img src="images/sultan.png" alt="">
    <center>
    <div class="bg">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">مسابقة</h1>
      <p class="lead my-3">تبقى على نهاية المسابقة</p>
      <h3 class="button-64" id="countdown"></h3>
    <div class="container">
    <ul class="list-group list-group-flush"><br>
    <a class="button-64" href="https://tvtc.gov.sa" target="_blank"><span class="text">موقع الكلية</span></button></a>
  <li class="list-group-item">المشروع الأول</li>
  <li class="list-group-item">عمل الطالب : سلطان خالد الشهراني</li>
  <p><h3>للدخول في السحب على كمبيوتر أدخل معلوماتك في الأسفل</h3></p>
</ul>
<hr>
</center>
    </div>
    </div>
  </div>
    </div>
  </div>

<div class="container">
    <div class="position-relative text-right">
    <div class="col-md-7 p-lg-5 mx-auto my-5">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <h3>أدخل معلوماتك للتسجيل</h3>
<form>
        <!--- الاسم الاول -->
  <div class="mb-3">
    <label for="firstname" class="form-label">الإسم الأول</label>
    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $firstname ?>">
    <div class="form-text error"><?php echo $errors['firstnameError'] ?></div>
  </div>
        <!--- الاسم الاخير -->
  <div class="mb-3">
    <label for="lastname" class="form-label">الإسم الأخير</label>
    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $lastname ?>">
    <div class="form-text error"><?php echo $errors['lastnameError'] ?></div>
  </div>

        <!--- البريد -->
 <div class="mb-3">
    <label for="email" class="form-label">البريد الإلكتروني</label>
    <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>">
    
    <div class="form-text error"><?php echo $errors['emailError'] ?></div>
  </div> 

<br>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">بالنقر على هذا الخيار، فإنك تقر بموافقتك على تسجيل معلوماتك.</label>
  </div>
  <br>
  <button class="button-64" type="submit" name="submit" role="button"><span class="text">تسجيل</span></button>
</form>
</div>
  </div>

       <!--- العداد وقت السحب --> 
       <div class="loader-con">
    <div id="loader">
	<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
<div class="button-wrapper">
</div>
</div>
<?php
  $sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!--- زر اختيار الرابح -->
<div class="d-grid gap-2 col-6 mx-auto my-4">
<button class="button-64" id="winner" role="button">
  <span class="text">إختيار الرابح</span></button>

</div>
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">الرابح في المسابقة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($users as $user): ?>
        <h1 class="display-3 text-center modal-title" id="modalLabel"><?php echo htmlspecialchars($user['firstname']) . ' ' . htmlspecialchars($user['lastname']);?></h1>
      <?php endforeach; ?>
      </div>
    </div>
  </div>

<?php
include_once './parts/footer.php'; 
include './inc/db_close.php'; ?>
