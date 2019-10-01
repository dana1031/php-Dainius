<form <?php print html_attr($form['attr']); ?>>
<!--    Field Generation Start-->
    <?php foreach ($form['fields'] ?? [] as $fields_id => $fields):?>
         <input <?php print html_attr(['name' => $fields_id, 'placeholder' => $fields['placeholder'], 'type' => $fields['type']]); ?>>
    <?php endforeach; ?>
<!--    Field generation End-->
<!--    Button Generation Start-->
    <?php foreach ($form['buttons'] as $button_id => $button):?>
      <input <?php print html_attr(['name' => $button_id] + $button); ?>> 
      
    <?php endforeach; ?> 
<!--       Button generation End-->
 

</form>