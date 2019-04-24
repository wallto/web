<h1 class="content-h1">Счета</h1>
<div class="row">
    <div class="col-md-4">
        <div class="row">

            <?php foreach ($wallets as $wallet) :?>
                <div class="col-md-12">
                    <a href="/wallet/<?=$wallet->id?>" class="block wallet-list d-flex justify-content-between <?=(($wallet->id===$curWallet->id) ? 'active' : '')?>" style="background-image: url(/public/img/icon-wallets/<?=$wallet->type?>.png);">
                                <span class="wallet-list-title">
                                    <span class="wallet-list-title__name">
                                        <?=$wallet->title?>
                                    </span>
                                    <span class="wallet-list-title__sht">
                                        BTC
                                    </span>
                                </span>


                    </a>
                </div>
            <?php endforeach?>

        </div>
    </div>
    <div class="col-md-8">
        <div class="row ">
            <div class="col-md-7">
                <h2>Информация о счёте</h2>
                <div class="block no-padding text-center">
                    <div class="round-header">
                        <h3>Счёт <?=$curWallet->type?></h3>
                        <h1><?=$balance[$curWallet->id]->value?>  <?=$curWallet->type?></h1>
                        <h3><?=($balance[$curWallet->id]->value)*60?>$</h3>
                    </div>
                    <input id="qrcode-text" type="text" value="<?=$curWallet->address?>" hidden />
                    <div id="qrcode"></div>
                    <br>
                </div>
            </div>
            <div class="col-md-5 block">
                <div class="">
                    <div class="text-center">
                        <img class="max-w-100" src="/public/img/icon-wallets/<?=$curWallet->type?>.png" alt="">
                        <h2><?=$curWallet->type?></h2>
                    </div>

                    <div class="list-group">
                        <div class="element d-flex justify-content-between"><span class="descr">Cимвол</span> <span class="up"><?=$curWallet->type?></span></div>
                        <div class="element d-flex justify-content-between"><span class="descr">Название кошелька</span> <span class="up"><?=$curWallet->title?></span></div>
                        <div class="element d-flex justify-content-between"><span class="descr">Публичный ключ:</span> </div>
                        <span class="code"><?=$curWallet->public?></span>
                        <div class="element d-flex justify-content-between"><span class="descr">Адрес:</span> </div>
                        <span class="code"><?=$curWallet->address?></span>
                    </div>
                </div>

            </div>

            <div class="col-md-12 ">

                <div class="block">
                    <h2>Отправка валюты</h2>
                    <form action="/send/<?=$this->route['wid']?>" method="post">
                        <div class="form-group">
                            <label>Сумма</label>
                            <input type="text" name="value" class="form-input" placeholder="Сумма">
                        </div>
                        <div class="form-group">
                            <label>Адрес получателя</label>
                            <input type="text" name="to" class="form-input" placeholder="Адрес получателя">
                        </div>
                        <div class="form-group">
                            <button class="button-v1">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12 ">
                <div class="block">
                    <h2>История</h2>
                    <?php if( $history->history[0]!='empty' ): ?>
                    <div class="table-transactions">

                        <table>
                            <tr>
                                <th>Статус</th>
                                <th>Сумма</th>
                                <th>Эквивалент</th>
                                <th>Инфо</th>
                            </tr>
                            <?php foreach ($history->history as  $index=>$record): ?>
                            <?php if ($index < 10): ?>
                            <tr class="item">
                                <td>
                                    <?php if ($record->send_colour=='red') : ?>
                                        <span class="status status-out">Списание</span>

                                    <?php else: ?>
                                        <span class="status status-in">Пополнение</span>

                                    <?php endif; ?>
                                </td>
                                <td><?=$record->output_adrs[0][1] ?> BTC</td>
                                <td><?=($record->output_adrs[0][1] * 60) ?>$</td>
                                <td><a href=""><i class="list-group-item__icon icon ion-md-information-circle-outline"></i></a></td>
                            </tr>

                            <?php endif; ?>
                            <?php endforeach ?>

                        </table>
                    </div>
                    <br>
                    <a href="/history/<?=$curWallet->id?>"class="btn-type1 float-right">Вся история</a>
                    <?php else: ?>
                    <p>Пусто</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>


<?php if (!empty($notification)) : ?>
    <div class="notification">
        <div class="close"><i class="ion ion-md-close"></i></div>
        <h3><?=$notification["status"]?></h3>
        <p><?=$notification["msg"]?></p>
    </div>
<?php endif ?>
