
<link rel="stylesheet" href="../../public/css/inscription.css">
<link rel="stylesheet" href="https://use.fontawesome.com/4ecc3dbb0b.js">
<div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
            <h2>Responsive Registration Form</h2>
        </div>
        <div class="row clearfix">
            <div class="">
                <form method="POST" action="ajouter_utilisateur.php">
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="username" placeholder="Nom" required />
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="input_field select_option">
                        <?php
                        global$pdo;
                        require_once ('../../config/db.php');
                        $sql="SELECT * FROM departements";
                        //$result=$pdo->query($sql);

                        ?>
                        <select name="departement" required>
                            <option>Selectionner le Departement:</option>
                            <?php
                            foreach ($pdo->query($sql) as $row) {
                                echo "<option value='".$row['id']."'> ".$row['nom']." </option>";
                            }
                            ?>

                        </select>
                        <div class="select_arrow"></div>
                    </div>
                    <div class="input_field select_option">
                        <select name="role" required>
                            <option>Selectionner le role:</option>
                            <option value="Admin">Admin</option>
                            <option value="RH">RH</option>
                            <option value="Employe">Employé</option>
                        </select>
                        <div class="select_arrow"></div>
                    </div>
                    <div class="input_field checkbox_option">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">I agree with terms and conditions</label>
                    </div>
                    <div class="input_field checkbox_option">
                        <input type="checkbox" id="cb2">
                        <label for="cb2">I want to receive the newsletter</label>
                    </div>
                    <input class="button" type="submit" value="Enregistrer" />
                </form>
            </div>
        </div>
    </div>
</div>

