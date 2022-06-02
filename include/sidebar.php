<div class="col-md-4">

  <?php



  ?>

  <!-- Blog Search Well -->
  <div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="POST">
      <div class="input-group">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
          <button class="btn btn-default" type="search" name="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </form>
    <!-- /.input-group -->
  </div>

  <!-- Blog Categories Well Start -->
  <div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
      <div class="col-lg-6">
        <ul class="list-unstyled">
          <?php
          categoriesFetch()
          ?>
        </ul>
      </div>

    </div>
    <!-- /.row -->
  </div>
  <!-- Blog Categories Well End -->

  <!-- Blog Categories Well Start -->
  <div class="well">
    <h4>Tags</h4>
    <div class="row">
      <div class="col-lg-6">
        <ul class="list-unstyled">
          <?php
          tagsFetch()
          ?>
        </ul>
      </div>

    </div>
    <!-- /.row -->
  </div>
  <!-- Blog Categories Well End -->


  <!-- Side Widget Well Start-->
  <div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
  </div>
  <!-- Side Widget Well End-->

</div>