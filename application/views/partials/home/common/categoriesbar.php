<div class="categories">
    <p class="categories-header">Категории</p>
    <div class="main-category-list">
        <?php $main_categories = $this->categories_model->get_main_categories(); ?>
        <?php foreach ($main_categories as $cat_row){ ?>
            <div class="main-category-list-item">
                <p>
                    <i class="far fa-angle-double-right"></i>
                     <a href="<?php echo base_url() ?>index.php/post/all_post/<?php echo $cat_row->id; ?>">
                        <?php echo $cat_row->name; ?>
                    </a>
                </p>
                <?php $sub_categories = $this->categories_model->get_sub_categories($cat_row->id); ?>
                <?php foreach ($sub_categories as $subcat_row){ ?>
                    <div class="sub-category-list">
                        <div class="sub-category-list-item">
                            <p>
                                <a href="<?php echo base_url() ?>index.php/post/all_post/<?php echo $cat_row->id . "/" . $subcat_row->id; ?>">
                                    <?php echo $subcat_row->name; ?>
                                </a>
                            </p>
                            <?php $sub_sub_categories = $this->categories_model->get_sub_sub_categories($subcat_row->id); ?>
                            <?php foreach ($sub_sub_categories as $subsubcat_row){ ?>
                                <div class="sub-sub-category-list">
                                    <div class="sub-sub-category-list-item">
                                        <p>
                                            <a href="<?php echo base_url() ?>index.php/post/all_post/<?php echo $cat_row->id . "/" . $subcat_row->id . "/" . $subsubcat_row->id; ?>">
                                                <?php echo $subsubcat_row->name; ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>