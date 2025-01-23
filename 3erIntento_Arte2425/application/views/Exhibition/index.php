<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">REGISTER EXHIBITION</h3>
            <form action="<?php echo site_url('Exhibition/save'); ?>" id="frm_register_exhibition" method="post">
                <input type="hidden" name="id_exh" id="id_exh" value="<?php echo isset($exhibitionEdit) ? $exhibitionEdit->id_exh : ''; ?>">
                
                <label for=""><b>Name:</b></label>
                <input type="text" name="name_exh" id="name_exh" class="form-control" 
                    value="<?php echo isset($exhibitionEdit) ? $exhibitionEdit->name_exh : ''; ?>" 
                    placeholder="Enter exhibition name"  required>
                <br>
                <label for=""><b>Description:</b></label>
                <textarea name="description_exh" id="description_exh" class="form-control" rows="4" 
                    placeholder="Enter exhibition description"><?php echo isset($exhibitionEdit) ? $exhibitionEdit->description_exh : ''; ?></textarea>
                <br>
                <label for=""><b>Start Date:</b></label>
                <input type="date" name="dateini" id="dateini" class="form-control"
                    value="<?php echo isset($exhibitionEdit) ? $exhibitionEdit->dateini : ''; ?>" required>
                <br>
                <label for=""><b>End Date:</b></label>
                <input type="date" name="dateend" id="dateend" class="form-control"
                    value="<?php echo isset($exhibitionEdit) ? $exhibitionEdit->dateend : ''; ?>" required>
                <br>
                <label for=""><b>Location:</b></label>
                <input type="text" name="location" id="location" class="form-control" 
                    value="<?php echo isset($exhibitionEdit) ? $exhibitionEdit->location : ''; ?>" 
                    placeholder="Enter exhibition location" required>
                <br>
                <button class="btn btn-success" type="submit">
                    <?php echo isset($exhibitionEdit) ? 'Update' : 'Save'; ?>
                </button>
                <button class="btn btn-danger" type="reset">Cancel</button>
            </form>
        </div>
        <div class="col-md-8">
            <h3 class="text-center">EXHIBITIONS LIST</h3>
            <br>
            <?php if($exhibitions): ?>
            <table class="table table-bordered table-striped table-hover" id="tbl-exhibition">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">NAME</th>
                        <th class="text-center">DESCRIPTION</th>
                        <th class="text-center">START DATE</th>
                        <th class="text-center">END DATE</th>
                        <th class="text-center">LOCATION</th>
                        <th class="text-center">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($exhibitions as $exhibitionTemp): ?>
                        <tr>
                            <td class="text-center"><?php echo $exhibitionTemp->id_exh; ?></td>
                            <td class="text-center"><?php echo $exhibitionTemp->name_exh; ?></td>
                            <td class="text-center"><?php echo $exhibitionTemp->description_exh; ?></td>
                            <td class="text-center"><?php echo $exhibitionTemp->dateini; ?></td>
                            <td class="text-center"><?php echo $exhibitionTemp->dateend; ?></td>
                            <td class="text-center"><?php echo $exhibitionTemp->location; ?></td>
                            <td class="text-center">
                                <a href="<?php echo site_url('Exhibition/edit'); ?>/<?php echo $exhibitionTemp->id_exh; ?>" 
                                   class="btn btn-warning">Edit</a>
                                <a href="<?php echo site_url('Exhibition/delete'); ?>/<?php echo $exhibitionTemp->id_exh; ?>"
                                   class="btn btn-danger" onclick="return confirm('Are you sure you want to delete? YOU CANNOT RECOVER THIS INFORMATION!');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <h3 style="color:red;">
                    NO EXHIBITIONS REGISTERED
                </h3>
            <?php endif; ?>
        </div>
    </div>
</div>