 <form method="post" action="<?= $baseUrl?>search.php">
                                <div class="row">
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="dropdown bootstrap-select search-fields">
                                                 <select class="selectpicker search-fields" name="propertytype" tabindex="null">
                                                    <option value=''>Project Type</option>
                                                    <?php 
                                                        foreach($connect->query("SELECT * FROM  properties WHERE prop_type = '$pt_id'") as $bul){
                                                    ?>
                                                    <option value="<?= $bul['id']?>"><?= $bul['ptype_name']?></option>   
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="dropdown bootstrap-select search-fields dropup">
                                                <select class="selectpicker search-fields" name="location1" tabindex="null">
                                                    <option value=''>Select Location</option>
                                                    <?php
                                                        foreach($connect->query("SELECT * FROM locations") as $loc){
                                                    ?>
                                                    <option value="<?= $loc['id']?>"><?= $loc['loct_name']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="dropdown bootstrap-select search-fields dropup">
                                                <select class="selectpicker search-fields" name="status" tabindex="null">
                                                    <option value=''>Project Status</option>
                                                    <?php 
                                                        foreach($connect->query("SELECT * FROM property_status") as $bul){
                                                    ?>
                                                    <option value="<?= $bul['id']?>"><?= $bul['status_name']?></option>   
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <button type="submit" name="searchNow" class="search-button"><img src="assets/img/icons/search-icon1.svg" alt=""> &nbsp;Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>