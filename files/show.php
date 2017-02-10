<?php
    $fileTitle = metadata('file', array('Dublin Core', 'Title')) ? strip_formatting(metadata('file', array('Dublin Core', 'Title'))) : metadata('file', 'original filename');

    if ($fileTitle != '') {
        $fileTitle = ': &quot;' . $fileTitle . '&quot; ';
    } else {
        $fileTitle = '';
    }
    $fileTitle = __('File #%s', metadata('file', 'id')) . $fileTitle;
    
    $itemForFile = $file->getItem();
?>
<?php echo head(array('title' => $fileTitle, 'bodyclass'=>'files show primary-secondary')); ?>

<h1><?php echo $fileTitle; ?></h1>
<!--DS Team Edits - Alex Chea - Create back to Item Button in header-->
<h3><?php echo link_to_item('Back to item', array(), 'show', $file->getItem()); ?></h3>


<div id="primary">
    <?php echo file_markup($file, array('imageSize'=>'fullsize')); ?>
    
    <h2>Item Metadata</h2>
    <!-- Items metadata -->
    <div id="item-metadata">
        <?php echo all_element_texts($itemForFile); ?>
    </div>

    <?php echo all_element_texts('file'); ?>
     

</div>


<aside id="sidebar">
<!-- DS Team Edits - Alex Chea - Removing Format MetaData and Type MetaData -->
<div class="file-metadata panel">
    <h3><?php echo __('Table of Contents'); ?></h3>
    <div id="file-list">
        <?php if (!metadata($itemForFile, 'has files')):?>
            <p><?php echo __('There are no files for this item yet.');?> 
        <?php else: ?>
            <ul>
                <?php foreach (loop('files', $itemForFile->Files) as $otherFile): ?>
                    <li><?php echo link_to_file_show(array('class'=>'show', 'title'=>__('View File Metadata'))); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif;?>
    </div>
</div>

<!--
    <div id="format-metadata">
        <h2><?php echo __('Format Metadata'); ?></h2>
        <div id="original-filename" class="element">
            <h3><?php echo __('Original Filename'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'Original Filename'); ?></div>
        </div>
    
        <div id="file-size" class="element">
            <h3><?php echo __('File Size'); ?></h3>
            <div class="element-text"><?php echo __('%s bytes', metadata('file', 'Size')); ?></div>
        </div>
        

        <div id="authentication" class="element">
            <h3><?php echo __('Authentication'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'Authentication'); ?></div>
        </div> -->
    </div><!-- end format-metadata -->
    <!--
    <div id="type-metadata" class="section">
        <h2><?php echo __('Type Metadata'); ?></h2>
        <div id="mime-type-browser" class="element">
            <h3><?php echo __('Mime Type'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'MIME Type'); ?></div>
        </div>
        <div id="file-type-os" class="element">
            <h3><?php echo __('File Type / OS'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'Type OS'); ?></div>
        </div>
    </div><!-- end type-metadata -->
    -->
</aside>
<?php echo foot();?>
