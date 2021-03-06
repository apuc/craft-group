<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.08.18
 * Time: 11:23
 *
 * @var $model \frontend\models\SendForm
 *
 */
use yii\widgets\ActiveForm;


?>

<?php $form = ActiveForm::begin([
    'id' => 'send_vacancy',
    'options' => [
        'class' => 'service__form',
        'enctype' => 'multipart/form-data'
    ]
]); ?>
    <div class="service__form-head">

        <?= $form->field($model, 'name', [
            'options' => [
                'class' => 'form-group service__form-head_item'
            ]
        ])->textInput(['class' => 'service__form_input', 'placeholder' => 'Ваше имя'])->label() ?>

        <?= $form->field($model, 'phone', [
            'options' => [
                'class' => 'form-group service__form-head_item'
            ]
        ])->textInput(['class' => 'service__form_input js_phone-mask', 'placeholder' => 'Номер телефона'])->label() ?>

        <?= $form->field($model, 'email', [
            'options' => [
                'class' => 'form-group service__form-head_item'
            ]
        ])->textInput(['class' => 'service__form_input', 'placeholder' => 'Ваш e-mail'])->label() ?>

        <?= $form->field($model, 'skype', [
            'options' => [
                'class' => 'form-group service__form-head_item'
            ]
        ])->textInput(['class' => 'service__form_input', 'placeholder' => 'Ваше Skype'])->label() ?>

    </div>

    <div class="service__form-message" lang="ru">
        <?= $form->field($model, 'message', [
            'options' => [
                'class' => 'form-group service__form-textarea'
            ]
        ])->textarea(['placeholder' => 'Ваше сообщение'])->label() ?>
        <div class="service__form-file">

            <!--<script>
                document.addEventListener('DOMContentLoaded', function(){
                    var up = new Uploader();
                    up.init({
                        btnSelect: '#btnSel',
                        itemContainer: '#wrapperCont',
                        fileInput: '#fileInput',
                        itemWrapper: '.itemWrapper',
                        itemImg: '.itemImg',
                        itemSize: '.itemSize',
                        itemTitle: '.itemTitle',
                        uploadUrl: 'upload.php',
                        btnLoad: '#btnLoad',
                        delItem: '.delItem',
                        uploadItem: '.uploadItem',
                        dragNDrop: true,
                        dropArea: '#dropArea',
                        maxCountBox: '#maxCountBox',
                        itemsCountBox: '#itemsCountBox',
                        maxSize: 2,
                        itemsCount: 1,
                        uploadOnprogress: function (progress, item) {
                            //console.log(progress);
                            //console.log(item);
                        },
                        uploadSuccess: function (response, e, item) {
                            console.log(response);
                        },
                        dragenter: function (dropArea, e) {
                            dropArea.style.borderColor = 'red';
                        },
                        dragleave: function (dropArea, e) {
                            dropArea.style.borderColor = 'grey';
                        },
                        drop: function (dropArea, e) {
                            dropArea.style.borderColor = 'grey';
                        },
                        beforeUpload: function (item, formData) {
                            formData.append('test', 'test');
                        },
                        maxSizeError: function (name, size) {
                            console.log('Файл слишком большой', name, Math.round((size / 1024 / 1024)*100)/100 + ' мб.' );
                        }
                    });
                    up.indexItems();
                });
            </script>


            <div>Всего разрешено: <span id="maxCountBox"></span>. Уже загружено: <span id="itemsCountBox"></span></div>
            <input type="file" id="fileInput" style="display: none" multiple>
            <button id="btnSel">Выбрать</button>
            <button id="btnLoad">Загрузить</button>
            <div class="itemWrapper">
                <div class="itemTitle"></div>
                <div class="itemImg"></div>
                <div class="itemSize"></div>
                <div class="actions"><span class="delItem">Удалить</span> <span class="uploadItem">Загрузить</span></div>
            </div>
            <div id="dropArea"></div>
            <div id="wrapperCont">
                <div class="itemWrapper" style="display: block;">
                    <div class="itemTitle">DSC_2870.jpg</div>
                    <div class="itemImg"><img src="img/DSC_2870.jpg"></div>
                    <div class="itemSize">1440565</div>
                    <div class="actions"><div><span class="delItem">Удалить</span></div></div>
                </div>
            </div>-->



            <div class="btn-file__wrap">
                <input type="file" class="input-file">
                <div class="btn-input-file">
                    <img src="img/clip-black.png" alt="" width="25" height="25">
                    <span>Прикрепить файл</span>
                </div>
            </div>
            <span class="service__form-files">jpg, jpeg, png. gif, zip, rar, pdf, doc, xls</span>
        </div>
    </div>
    <div class="service__form-desc">
                        <span class="service__form-desc_span">Нажимая кнопку «Отправить» я даю свое <span
                                class="service__form-desc_red">согласие на обработку персональных данных</span></span>
        <input class="service__form-submit" id="submit" type="submit" value="Хочу в команду">
    </div>
<?php ActiveForm::end(); ?>