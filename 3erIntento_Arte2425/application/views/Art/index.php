<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">REGISTER ARTWORK</h3>
            <form action="<?php echo site_url('Art/save'); ?>" id="frm_register_art" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_art" id="id_art" value="<?php echo isset($artEdit) ? $artEdit->id_art : ''; ?>" require>
                
                <label for=""><b>Title:</b></label>
                <input type="text" name="name_art" id="name_art" class="form-control" 
                    value="<?php echo isset($artEdit) ? $artEdit->name_art : ''; ?>" 
                    placeholder="Enter artwork title" require>
                <br>
                <label for=""><b>Artist:</b></label>
                <select name="fk_id_arti" id="fk_id_arti" class="form-control" data-live-search="true">
                    <option value="">Select Artist</option>
                    <?php foreach($artists as $artist): ?>
                        <option value="<?php echo $artist->id_arti; ?>" 
                            <?php echo (isset($artEdit) && $artEdit->fk_id_arti == $artist->id_arti) ? 'selected' : ''; ?>>
                            <?php echo $artist->name_art . ' ' . $artist->lastname_arti; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label for=""><b>Photo:</b></label>
                <input type="file" name="photo_art" id="photo_art" class="form-control" require>
                <br>
                <label for=""><b>Description:</b></label>
                <textarea require name="description_art" id="description_art" class="form-control" rows="4" 
                    placeholder="Enter artwork description"><?php echo isset($artEdit) ? $artEdit->description_art : ''; ?></textarea>
                <br>
                <label for=""><b>Date:</b></label>
                <input type="date" name="date_art" id="date_art" class="form-control"
                    value="<?php echo isset($artEdit) ? $artEdit->date_art : ''; ?>" require>
                <br>
                <button class="btn btn-success" type="submit">
                    <?php echo isset($artEdit) ? 'Update' : 'Save'; ?>
                </button>
                <button class="btn btn-danger" type="reset">Cancel</button>
            </form>
        </div>
        <div class="col-md-8">
            <h3 class="text-center">ARTWORKS LIST</h3>
            <br>
            <?php if($artworks): ?>
            <table class="table table-bordered table-striped table-hover" id="tbl-art">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">TITLE</th>
                        <th class="text-center">ARTIST</th>
                        <th class="text-center">PHOTO</th>
                        <th class="text-center">DESCRIPTION</th>
                        <th class="text-center">DATE</th>
                        <th class="text-center">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($artworks as $artTemp): ?>
                        <tr>
                            <td class="text-center"><?php echo $artTemp->id_art; ?></td>
                            <td class="text-center"><?php echo $artTemp->name_art; ?></td>
                            <td class="text-center"><?php echo $artTemp->artist_name; ?></td>
                            <td class="text-center">
                                <img src="<?php echo base_url('uploads/'.$artTemp->photo_art); ?>" 
                                     alt="Artwork" style="max-width: 100px;">
                            </td>
                            <td class="text-center"><?php echo $artTemp->description_art; ?></td>
                            <td class="text-center"><?php echo $artTemp->date_art; ?></td>
                            <td class="text-center">
                                <a href="<?php echo site_url('Art/edit'); ?>/<?php echo $artTemp->id_art; ?>" 
                                   class="btn btn-warning">Edit</a>
                                <a href="<?php echo site_url('Art/delete'); ?>/<?php echo $artTemp->id_art; ?>"
                                   class="btn btn-danger" onclick="return confirm('Are you sure you want to delete? YOU CANNOT RECOVER THIS INFORMATION!');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <h3 style="color:red;">
                    NO ARTWORKS REGISTERED
                </h3>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.selectpick').selectpicker();
    })
</script>
