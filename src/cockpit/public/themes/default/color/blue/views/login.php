<div class="warp">
    <?= getPage('contPage'); ?>
	
	<?php // var_dump( User::CryptMyPass('1234') ); ?>
	<?php // var_dump(User::GenereMyToken()); ?>

    <form action="" method="POST" class="formLoginCockpit">
        <div class="imgFormCockpit"></div>
        <span id="txtFormCockpit">Veuillez entrez vos informations de connexion.</span>
        <div class="group-form"><input type="text" id="identifLogin" name="identifiant" placeholder="Identifiant"></div>
        <div class="group-form"><input type="password" id="identifPassword" name="password" placeholder="Mot de passe"></div>
            <button id="submitLogin" name="validLogin">Valider</button>
    </form>
</div>

