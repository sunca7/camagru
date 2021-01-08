<h1>Create an account</h1>
<?php $form = \app\core\form\Form::begin('', "post") ?>
<?php echo $form->field($model, 'firstname') ?>
<?php echo $form->field($model, 'firstname') ?>
<?php echo $form->field($model, 'firstname') ?>
<?php echo $form->field($model, 'firstname') ?>
<?php echo $form->field($model, 'firstname') ?>

<button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end() ?>

<!--<form action="" method="post">-->
<!--    <div class="row">-->
<!--        <div class="col">-->
<!--            <div class="mb-3">-->
<!--                <label class="form-label">Firstname</label>-->
<!--                <input name="firstname"  type="text" class="form-control">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col">-->
<!--            <div class="mb-3">-->
<!--                <label class="form-label">Lastname</label>-->
<!--                <input name="lastname"  type="text" class="form-control">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="mb-3">-->
<!--        <label class="form-label">Email</label>-->
<!--        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">-->
<!--        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
<!--    </div>-->
<!--    <div class="mb-3">-->
<!--        <label class="form-label">Password</label>-->
<!--        <input type="password" name="password" class="form-control">-->
<!--    </div>-->
<!--    <div class="mb-3">-->
<!--        <label class="form-label">Confirm Password</label>-->
<!--        <input type="password"  name="confirmPassword" class="form-control">-->
<!--    </div>-->
<!--    <button type="submit" class="btn btn-primary">Submit</button>-->
<!--</form>-->