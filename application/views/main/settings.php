<h1 class="content-h1">Настройки</h1>
<div class="row">
            <div class="col-md-12 ">
                <div class="block">
                    <?php if (!empty($notification)) : ?>
                        <div class="notification">
                            <div class="close"><i class="ion ion-md-close"></i></div>
                            <h3><?=$notification["status"]?></h3>
                            <p><?=$notification["msg"]?></p>
                        </div>
                    <?php endif ?>
                    <div class="row">
                        <div class="col-md-7">
                            <div style="padding: 45px 120px;">
                                      <h2 class="h2">Востановление пароля</h2>
                                      <form action="/settings" method="post">
                                          <div class="form-group">
                                              <input type="password" name="oldpass" class="form-input" placeholder="Старый пароль">
                                          </div>
                                          <div class="form-group">
                                              <input type="password" name="password" class="form-input" placeholder="Новый пароль">
                                          </div>
                                          <div class="form-group">
                                              <button class="button-v1">Отправить</button>
                                          </div>
                                      </form>
                                  </div>
                        </div>
                    </div>
                                  
                </div>
            </div>

        </div>
    </div>
</div>



