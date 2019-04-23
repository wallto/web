<h1 class="content-h1">Счета</h1>
<div class="row">
            <div class="col-md-12 ">
                <div class="block">
                    <h2>История</h2>
                    <div class="table-transactions">

                        <table>
                            <tr>
                                <th>Статус</th>
                                <th>Сумма</th>
                                <th>Эквивалент</th>
                                <th>Инфо</th>
                            </tr>
                            <?php foreach ($history->history as $record): ?>
                                <tr class="item">
                                    <td>
                                        <?php if ($record->send_colour=='red') : ?>
                                            <span class="status status-in">Пополнение</span>
                                        <?php else: ?>
                                            <span class="status status-out">Списание</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?=$record->output_adrs[0][1] ?> BTC</td>
                                    <td><?=($record->output_adrs[0][1] * 60) ?>$</td>
                                    <td><a href=""><i class="list-group-item__icon icon ion-md-information-circle-outline"></i></a></td>
                                </tr>
                            <?php endforeach ?>
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
                    <br>
                </div>
            </div>

        </div>
    </div>
</div>



