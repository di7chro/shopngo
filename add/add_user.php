<?php session_start(); ?>
<?php require_once '../includes/header.php' ?>

<h1>Lägger till en User</h1>
<div class="row container">
<form action="do_add_user.php" method="POST">
    <div class="form-group">
        <label for="namn">Username</label>
        <input type="text" class="form-control" name="user" value="<?php echo $old_namn ?>"
            placeholder="Skriv in ditt username">
    </div>
    <div class="form-group">
        <label for="plats">Password</label>
        <input type="password" class="form-control" name="pass" placeholder="Skriv in ditt lösenord">
    </div>
    <div class="form-group">
        <label for="plats">Color</label>
        <input type="color" class="form-control" name="color" placeholder="Välj din färg">
    </div>
    <div class="form-group">
        <?php if ($update == true): ?>
        <button type="submit" class="btn btn-info" name="uppdatera">Uppdatera</button>
        <input type="hidden" name="id" value="<?php echo $old_id ?>">
        <?php else: ?>
        <button type="submit" class="btn btn-primary" name="spara">Lägg till</button>
        <?php endif; ?>
    </div>
</form>
</div>

<?php require_once '../includes/footer.php' ?>