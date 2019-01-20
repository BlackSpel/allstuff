<?php foreach($this->groups as $group_id => $group_item) : ?>
  <section  class="sky-form">
    <h4><?= $group_item ?></h4>
    <div class="row1 scroll-pane">
      <div class="col col-4">
      <?php foreach ($this->attrs[$group_id] as $attrs_id => $value) : ?>
      <?php
        if(!empty($filter) AND in_array($attrs_id, $filter))
        {
          $checked = 'checked';
        }
        else
        {
          $checked = null;
        }
      ?>
        <label class="checkbox">
          <input type="checkbox" name="checkbox" value="<?= $attrs_id ?>" <?= $checked ?>><i></i><?= $value ?>
        </label>
      <?php endforeach ?>
      </div>
    </div>
  </section>
<?php endforeach ?>