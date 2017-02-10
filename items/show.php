<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>

<!-- DS Team Edits - Sasha - Replacing files with Table of Contents -->
    <?php echo get_specific_plugin_hook_output('UniversalViewer', 'public_items_show', array('view' => $this, 'item' => $item)); ?>
<!-- End DS Team Edits --> 

    <!-- Items metadata -->
    <div id="item-metadata">
        <?php echo all_element_texts('item'); ?>
    </div>

<!-- DS Team Edits - Sasha - Replacing files with Table of Contents -->
<!--<h3><?php echo __('Files'); ?></h3>
    <div id="item-images">
         <?php echo files_for_item(); ?>
    </div> -->
    
<div class="file-metadata panel">
    <h3><?php echo __('Table of Contents'); ?></h3>
    <div id="file-list">
        <?php if (!metadata('item', 'has files')):?>
            <p><?php echo __('There are no files for this item yet.');?> <?php echo link_to_item(__('Add a File'), array(), 'edit'); ?>.</p>
        <?php else: ?>
            <ul>
                <?php foreach (loop('files', $this->item->Files) as $file): ?>
                    <li><?php echo link_to_file_show(array('class'=>'show', 'title'=>__('View File Metadata'))); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif;?>
    </div>
</div>

<!-- End DS Team Edits -->    

   <?php if(metadata('item','Collection Name')): ?>
      <div id="collection" class="element">
        <h3><?php echo __('Collection'); ?></h3>
        <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
      </div>
   <?php endif; ?>

     <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item','has tags')): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif;?>

    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
    </div>


    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>

</div> <!-- End of Primary. -->

 <?php echo foot(); ?>
