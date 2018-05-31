

<?php echo validation_errors();
echo form_open('offres/create');?>
    <div class="card my-3 ">
        <div class="card-header cardtitle">
            <h2><?=$title;?></h2>
        </div>
        <div class="container my-1 mx-auto">
        <div class="form-group ">
            <label for="poste">Poste </label>
            <select multiple name="poste_id" class="form-control" >
                <?php foreach ($postes as $poste):?>
                    <option value="<?php echo $poste['poste_id'] ;?>" ><?php echo $poste['poste'] ;?></option>
                <?php endforeach;?></select>
        </div>
        <div class="form-group">
            <label for="niveau">Niveau </label>
            <select multiple name="niveau_id" class="form-control" >
                <?php foreach ($niveaux as $niveau):?>
                <option value="<?php echo $niveau['niveau_id'] ;?>" ><?php echo $niveau['division'] ;?></option>
                <?php endforeach;?></select>
        </div>
        <div class="form-group">
            <label for="poste">Description </label>
            <input type="text" class="form-control" name="desc" placeholder="Attiré par le jeu offensif et collectif">
        </div>
            <button type="submit" class="btn ">Submit</button>


        </div>
</form>
    </div>