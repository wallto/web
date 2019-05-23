<h1 class="content-h1">Счета</h1>
<div class="row">
    <div class="col-md-4">
        <div class="row">



                <?php $keys = array_keys($wallets);
                    $last_key = end($keys);
                    $walletGroup = NULL; foreach ($wallets as $key => $wallet) :?>
                    <?php if($walletGroup != $wallet->type):?>
                        <?php if($walletGroup != NULL): ?>
                                                        <!-- ADD NEW -->
                            <div class="col-md-12">
                                <a href="#add-modal-<?=$walletGroup?>" class="popup-modal add-wallet block d-flex justify-content-between">
                                    <span class="title">
                                        <span class="title">
                                            Создать новый кошелёк
                                        </span>
                                    </span>
                                    <span class="add"><i class="ion ion-md-add"></i></span>
                                </a>
                                <div id="add-modal-<?=$walletGroup?>" class="mfp-hide white-popup">
                                    <h1>Создать новый кошелёк</h1>
                                    <form action="/create" method="post">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-input" placeholder="Название кошелька">
                                            <label for="">Валюта: <?=$walletGroup?></label>
                                            <input type="hidden" name="type" value="<?=$walletGroup?>">
                                            <br>
                                             <label for="">TestNet</label><br>
                                            <label class="switch">
                                                <input type="checkbox" name="testnet" checked>
                                                <span class="slider"></span>
                                            </label>
                                            <div class="form-group">
                                                <button class="button-v1">Создать</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>

                    </div>
                    <?php endif ?>
                        <?php $walletGroup = $wallet->type;?>
                        <?php 
                            $valName = 'No name';
                            if($wallet->type == 'btc') $valName = 'Bitcoin';
                            if($wallet->type == 'ltc') $valName = 'Litecoin';
                        ?>
                            <div class="walletGroup col-md-12">
                                <div class="walletGroupPrew <?=$wallet->type ?> block <?=(($walletGroup===$curWallet->type) ? 'active' : '')?>">
                                    <h3>Баланс <?=$valName ?></h3>
                                    <h1><?=$overallPrices[$wallet->type]?> <span><?=$wallet->type ?></span></h1> 
                                    <div class="openButton"><i class="ion ion-md-arrow-forward"></i></div>
                                </div>
                                <div class="wallets-list row  <?=(($walletGroup===$curWallet->type) ? 'active' : '')?>">
                    <?php endif ?>



        <div class="col-md-12">
            <a href="/wallet/<?=$wallet->id?>" class="ajax block wallet-list d-flex justify-content-between <?=(($wallet->id===$curWallet->id) ? 'active' : '')?>" style="background-image: url(/public/img/icon-wallets/<?=$wallet->type?>.png);">
                <span class="wallet-list-title">
                    <span class="wallet-list-title__name">
                        <?=$wallet->title?>
                    </span>
                    <span class="wallet-list-title__sht">
                        <?=$wallet->type?>
                    </span>
                </span>
                <span class="wallet-list__count"><?=$wallet->balance?></span>
                
            </a>
        </div>



                    <?php if ($key == $last_key): ?>
                            <!-- ADD NEW -->
                            <div class="col-md-12">
                                <a href="#add-modal-<?=$walletGroup?>" class="popup-modal add-wallet block d-flex justify-content-between">
                                    <span class="title">
                                        <span class="title">
                                            Создать новый кошелёк
                                        </span>
                                    </span>
                                    <span class="add"><i class="ion ion-md-add"></i></span>
                                </a>
                                <div id="add-modal-<?=$walletGroup?>" class="mfp-hide white-popup">
                                    <h1>Создать новый кошелёк</h1>
                                    <form action="/create" method="post">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-input" placeholder="Название кошелька">
                                            <label for="">Валюта: <?=$walletGroup?></label>
                                            <input type="hidden" name="type" value="<?=$walletGroup?>">
                                            <br>
                                             <label for="">TestNet</label><br>
                                            <label class="switch">
                                                <input type="checkbox" name="testnet" checked>
                                                <span class="slider"></span>
                                            </label>
                                            <div class="form-group">
                                                <button class="button-v1">Создать</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>

                    </div>
                    <?php endif ?>
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
                        <h1><?=$curWallet->balance?>  <?=$curWallet->type?></h1>
                        <h3><?=($curWallet->balance)*60?>$</h3>
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
                        <div class="element d-flex justify-content-between"><span class="descr">Название кошелька</span> <span class="up" style="width: 73px; overflow: auto;"><?=$curWallet->title?></span></div>
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
                                <td><a href="#" data-toggle="tooltip" title="send_date: <?=$record->send_date?> - send_hash <?=$record->send_date?>"><i class="list-group-item__icon icon ion-md-information-circle-outline"></i></a></td>
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
