<form <?php print html_attr($form['attr']); ?>>
    
    <!--Field Generation Start-->
    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>
        <input <?php print html_attr(['name' => $field_id] + $field['attr'] + $field['extra']); ?>>
        
        <?php if (isset($field['error'])): ?>
            <div class="error">
                <span><?php print $field['error'];?></span>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <!--Field generation End-->
    
    <!--Button Generation Start-->
    <?php foreach ($form['buttons'] as $button_id => $button):?>
      <input <?php print html_attr(['name' => $button_id] + $button); ?>>   
    <?php endforeach; ?> 
    <!--Button generation End-->

    <?php if (isset($form['massage'])): ?>
          <span><?php print $form['massage']; ?></span>
    <?php endif; ?>
          
</form>