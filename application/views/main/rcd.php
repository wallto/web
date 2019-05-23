
<?php if (!empty($notification)) : ?>
    <div class="notification">
        <div class="close"><i class="ion ion-md-close"></i></div>
        <h3><?=$notification["status"]?></h3>
        <p><?=$notification["msg"]?></p>
    </div>
<?php endif ?>
          <div id="app" class="min-height100vh d-flex align-items-center justify-content-center">
              <div class="block" style="padding: 45px 120px;">
                  <h2 class="text-center h2">Востановление пароля/Код</h2>
                  <form action="/rcd" method="post">
                      <div class="form-group">
                          <input type="hidden" name="email" class="form-input" placeholder="Почта" value="<?=$_SESSION['RECOVERY_EMAIL']?>">
                      </div>
                      <div class="form-group">
                          <input type="text" name="code" class="form-input" placeholder="Код">
                      </div>
                      <div class="form-group">
                          <button class="button-v1">Отправить</button>
                      </div>
                  </form>
                  <a href="/recovery"><button class="button-v2">Ещё письмо</button></a>
              </div>
          </div>