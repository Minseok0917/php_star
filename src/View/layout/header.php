<?php if (isset($_SESSION['user'])) : ?>
<div>
    <button class="btn btn-primary"><?=$_SESSION['user']->name ?></button>
    <a href="../User/logout.php" class="btn btn-danger">로그아웃</a>
</div>
<?php else: ?>
<div>
    <a href="../User/join.php" class="btn btn-danger">회원가입</a>
    <a href="../User/login.php" class="btn btn-primary">로그인</a>
</div>
<?php endif; ?>