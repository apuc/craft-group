<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.08.18
 * Time: 17:52
 *
 * @var $model \frontend\models\SendForm
 * @var $form \yii\widgets\ActiveForm
 *
 */
?>

<div class="service__form-radio">
    <div class="service__form-radio_text">
        <p>Какие услуги интересуют?</p>
    </div>
    <div class="service__form-radio-button">
<!--        <div class="service__form-radio-itemL">-->
<!--            <div class="service__form-radio-item service__form-radio-item1">-->
                <label class="checkbox-item"><?= $model->radioList[1]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-item"><?= $model->radioList[2]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="2">
                    <span class="checkmark"></span>
                </label>
<!--            </div>-->
<!--            <div class="service__form-radio-item service__form-radio-item2">-->
                <label class="checkbox-item"><?= $model->radioList[3]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="3">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-item"><?= $model->radioList[4]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="4">
                    <span class="checkmark"></span>
                </label>
<!--            </div>-->
<!--            <div class="service__form-radio-item service__form-radio-item3">-->
                <label class="checkbox-item"><?= $model->radioList[5]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="5">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-item"><?= $model->radioList[6]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="6">
                    <span class="checkmark"></span>
                </label>
<!--            </div>-->
<!--        </div>-->
<!--        <div class="service__form-radio-itemR">-->
<!--            <div class="service__form-radio-item service__form-radio-item4">-->
                <label class="checkbox-item"><?= $model->radioList[7]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="7">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-item"><?= $model->radioList[8]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="8">
                    <span class="checkmark"></span>
                </label>
<!--            </div>-->
<!--            <div class="service__form-radio-item service__form-radio-item5">-->
                <label class="checkbox-item"><?= $model->radioList[9]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="9">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-item"><?= $model->radioList[10]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="10">
                    <span class="checkmark"></span>
                </label>
<!--            </div>-->
<!--            <div class="service__form-radio-item service__form-radio-item6">-->
                <label class="checkbox-item"><?= $model->radioList[11]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="11">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-item"><?= $model->radioList[12]?>
                    <input type="checkbox" name="SendForm[radioListForm][]" value="12">
                    <span class="checkmark"></span>
                </label>
<!--            </div>-->
<!--        </div>-->
    </div>
</div>
