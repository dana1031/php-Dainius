<form <?php print html_attr($form['attr']); ?>>

    <!--Field Generation Start-->
    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>

        <?php if ($field['attr']['type'] === 'select'): ?>  
            <select <?php print html_attr(['name' => $field_id]); ?>>
                <?php foreach ($field['options'] as $option_id => $option): ?>
                    <option value=<?php print $option_id; ?>>
                        <?php print $option; ?>
                    </option>
                <?php endforeach; ?>              
            </select>
        <?php else: ?>
            <input <?php print html_attr(['name' => $field_id] + $field['attr'] + $field['extra']); ?>>
        <?php endif; ?>

        <?php if (isset($field['error'])): ?>
            <div class="error">
                <span><?php print $field['error']; ?></span>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <!--Field generation End-->

    <!--Button Generation Start-->
    <?php foreach ($form['buttons'] as $button_id => $button): ?>
        <input <?php print html_attr(['name' => $button_id] + $button); ?>>   
    <?php endforeach; ?> 
    <!--Button generation End-->

    <?php if (isset($form['massage'])): ?>
        <span><?php print $form['massage']; ?></span>
    <?php endif; ?>



</form>