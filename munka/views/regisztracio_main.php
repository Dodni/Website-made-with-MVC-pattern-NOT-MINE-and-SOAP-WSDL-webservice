<div class="outer">
  <div class="middle">
    <div class="inner">
		<form action="<?= SITE_ROOT ?>regisztral" method="post">
			<label for="login">Családi név:</label><input type="text" name="lastname" id="lastname" required pattern="[A-ZÁÉÍÓÖŐÚÜŰ][\-\.a-záéíóöőúüűA-ZÁÉÍÓÖŐÚÜŰ ]{1}[\-\.a-záéíóöőúüűA-ZÁÉÍÓÖŐÚÜŰ ]+" maxlength="45"><br>
			<label for="login">Utónév:</label><input type="text" name="firstname" id="firstname" required pattern="[A-ZÁÉÍÓÖŐÚÜŰ][\-\.a-záéíóöőúüűA-ZÁÉÍÓÖŐÚÜŰ ]{1}[\-\.a-záéíóöőúüűA-ZÁÉÍÓÖŐÚÜŰ ]+" maxlength="45"><br>
			<label for="login">Felhasználó:</label><input type="text" name="login" id="login" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+" maxlength="12"><br>
			<label for="password1">Jelszó:</label><input type="password" name="password" id="password" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"><br>
			<input type="submit" value="Regisztráció">
		</form>
    </div>
  </div>
</div>
<h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>
