<form>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                         <label class="bmd-label-floating">Company : </label>
                         <?php echo  $companyname ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ContactNo :</label>
                          <?php echo $x->contact_no ?>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address :</label>
                          <?php echo $Email ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name :</label>
                          <?php echo $x->first_name ?>
                        </div>
                      </div>
                      <div class="col-md-6"Adress:>
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name :</label>
                          <?php echo $x->last_name ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress:</label>
                          <?php echo $x->address_1 ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress:</label>
                          <?php echo $x->address_2 ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City :</label>
                          <?php echo $x->city ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State :</label>
                          <?php echo $x->state ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pin Code :</label>
                          <?php echo $x->pin_code?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Blood Group :</label>
                          <?php echo $x->blood_group ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender :</label>
                          <?php echo $x->gender ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Martail Status :</label>
                          <?php echo $x->martail_status?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">DOB :  </label>
                          <?php echo $x->dob ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Disability:  </label>
                          <?php $disability = $x->disability;
                            if(null!=($disability)){
                                  if($disability == 1) { 
                                      echo "Disabled";
                                  }
                                  if($disability == 0 ) {
                                      echo "No Disability";
                                 }
                            }
                           ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">PAN No :  </label>
                          <?php echo $x->pan_no ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Aadhar No :  </label>
                          <?php echo $x->aadhaar_no ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Father Name:</label>
                          <?php echo $x->father_name ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Parents Seniority:</label>
                          <?php $ps = $x->parents_seniority;
                            if(null!=($ps)){
                                  if($ps == 1) { 
                                  
                                      echo "Senior Citizen";
                                    }
                                  if($ps == 0 ) {
                                      echo "Does'nt apply";
                                 }
                            }
                           ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Parents Disability :</label>
                          <?php $pd = $x->parents_disability;
                            if(null!=($pd)){
                                  if($disability == 1) { 
                                      echo "Disabled";
                                  }
                                  if($disability == 0 ) {
                                      echo "No Disability";
                                 }
                            }
                           ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Children :</label>
                          <?php $children = $x->children;
                          if($children==0){
                            echo "No children";
                          }else{
                            echo $children;
                          } ?>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Hosteler Children :</label>
                          <?php $hostel_children = $x->hosteler_children;
                          if($hostel_children==0){
                            echo "No";
                          }else{
                            echo $hostel_children;
                          } ?>
                        </div>
                      </div>
                    </div>

                  </form>

