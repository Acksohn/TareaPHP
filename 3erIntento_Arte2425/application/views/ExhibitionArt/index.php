<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">REGISTER ARTWORK IN EXHIBITION</h3>
            <form action="<?php echo site_url('ExhibitionArt/save'); ?>" id="frm_register_exhi_art" method="post">
                <input type="hidden" name="id_exhart" id="id_exhart" value="<?php echo isset($exhiartEdit) ? $exhiartEdit->id_exhart : ''; ?>">
                
                <label for=""><b>Exhibition:</b></label>
                <select name="fk_id_exh" id="fk_id_exh" class="form-control">
                    <option value="">Select Exhibition</option>
                    <?php foreach($exhibitions as $exhibition): ?>
                        <option value="<?php echo $exhibition->id_exh; ?>" 
                            <?php echo (isset($exhiartEdit) && $exhiartEdit->fk_id_exh == $exhibition->id_exh) ? 'selected' : ''; ?>>
                            <?php echo $exhibition->name_exh; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label for=""><b>Artwork:</b></label>
                <select name="fk_id_art" id="fk_id_art" class="form-control">
                    <option value="">Select Artwork</option>
                    <?php foreach($artworks as $artwork): ?>
                        <option value="<?php echo $artwork->id_art; ?>" 
                            <?php echo (isset($exhiartEdit) && $exhiartEdit->fk_id_art == $artwork->id_art) ? 'selected' : ''; ?>>
                            <?php echo $artwork->name_art; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <button class="btn btn-success" type="submit">
                    <?php echo isset($exhiartEdit) ? 'Update' : 'Save'; ?>
                </button>
                <button class="btn btn-danger" type="reset">Cancel</button>
            </form>
        </div>
        <div class="col-md-8">
            <h3 class="text-center">ARTWORKS IN EXHIBITIONS</h3>
            <br>
            <?php if($exhiart): ?>
            <table class="table table-bordered table-striped table-hover" id="tbl-exhi-art">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">EXHIBITION</th>
                        <th class="text-center">ARTWORK</th>
                        <th class="text-center">ARTIST</th>
                        <th class="text-center">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($exhiart as $exhiartTemp): ?>
                        <tr>
                            <td class="text-center"><?php echo $exhiartTemp->id_exhart; ?></td>
                            <td class="text-center"><?php echo $exhiartTemp->exhibition_name; ?></td>
                            <td class="text-center"><?php echo $exhiartTemp->artwork_name; ?></td>
                            <td class="text-center"><?php echo $exhiartTemp->artist_name; ?></td>
                            <td class="text-center">
                                <a href="<?php echo site_url('ExhibitionArt/edit'); ?>/<?php echo $exhiartTemp->id_exhart; ?>" 
                                   class="btn btn-warning">Edit</a>
                                <a href="<?php echo site_url('ExhibitionArt/delete'); ?>/<?php echo $exhiartTemp->id_exhart; ?>"
                                   class="btn btn-danger" onclick="return confirm('Are you sure you want to delete? YOU CANNOT RECOVER THIS INFORMATION!');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <h3 style="color:red;">
                    NO ARTWORKS ASSIGNED TO EXHIBITIONS
                </h3>
            <?php endif; ?>
        </div>
    </div>
</div>