

    <div class="tab">Family Info:
      <?php  $pname = array(
            'placeholder'=>"Father Name...",
             'type' => 'text',
              'name'=>"fname"
          );
          echo form_input($pname); ?>

          <?php  $parent = array(
            'placeholder'=>"ParentsSeniority ...",
            'type' => 'text',
            'name'=>"parents"
          );
          echo form_input($parent); ?>

          <?php  $prntdis = array(
            'placeholder'=>"ParentsDisability...",
            'type' => 'text',
            'name'=>"disable"
          );
          echo form_input($prntdis); ?>

          <?php  $children = array(
            'placeholder'=>"Children...",
            'type' => 'text',
            'name'=>"children"
          );
          echo form_input($children); ?>

          <?php  $Hchildren = array(
            'placeholder'=>"HostelerChildren...",
            'type' => 'text',
             'name'=>"Hchildren"
          );
          echo form_input($Hchildren); ?>
    </div>

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script src="<?= base_url('assets/js/multistep.js') ?>"></script>

</body>
</html>
