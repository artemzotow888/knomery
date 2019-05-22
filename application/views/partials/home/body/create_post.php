<div class="post-update-form" ng-controller="postController">
    <p class="post-create-form-title">Создание программы обучения</p>
    <?php
        $catIds = array();
        echo form_open_multipart('post/create');
    ?>
        <div class="form-group">
            <input type="text" name="title" placeholder="Название" class="form-title-input form-control-plaintext">
        </div>
        <div class="form-group">
            <label for="category">Категория</label>
            <select class="form-control" name="cat" ng-model="category" id="category">
                <?php $main_categories = $this->categories_model->get_main_categories(); ?>
                <?php foreach ($main_categories as $cat_row){ ?>
                    <?php array_push($catIds, $cat_row->id); ?>
                    <option value="<?php echo $cat_row->id; ?>"><?php echo $cat_row->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="subCat">Подкатегория</label>
            <select class="form-control" name="subCat" id="subCat" ng-bind-html="subCat">
            </select>
        </div>
        <div class="form-group">
            <label for="subCat">Подподкатегория</label>
            <select class="form-control" name="subsubCat" id="subCat" ng-bind-html="subsubCat">
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <textarea name="content" id="" cols="30" rows="10" class="form-content-input" placeholder="Описание"></textarea>
        </div>
        <button class="btn btn-primary">Сохранить</button>
    <?php
        echo form_close();
    ?>
</div>

<script>
    const myApp = angular.module('myApp', ['ngMessages','ngResource']);

    myApp.controller('postController', ($scope,$filter,$http,$sce)=>{
        $scope.category = 0;
        $scope.subCat = "<option>Select One</option>";
        $scope.subCat = $sce.trustAsHtml($scope.subCat);
        $scope.$watch('category',()=>{
            if(parseInt($scope.category) !== 0){
                $http({
                    method: 'GET',
                    url: '<?php echo base_url(); ?>index.php/post/get_sub_cat/' + $scope.category
                }).then((response) => {
                    // console.log(response);
                    $scope.subCat = response.data;
                    $scope.subCat = $sce.trustAsHtml($scope.subCat);
                }, (err) => {
                    if(err){
                        throw err;
                    }
                });
            }
        });
    });
    console.log("Changed");
</script>