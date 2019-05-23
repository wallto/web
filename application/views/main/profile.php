<h1 class="content-h1">Кошельки</h1>

<div class="row">
    <div class="col-md-5">
        <div class="row">
            <!-- 
            <div class="col-md-12">
                <div class="block">
                    <h2>Создать кошелёк</h2>
                    <form action="/create" method="post">
                        <div class="form-group">
                            <input type="text" name="title" class="form-input" placeholder="Название кошелька">
                            <label for="">Валюта</label>
                            <select name="type">
                                <option value="btc">BTC</option>
                                <option value="ltc">LTC</option>
                            </select>
                            <br>
                            <label for="">testnet</label>
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

            </div> -->
            <div class="col-md-12">
                <a href="#add-modal-new" class="popup-modal d-flex justify-content-between" style="width: 100%; display: block;">
                    <div class="walletGroupPrew-t col-md-12 block">
                        <h3>Новый кошелёк</h3>
                        <h1>Создать</span></h1> 
                    </div>
                </a>
                <div id="add-modal-new" class="mfp-hide white-popup">
                    <h1>Создать новый кошелёк</h1>
                    <form action="/create" method="post">
                        <div class="form-group">
                            <input type="text" name="title" class="form-input" placeholder="Название кошелька">
                            <label for="">Валюта</label>
                            <select name="type">
                                <option value="btc">BTC</option>
                                <option value="ltc">LTC</option>
                            </select>
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


                
                <?php 
                $keys = array_keys($wallets);
                    $last_key = end($keys);
                    $walletGroup = NULL;  if(!empty($wallets))foreach ($wallets as $key => $wallet) :?>
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
                                <div class="walletGroupPrew <?=$wallet->type ?> block">
                                    <h3>Баланс <?=$valName ?></h3>
                                    <h1><?=$overallPrices[$wallet->type]?> <span><?=$wallet->type ?></span></h1> 
                                    <div class="openButton"><i class="ion ion-md-arrow-forward"></i></div>
                                </div>
                                <div class="wallets-list row">
                    <?php endif ?>



        <div class="col-md-12">
            <a href="/wallet/<?=$wallet->id?>" class="ajax block wallet-list d-flex justify-content-between" style="background-image: url(/public/img/icon-wallets/<?=$wallet->type?>.png);">
                <span class="wallet-list-title">
                    <span class="wallet-list-title__name">
                        <?=$wallet->title?>
                    </span>
                    <span class="wallet-list-title__sht">
                        <?=$wallet->type?>
                    </span>
                </span>
                <span class="wallet-list__count"><?=$wallet->balance?>  <?=$wallet->type?></span>
                
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
    <div class="col-md-7">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="block">
                    <h2>Привязать кошелёк</h2>
                    <form action="/add" method="post">
                        <div class="form-group">
                            <label for="">Валюта: </label>
                            <select name="type">
                                <option value="btc">BTC</option>
                                <option value="ltc">LTC</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="pr" class="form-input" placeholder="Приватный ключ">
                        </div>
                        <div class="form-group">
                            <input type="text" name="pu" class="form-input" placeholder="Публичный ключ">
                        </div>
                        <div class="form-group">
                            <input type="text" name="ad" class="form-input" placeholder="Адрес">
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" class="form-input" placeholder="Название кошелька">
                        </div>

                        <div class="form-group">
                            <button class="button-v1">Добавить</button>
                        </div>

                    </form>
                </div>


                <div class="block">
                    <div class="table-transactions">
                        <table>
                            <tr>
                                <th>Статус</th>
                                <th>Сумма</th>
                                <th>Эквивалент</th>
                                <th>Инфо</th>
                            </tr>
                            <tr class="item">
                                <td>
                                    <span class="status status-in">Списание</span>
                                </td>
                                <td>0,15 BTC</td>
                                <td>245$</td>
                                <td><a href="#" data-toggle="tooltip" title="Hooray!"><i class="list-group-item__icon icon ion-md-information-circle-outline"></i></a></td>
                            </tr>
                            <tr class="item">
                                <td>
                                    <span class="status status-out">Списание</span>
                                </td>
                                <td>0,15 BTC</td>
                                <td>245$</td>
                                <td><a href=""><i class="list-group-item__icon icon ion-md-information-circle-outline"></i></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12">
                <div class="block">
                    <h2>Текущие цены</h2>
                    <div class="table-transactions">
                        <table>
                            <tr>
                                <th>Имя</th>
                                <th>Цена</th>
                                <th>Изменение (24ч)</th>
                            </tr>
                            <tr class="item">
                                <td>
                                    <span class="wallet">
                                        <img class="wallet-image" src="https://raw.githubusercontent.com/ankogit/cryptowallet/design/res/btc.png" alt="">
                                        <span class="wallet-name">
                                            Bitcoin
                                        </span>
                                        <span class="wallet-sht">
                                            BTC
                                        </span>
                                    </span>
                                </td>
                                <td>2455$</td>
                                <td><span class="up">1,64%</span></td>
                            </tr>
                            <tr class="item">
                                <td>
                                    <span class="wallet">
                                        <img class="wallet-image" src="https://raw.githubusercontent.com/ankogit/cryptowallet/design/res/btc.png" alt="">
                                        <span class="wallet-name">
                                            Bitcoin
                                        </span>
                                        <span class="wallet-sht">
                                            BTC
                                        </span>
                                    </span>
                                </td>
                                <td>135$</td>
                                <td><span class="down">0,64%</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> -->

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


