
<script type="text/javascript">

    $(document).ready(function($) {
      var list_target_id = 'list-target'; //first select list ID
      var list_select_id = 'list-select'; //second select list ID
      var initial_target_html = '<option value="">Önce Marka seçin...</option>'; //Initial prompt for target select

    $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option

    $('#'+list_select_id).change(function(e) {
      //Grab the chosen value on first select list change
      var selectvalue = $(this).val();

      //Display 'loading' status in the target select list
      $('#'+list_target_id).html('<option value="">Yükleniryor...</option>');

      if (selectvalue == "") {
          //Display initial prompt in target select if blank value selected
         $('#'+list_target_id).html(initial_target_html);
      } else {
        //Make AJAX request, using the selected value as the GET
        $.ajax({url: '/admin/inc/model_sec.php?svalue='+selectvalue,
               success: function(output) {
                  //alert(output);
                  $('#'+list_target_id).html(output);
              },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.status + " "+ thrownError);
            }});
          }
      });
    });
</script>
<div class="search_auto_wrapper">
<form class="" action="/index.php?do=search_post" method="post">
  <div class="search_auto">
    <h3><strong>Araç</strong> ara</h3>
    <div class="clear"></div>
    <label><strong>Marka:</strong></label>
    <div class="select_box_1">
      <select name="marka"  id="list-select"  class="select_1">
        <option value="">Seçin</option>
        <?php
          $mnameQuery = query("SELECT * FROM marka ORDER BY name ASC");
          while ($mnameRow = row($mnameQuery)){
            echo '<option ';
            echo 'value="'.ss($mnameRow["id"]).'">'.ss($mnameRow["name"]).'</option>';
          }
        ?>
      </select>
    </div>
    <label><strong>Model:</strong></label>
    <div class="select_box_1">
      <select  name="model"  id="list-target" style=" border: 1px solid #D1D5DC; border-radius: 3px; background: #FFFFFF; display: block; color: #798FA1; font-size: 13px; height: 28px; line-height: 28px; font-family: 'PTSansRegular',Arial,sans-serif; padding: 1px 0 0 11px; box-shadow: 0 1px 0 0 #FFFFFF; width: 180px; background: url(../images/select_marker.gif) no-repeat right 13px #FFFFFF; ">
      </select>
    </div>
    <label><strong>Yıl:</strong></label>
    <div class="select_box_2">
      <select name="year1" class="select_2">
        <option value="">Minimum</option>
        <?php
          for($yil = 2016; $yil > 1949; $yil--) {
            echo "<option value='$yil'>" .$yil. "</option>";
          }
        ?>
      </select>
      <select name="year2" class="select_2">
        <option value="">Maksimum</option>
        <?php
          for($yil = 2016; $yil > 1949; $yil--) {
            echo "<option value='$yil'>" .$yil. "</option>";
          }
        ?>
      </select>
      <div class="clear"></div>
    </div>
    <label><strong> Minimum Fiyat:</strong></label>
    <div class="select_box_2">
      <input type="number" name="price1" value="" style=" width: 100%; ">
      <div class="clear"></div>
    </div>
    <label><strong> Maksimum Fiyat:</strong></label>
    <div class="select_box_2">
      <input type="number" name="price2" value="" style=" width: 100%; ">
      <div class="clear"></div>
    </div>
    <input type="submit" value="Ara" class="btn_search"/>
    <div class="clear"></div>
  </div>
</form>
</div>
