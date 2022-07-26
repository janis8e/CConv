<div class="row">
    <div class="col-12">
        <? $this->flash->render(); ?>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h1>Valūtu saraksts</h1>
        <div class="card">
            <div class="card-body">
                <table class="datatable table table-dark  table-hover">
                    <thead>
                        <tr>
                            <th>Valūtas nosaukums</th>
                            <th>Valūtas apzīmējums</th>
                            <th>Valūtas kods</th>
                        </tr>
                    </thead>
                    <tbody>                     
                        <? foreach ($currlist as $item) { ?>
                            <tr>
                                <td><?= $item->currencyName ?></td>
                                <td><? if (isset($item->currencySymbol)) echo $item->currencySymbol ?></td>
                                <td><?= $item->id ?></td>
                            </tr>
                        <? } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?
function footer_script()
{ ?>
    <script>
        $('document').ready(function() {
            $('.datatable').DataTable({
                "iDisplayLength": 10,
                "searching": true,
                "order": [
                    [0, "asc"]
                ]
            });
        });
    </script>
<? } ?>