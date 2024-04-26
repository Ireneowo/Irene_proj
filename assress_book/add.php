<?php
$title = '新增通訊錄';
$pageName = 'add';
?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">新增</h5>
          <form name="form1" onsubmit="sendData(event)">
            <div class="mb-3">
              <label for="name" class="form-label">姓名</label>
              <input type="text" class="form-control" id="name" name="name">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="mobile" class="form-label">手機</label>
              <input type="text" class="form-control" id="mobile" name="mobile">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="birthday" class="form-label">生日</label>
              <input type="date" class="form-control" id="birthday" name="birthday">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">地址</label>
              <textarea class="form-control" id="address" name="address" cols="30" rows="3"></textarea>
              <div class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary">新增</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
  const sendData = e => {
    e.preventDefault(); // 不要讓 form1 以傳統的方式送出
    const fd = new FormData(document.form1); // 沒有外觀的表單物件
    fetch('add-api.php', {
      method: 'POST',
      body: fd, // Content-Type: multipart/form-data
    }).then(r => r.json())
      .then(data => {
        console.log(data);
      })
      .catch(ex => console.log(ex))
  };
</script>



<?php include __DIR__ . '/parts/html-foot.php' ?>