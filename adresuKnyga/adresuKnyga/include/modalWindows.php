<div class="modal fade" id="mainForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Duomenų įvedimas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form1" method="POST">
                    <table class="table text-center">
                        <tr>
                            <th width="34.5%"><label>Vardas</label></th>
                            <td width="34.5%">
                                <input type="text" name="name" value='<?php echo $name;?>'>
                                <input type='hidden' name='post_id' value='<?php echo createPassword(64);?>'>
                                <input type='hidden' name='id' value='<?php echo $id;?>'>
                            </td>
                            <td width="31%"><span class="error"> <?php echo $nameErr;?></span></td>
                        </tr>
                        <tr>
                            <th width="34.5%"><label>Pavardė</label></th>
                            <td width="34.5%"><input type="text" name="last_name" value="<?php echo $last_name;?>"></td>
                            <td width="31%"><span class="error"> <?php echo $last_nameErr;?></span></td>
                        </tr>
                        <tr>
                            <th width="34.5%"><label>Telefono numeris</label></th>
                            <td width="34.5%"><input type="tel"  name="number" value="<?php echo $number;?>"></td>
                            <td width="31%"><span class="error"> <?php echo $numberErr;?></span></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button class="btn btn-primary" id="dataEntry" type="submit" form="form1" name="dataEntry" value="Submit">Įvesti</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <h3 class="success"><?php echo $message;?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Uždaryti</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal delete window -->
<div class="modal fade" id="deleteForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Duomenų trynimas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form2" method="POST">
                    <table class="table text-center">
                        <?php
                        if($message == '') {
                            ?>
                            <tr>
                                <td width="100%" class="table-danger"><h5>Ar tikrai norite ištrinti šį įrašą?</h5>
                                    <input type='hidden' name='post_id' value='<?php echo createPassword(64);?>'>
                                    <input type='hidden' name='id' value='<?php echo $id;?>'>
                                </td>
                            </tr>
                            <tr>
                                <td width="100%">
                                    <button class="btn btn-warning btn-lg" id="deleteEntry" type="submit" form="form2" name="deleteEntry" value="Submit">Taip</button>
                                    <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Ne</button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </form>
                <h3 class="success"><?php echo $message;?></h3>
            </div>
        </div>
    </div>
</div>