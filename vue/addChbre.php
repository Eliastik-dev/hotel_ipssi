
    <h2 class="text-center">Ajouter Chambres</h2>

    <form method="post" action="" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="">Prix</label>
            <input type="text" class="form-control" name="prix">
        </div>

        <div class="form-group">
            <label for="">Nombre lits</label>
            <input type="text" class="form-control" name="nbLits">
        </div>

        <div class="form-group">
            <label for="">Capacité</label>
            <input type="text" class="form-control" name="nbPers">
        </div>

        <div class="form-group">
            <label for="">Photo</label>
            <input type="file" accept="image/*" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="" class="form-control"></textarea>
        </div>
  
        
        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
    </form>
