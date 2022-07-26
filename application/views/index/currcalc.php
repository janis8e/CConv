<div class="row">
  <div class="col-12">
    <? $this->flash->render(); ?>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <h1>Valūtu kalkulators</h1>
  </div>
  <div class="card">
    <div class="card-body">
      <form name="currclac" id="currclac" method="post" action="/currcalc">
        <div class="row form-group ">
          <label class="col-12 col-md-3 col-sm-6 col-form-label">Valūta no:</label>
          <div class="col-12 col-md-3 col-sm-6 mb-3">
            <select class="form-select currselect" name="curr_from" id="curr_from">
              <option value=""></option>
              <? foreach ($currlist as $item) { ?>
                <option value="<?= $item->id ?>"><?= $item->currencyName . ' (' . $item->id . ')' ?></option>
              <? } ?>
            </select>
          </div>
          <label class="col-12 col-md-3 col-sm-6  col-form-label ">Valūta uz:</label>
          <div class="col-12 col-md-3 col-sm-6 mb-3">
            <select class="form-select currselect" name="curr_to" id="curr_to">
              <option value=""></option>
              <? foreach ($currlist as $item) { ?>
                <option value="<?= $item->id ?>"><?= $item->currencyName . ' (' . $item->id . ')' ?></option>
              <? } ?>
            </select>
          </div>
        </div>
        <div class="row form-group ">
          <label class="col-12 col-md-3 col-sm-6  col-form-label ">Summa:</label>
          <div class="col-12 col-md-3 col-sm-6 mb-3">
            <input type="text" class="form-control" id="amount" name="amount" value="1" />
          </div>
        </div>
      </form>
      <hr />
      <div class="row">
        <div class="col-6 col-md-9 col-sm-6 offset-md-3 offset-sm-6 mb-3">
          <h4>No: <span id="cf">na</span> uz: <span id="ct">na</span></h4>
          <h4>Kurss: <span id="cr">0</span></h4>
          <h2>Aprēķins: <span id="cz">0</span> <span id="cu"></span></h2>
        </div>
      </div>
    </div>

  </div>

</div>

<?
function footer_script()
{
?>
  <script>
    function calc() {
      summ = $('#cr').html() * $('#amount').val();
      $('#cz').html(summ);
    }

    $('document').ready(function() {
      $('.currselect').change(function() {
        $.ajax({
          url: '/ajax/calc',
          dataType: 'html',
          method: 'POST',
          async: false,
          data: {
            curr_from: $('#curr_from').val(),
            curr_to: $('#curr_to').val()
          },
        }).done(function(rez) {
          if (rez) {
            $('#cf').html($('#curr_from').val());
            $('#ct').html($('#curr_to').val());
            $('#cr').html(rez);
            $('#cu').html($('#curr_to').val());
            calc();
          }
        });
      });

      $('#amount').keyup(function() {
        calc();
      });

    });
  </script>
<? } ?>