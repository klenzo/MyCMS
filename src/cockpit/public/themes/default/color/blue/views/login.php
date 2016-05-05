<div class="warp warp-login">
    <?= getPage('contPage'); ?>
	
	<?php // var_dump( User::CryptMyPass('1234') ); ?>
	<?php // var_dump(User::GenereMyToken()); ?>

    <form action="" method="POST" class="formLoginCockpit">
        <div class="imgFormCockpit"></div>
        <span id="txtFormCockpit"><?= INFO_LOGIN; ?></span>
        <div class="group-form"><input type="text" id="identifLogin" name="identifiant" placeholder="Identifiant"></div>
        <div class="group-form"><input type="password" id="identifPassword" name="password" placeholder="Mot de passe"></div>
            <button id="" name="validLogin" class="btn btn-primary"><?= BTN_VALIDATE; ?></button>
    </form>
</div>

