<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">REGISTER ARTIST</h3>
            <form action="<?php echo site_url('Artists/save'); ?>" id="frm_register_artist" method="post">
                <!-- Agregamos un campo oculto para el ID -->
                <input type="hidden" name="id_arti" id="id_arti" value="<?php echo isset($artistEdit) ? $artistEdit->id_arti : ''; ?>">
                
                <label for=""><b>Name:</b></label>
                <input type="text" name="name_art" id="name_art" class="form-control" 
                    value="<?php echo isset($artistEdit) ? $artistEdit->name_art : ''; ?>" 
                    placeholder="Enter artist's name" require>
                <br>
                <label for=""><b>Last Name:</b></label>
                <input type="text" name="lastname_arti" id="lastname_arti" class="form-control" 
                    value="<?php echo isset($artistEdit) ? $artistEdit->lastname_arti : ''; ?>" 
                    placeholder="Enter artist's last name" require>
                <br>
                <label for=""><b>ID Number:</b></label>
                <input type="text" name="ci_arti" id="ci_arti" class="form-control" 
                    value="<?php echo isset($artistEdit) ? $artistEdit->ci_arti : ''; ?>" 
                    placeholder="Enter ID number" require>
                <br>
                <label for=""><b>Email:</b></label>
                <input type="email" name="email_arti" id="email_arti" class="form-control" 
                    value="<?php echo isset($artistEdit) ? $artistEdit->email_arti : ''; ?>" 
                    placeholder="Enter email address" require>
                <br>
                <label for=""><b>Phone:</b></label>
                <input type="text" name="phone_arti" id="phone_arti" class="form-control" 
                    value="<?php echo isset($artistEdit) ? $artistEdit->phone_arti : ''; ?>" 
                    placeholder="Enter phone number" require>
                <br>
                <button class="btn btn-success" type="submit">
                    <?php echo isset($artistEdit) ? 'Update' : 'Save'; ?>
                </button>
                <!-- ... resto del formulario ... -->
            </form>
        </div>
        <div class="col-md-8">
            <h3 class="text-center">ARTISTS LIST</h3>
            <br>
            <?php if($artist): ?>
            <table class="table table-bordered table-striped table-hover" id="tbl-artist">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">NAME</th>
                        <th class="text-center">LAST NAME</th>
                        <th class="text-center">ID NUMBER</th>
                        <th class="text-center">EMAIL</th>
                        <th class="text-center">PHONE</th>
                        <th class="text-center">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($artist as $artistTemp): ?>
                        <tr>
                            <td class="text-center"><?php echo $artistTemp->id_arti; ?></td>
                            <td class="text-center"><?php echo $artistTemp->name_art; ?></td>
                            <td class="text-center"><?php echo $artistTemp->lastname_arti; ?></td>
                            <td class="text-center"><?php echo $artistTemp->ci_arti; ?></td>
                            <td class="text-center"><?php echo $artistTemp->email_arti; ?></td>
                            <td class="text-center"><?php echo $artistTemp->phone_arti; ?></td>
                            <td class="text-center">
                            <a href="<?php echo site_url('Artists/edit'); ?>/<?php echo $artistTemp->id_arti; ?>" class="btn btn-warning">Edit</a>
                                <a href="<?php echo site_url('Artists/delete'); ?>/<?php echo $artistTemp->id_arti; ?>"
                                 class="btn btn-danger" onclick="return confirm('Are you sure you want to delete? YOU CANNOT RECOVER THIS INFORMATION!');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <h3 style="color:red;">
                    NO ARTISTS REGISTERED
                </h3>
            <?php endif; ?>
        </div>
    </div>
</div>
<br>