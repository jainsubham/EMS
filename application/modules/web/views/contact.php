  <?php include('header.php'); ?>

<div class="container jumbotron">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div> -->
    </div>
</div>
<div class="bgded overlay" style="background-image:url('<?= base_url('assets/img/team.jpg');?>');"> 
  <!-- ################################################################################################ -->
  <!-- <div class="wrapper row4">
    <footer id="footer" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <!-- <div class="btmspace-50 center">
        <h2 class="heading">Have quries ? Ask now !</h2>
        <p>You can reach us out anytime you want. Our support teams are available 24*7</p>
      </div>
      <ul class="nospace group">
        <li class="one_third first">
          <div class="infobox"><i class="fa fa-phone"></i>
            <ul class="nospace">
              <li>+00 (123) 456 7890</li>
              <li>Contact Helpline</li>
            </ul>
          </div>
        </li>
        <li class="one_third">
          <div class="infobox"><i class="fa fa-envelope-o"></i>
            <ul class="nospace">
              <li><a href="#">info@domain.com</a></li>
              <li><a href="#">sales@domain.com</a></li>
            </ul>
          </div>
        </li>
        <li class="one_third">
          <div class="infobox"><i class="fa fa-clock-o"></i>
            <ul class="nospace">
              <li>Mon - Fri: 9 to 5.00pm</li>
              <li>Sat: 9 to 1.00pm</li>
            </ul>
          </div>
        </li>
        
      </ul> 
      ################################################################################################ 
    </footer>
  </div> -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <?php include('footer.php'); ?>